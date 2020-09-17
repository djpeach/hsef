<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'moderator'])) {
  redirect('exception', 'You do not have permission to view this page');
  die();
} ?>
<main>
  <article class="limit-width-md p-5">
    <?php $post = new Post(); $errors = new Errors(); ?>
    <?php
      $existingAdmin = isset($_GET['opid']);
      if ($existingAdmin && !isset($_POST['ADMIN_FORM'])) {
        $sql = DB::get()->prepare(Queries::GET_OPERATOR_BY_ID);
        $sql->execute([$_GET['opid']]);
        $uid = $sql->fetch()->UserId;
        $sql = DB::get()->prepare(Queries::GET_USER_BY_ID);
        $sql->execute([$uid]);
        $user = $sql->fetch();
        $post->firstName = $user->FirstName;
        $post->lastName = $user->LastName;
        $post->email = $user->Email;
      }

      $readonly = isset($_GET['readonly']) ? $_GET['readonly'] === 'true' : false;
    ?>
    <?php

      $requiredUserFields = ['firstName', 'lastName', 'email'];
      $formSubmitted = isset($_POST['ADMIN_FORM']);
      $selectedUser = $formSubmitted && $post->selectUserToggle;

      // Find and create validation errors
      if ($formSubmitted) {
        if (!$selectedUser) {
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
        } else if ($selectedUser) {
          if (!$post->userValue) {
            $errors->user = 'Must select an existing user, or create a new one';
          }
        }

        if ($errors->isEmpty()) {
          // update/create user and admin records
        }
      }
    ?>
    <h2 class="article-header"><?php echo $existingAdmin ? ($readonly ? 'Admin Profile' : 'Edit Admin') : 'New Admin'; ?></h2>
    <?php include 'components/divider.php' ?>
    <form method="POST" class="container">
      <?php include_once 'pages/userFields.php'?>
      <fieldset <?php echo $readonly ? 'readonly' : ''; ?>>
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
          <?php if (!$readonly) : ?>
            <div class="row mt-3">
              <button class="ml-auto" type="submit" name="ADMIN_FORM">Save Admin</button>
            </div>
          <?php endif; ?>
      </fieldset>
      <?php if ($readonly) : ?>
      <fieldset>
        <div class="row mt-3">
          <?php
          $href = '/hsef/?page=adminForm';
          $href .= isset($_GET['opid']) ? '&opid='.$_GET['opid'] : '';
          ?>
          <a href="<?php echo $href.'&readonly=false' ?>" class="btn btn-darkgreen ml-auto">Edit Admin</a>
        </div>
      </fieldset>
      <?php endif; // TODO: do the edit/readonly toggle with javascript, not a redirect ?>
    </form>
  </article>
</main>
