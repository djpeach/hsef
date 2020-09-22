<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'moderator'])) {
  redirect('exception', 'You do not have permission to view this page');
  die();
} ?>
<main>
  <article class="limit-width-md pt-5">
    <?php $post = new Post(); $errors = new Errors(); ?>
    <?php
    $existingUser = isset($_GET['sid']);
    $allowUserSelect = false;
    if ($existingUser && !isset($_POST['STUDENT_FORM'])) {
      $sql = DB::get()->prepare(Queries::GET_STUDENT_BY_ID);
      $sql->execute([$_GET['sid']]);
      $student = $sql->fetch();
//      $post->title = $student->Title;
//      $post->highestDegree = $student->HighestDegree;
      $uid = $student->UserId;
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

    $requiredUserFields = ['firstName', 'lastName'];
    $formSubmitted = isset($_POST['STUDENT_FORM']);
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
        if ($post->email !== '' && !$errors->email && !filter_var($post->email, FILTER_VALIDATE_EMAIL)) {
          $errors->email = 'Value set is not a valid email';
        }
      } else if ($selectedUser) {
        if (!$post->userId) {
          $errors->user = 'Must select an existing user, or create a new one';
        }
      }

      if ($errors->isEmpty()) {
        $db = DB::get();
        $sid =$existingUser ? $_GET['sid'] : null;
        if ($existingUser) { // edited existing student
          // update user details
          $sql = $db->prepare(Queries::UPDATE_USER_BY_SID);
          $email = $post->email === '' ? null : $post->email;
          $sql->execute([$post->firstName, $post->lastName, $post->suffix, $email, $sid]);
          // update student details
          // TODO
        } else { // new student
          if ($selectedUser) { // created new student from existing user
            // TODO
          } else if (!$selectedUser && !$existingUser) { // created new student with new user details
            // TODO
          }

        }
        redirect('studentForm', [['sid', $sid], ['readonly', 'true']]);
      }
    }
    ?>
    <h2 class="article-header"><?php echo $existingUser ? ($readonly ? 'Student Profile' : 'Edit Student') : 'New Student'; ?></h2>
    <?php include 'components/divider.php' ?>
    <form method="POST" class="container">
      <?php include_once 'pages/userFields.php'?>
      <fieldset <?php echo $readonly ? 'disabled' : ''; ?>>
        <?php if (!$readonly) : ?>
          <div class="row mt-3">
            <div class="col text-right">
              <button class="ml-auto btn btn-darkgreen" type="submit" name="STUDENT_FORM">Save Student</button>
            </div>
          </div>
        <?php endif; ?>
      </fieldset>
      <?php if ($readonly) : ?>
        <fieldset>
          <div class="row mt-3">
            <?php
            $href = '/hsef/?page=studentForm';
            $href .= isset($_GET['sid']) ? '&sid='.$_GET['sid'] : '';
            ?>
            <div class="col-6">
              <a href="/hsef/?page=studentManagement" class="btn btn-yellow text-white">
                <i class="fas fa-angle-left text-white"></i>
                View All Students
              </a>
            </div>
            <div class="col-6 text-right">
              <a href="<?php echo $href.'&readonly=false' ?>" class="btn btn-darkgreen">
                <i class="fas fa-edit text-white"></i>
                Edit Student
              </a>
            </div>
          </div>
        </fieldset>
      <?php endif; // TODO: do the edit/readonly toggle with javascript, not a redirect ?>
    </form>
  </article>
</main>
