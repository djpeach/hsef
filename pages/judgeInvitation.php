<main>
  <article class="limit-width-md pt-5">
    <?php $post = new Post(); $errors = new Errors(); ?>
    <?php
    $existingUser = false;
    $allowUserSelect = true;
    $registered = false;

    $readonly = isset($_GET['readonly']) ? $_GET['readonly'] === 'true' : false;

    $requiredUserFields = ['firstName', 'lastName', 'email'];
    $formSubmitted = isset($_POST['JUDGE_REGISTRATION']);
    $didSelectUser = $formSubmitted && $post->selectUserToggle;

    // Find and create validation errors
    if ($formSubmitted) {
      if (!$didSelectUser) {
        foreach ($requiredUserFields as $field) {
          if (!$post->{$field}) {
            $fieldName = cameltostr($field);
            $errors->{$field} = "$fieldName is required";
          }
        }

        // extra email validation
        if (!$errors->email && !filter_var($post->email, FILTER_VALIDATE_EMAIL)) {
          $errors->email = 'Value set is not a valid email';
        }
      } else if ($didSelectUser) {
        if (!$post->userId) {
          $errors->user = 'Must select an existing user, or create a new one';
        }
      }

      if ($errors->isEmpty()) {
        // do db work
        // if user with email exists:
        // if user.status == 'active'
        // inform them they are already a judge and offer to send an email with auth credentials
        // else
        // user.status = 'registered', inform them they are pending approval
        // else create new user, user.status = 'registered, inform them they are pending approval
        $registered = true;
      }
    }
    ?>
    <?php if ($registered) : ?>
      <h2 class="article-header">Invited!</h2>
      <?php include 'components/divider.php' ?>
      <div class="alert alert-darkgreen mt-5" role="alert">
        <h2 class="alert-heading">Thank you!</h2>
        <hr>
        <p>You have invited a new judge for the <?php date('Y') ?> Hoosier Science and Engineering Fair. They will recieve an email asking them to accept.</p>
        <hr>
      </div>
    <?php else : ?>
      <h2 class="article-header">Judge Invitation</h2>
      <?php include 'components/divider.php' ?>
      <form method="POST" class="container">
        <?php include_once 'pages/userFields.php'?>
        <fieldset>
          <div class="row mt-3">
            <div class="col">
              <div class="floating-label-group">
                <input type="text" placeholder="Title" id="title" name="title" value="<?php echo $post->title ?>">
                <label for="title">Title</label>
                <p class="form-error"><?php echo $errors->title; ?></p>
              </div>
            </div>
            <div class="col">
              <div class="floating-label-group">
                <input type="text" placeholder="Highest Degree" id="highestDegree" name="highestDegree" value="<?php echo $post->highestDegree ?>">
                <label for="highestDegree">Highest Degree Earned</label>
                <p class="form-error"><?php echo $errors->highestDegree; ?></p>
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col text-right">
              <button class="ml-auto btn btn-darkgreen" type="submit" name="JUDGE_REGISTRATION">Submit Registration</button>
            </div>
          </div>
        </fieldset>
      </form>
    <?php endif; ?>
  </article>
</main>