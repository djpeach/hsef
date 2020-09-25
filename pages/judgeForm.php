<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'admin'])) {
  redirect('exception', ['errMsg' => 'You do not have permission to view this page']);
  die();
} ?>
<main>
  <article class="limit-width-md pt-5">
    <?php $post = new Post(); $errors = new Errors(); ?>
    <?php
    $existingUser = isset($_GET['opid']);
    $allowUserSelect = true;
    if ($existingUser && !isset($_POST['JUDGE_FORM'])) {
      $sql = DB::get()->prepare(Queries::GET_OPERATOR_BY_ID);
      $sql->execute([$_GET['opid']]);
      $operator = $sql->fetch();
      $post->title = $operator->Title;
      $post->highestDegree = $operator->HighestDegree;
      $uid = $operator->UserId;
      $sql = DB::get()->prepare(Queries::GET_USER_BY_ID);
      $sql->execute([$uid]);
      $user = $sql->fetch();
      $post->firstName = $user->FirstName;
      $post->lastName = $user->LastName;
      $post->suffix = $user->Suffix;
      $post->email = $user->Email;
    }

    $readonly = isset($_GET['readonly']) ? $_GET['readonly'] === 'true' : false;
    ?>
    <?php

    $requiredUserFields = ['firstName', 'lastName', 'email'];
    $formSubmitted = isset($_POST['JUDGE_FORM']);
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
        $opid =$existingUser ? $_GET['opid'] : null;
        if ($existingUser) { // edited existing judge
          // update user details
          $sql = $db->prepare(Queries::UPDATE_USER_BY_OPID);
          $sql->execute([$post->firstName, $post->lastName, $post->suffix, $post->email, $opid]);
          // update operator details
          $sql = $db->prepare(Queries::UPDATE_OPERATOR_BY_ID);
          $sql->execute([$post->title, $post->highestDegree, $opid]);
        } else { // new judge
          if ($didSelectUser) { // created new judge from existing user
            // make operator an judge
            $sql = $db->prepare(Queries::NEW_JUDGE_BY_UID);
            $sql->execute([$post->userId]);
            // update operator details
            $sql = $db->prepare(Queries::UPDATE_OPERATOR_BY_UID);
            $sql->execute([$post->title, $post->highestDegree, $post->userId]);
            // get Operator Id
            $sql = $db->prepare(Queries::GET_OPERATOR_BY_UID);
            $sql->execute([$post->userId]);
            $opid = $sql->fetch()->OperatorId;
          } else if (!$didSelectUser && !$existingUser) { // created new judge with new user details
            // create new user
            $sql = $db->prepare(Queries::CREATE_NEW_USER_WITH_EMAIL);
            $suffix = $post->suffix === '' ? null : $post->suffix;
            $sql->execute([$post->firstName, $post->lastName, $suffix, $post->email]);
            $uid = $db->lastInsertId();
            // create new operator
            $sql = $db->prepare(Queries::CREATE_NEW_OPERATOR_WITH_UID);
            $title = $post->title === '' ? null : $post->title;
            $highestDegree = $post->highestDegree === '' ? null : $post->highestDegree;
            $sql->execute([$uid, $title, $highestDegree]);
            $opid = $db->lastInsertId();
            // make new operator an judge
            $sql = $db->prepare(Queries::NEW_JUDGE_BY_UID);
            $sql->execute([$uid]);
          }
          // check for auth account
          $sql = $db->prepare(Queries::GET_AUTHACCOUNT_BY_OPID);
          $sql->execute([$opid]);

          if ($sql->fetch()) {
            // TODO: email existing user they have been made an judge
          } else {
            $sql = $db->prepare(Queries::GET_USER_BY_OPID);
            $sql->execute([$opid]);
            $user = $sql->fetch();
            $pwd = AuthAccount::generateAccountWithUserId($user->UserId);
            // TODO: email user their new auth credentials
          }

        }
        redirect('judgeForm', ['opid'=>$opid, 'readonly'=>true]);
      }
    }
    ?>
    <h2 class="article-header"><?php echo $existingUser ? ($readonly ? 'Judge Profile' : 'Edit Judge') : 'New Judge'; ?></h2>
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
            <div class="col text-right">
              <button class="btn btn-darkgreen" type="submit" name="JUDGE_FORM">Save Judge</button>
            </div>
          </div>
        <?php endif; ?>
      </fieldset>
      <?php if ($readonly) : ?>
        <fieldset>
          <div class="row mt-3">
            <?php
            $href = '/hsef/?page=judgeForm';
            $href .= isset($_GET['opid']) ? '&opid='.$_GET['opid'] : '';
            ?>
            <div class="col-6">
              <a href="/hsef/?page=judgeManagement" class="btn btn-yellow text-white">
                <i class="fas fa-angle-left text-white"></i>
                View All Judges
              </a>
            </div>
            <div class="col-6 text-right">
              <a href="<?php echo $href.'&readonly=false' ?>" class="btn btn-darkgreen">
                <i class="fas fa-edit text-white"></i>
                Edit Judge
              </a>
            </div>
          </div>
        </fieldset>
      <?php endif; // TODO: do the edit/readonly toggle with javascript, not a redirect ?>
    </form>
  </article>
</main>
<?php JS::get()->add('judgeFields'); ?>
