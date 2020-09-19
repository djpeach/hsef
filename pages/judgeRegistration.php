<main>
  <article class="limit-width-md p-5">
    <?php $post = new Post(); $errors = new Errors(); ?>
    <?php
    $existingUser = false;
    $allowUserSelect = false;

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
        $db = DB::get();
//            $opid =$existingUser ? $_GET['opid'] : null;
//            if ($existingUser) { // edited existing admin
//              // update user details
//              $sql = $db->prepare(Queries::UPDATE_USER_BY_OPID);
//              $sql->execute([$post->firstName, $post->lastName, $post->suffix, $post->email, $opid]);
//              // update operator details
//              $sql = $db->prepare(Queries::UPDATE_OPERATOR_BY_ID);
//              $sql->execute([$post->title, $post->highestDegree, $opid]);
//            } else { // new admin
//              if ($didSelectUser) { // created new admin from existing user
//                // make operator an admin
//                $sql = $db->prepare(Queries::NEW_ADMIN_BY_UID);
//                $sql->execute([$post->userId]);
//                // update operator details
//                $sql = $db->prepare(Queries::UPDATE_OPERATOR_BY_UID);
//                $sql->execute([$post->title, $post->highestDegree, $post->userId]);
//                // get Operator Id
//                $sql = $db->prepare(Queries::GET_OPERATOR_BY_UID);
//                $sql->execute([$post->userId]);
//                $opid = $sql->fetch()->OperatorId;
//              } else if (!$didSelectUser && !$existingUser) { // created new admin with new user details
//                // create new user
//                $sql = $db->prepare(Queries::CREATE_NEW_USER_WITH_EMAIL);
//                $suffix = $post->suffix === '' ? null : $post->suffix;
//                $sql->execute([$post->firstName, $post->lastName, $suffix, $post->email]);
//                $uid = $db->lastInsertId();
//                // create new operator
//                $sql = $db->prepare(Queries::CREATE_NEW_OPERATOR_WITH_UID);
//                $title = $post->title === '' ? null : $post->title;
//                $highestDegree = $post->highestDegree === '' ? null : $post->highestDegree;
//                $sql->execute([$uid, $title, $highestDegree]);
//                $opid = $db->lastInsertId();
//                // make new operator an admin
//                $sql = $db->prepare(Queries::NEW_ADMIN_BY_UID);
//                $sql->execute([$uid]);
//              }
//              // check for auth account
//              $sql = $db->prepare(Queries::GET_AUTHACCOUNT_BY_OPID);
//              $sql->execute([$opid]);
//
//              if ($sql->fetch()) {
//                // TODO: email existing user they have been made an admin
//              } else {
//                $sql = $db->prepare(Queries::GET_USER_BY_OPID);
//                $sql->execute([$opid]);
//                $user = $sql->fetch();
//                $pwd = AuthAccount::generateAccountWithUserId($user->UserId);
//                // TODO: email user their new auth credentials
//              }
//
//            }
//            redirect('adminForm', [['opid', $opid], ['readonly', 'true']]);
        $readonly = true;
      }
    }
    ?>
    <h2 class="article-header">Judge Registration</h2>
    <?php include 'components/divider.php' ?>
    <form method="POST" class="container">
      <?php include_once 'pages/userFields.php'?>
      <fieldset <?php echo $readonly ? 'disabled' : ''; ?>>
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
            <button class="ml-auto btn btn-darkgreen" type="submit" name="JUDGE_REGISTRATION">Submit Registration</button>
          </div>
        <?php endif; ?>
      </fieldset>
      <?php if ($readonly) : ?>
        <fieldset>
          <div class="row mt-3">
            <?php
            $href = '/hsef/?page=judgeRegistration';
            ?>
            <a href="/hsef/?page=judgeRegistration&readonly=false" class="btn btn-darkgreen ml-auto">
              <i class="fas fa-edit text-white"></i>
              Edit Details
            </a>
          </div>
        </fieldset>
      <?php endif; // TODO: do the edit/readonly toggle with javascript, not a redirect ?>
    </form>
  </article>
</main>