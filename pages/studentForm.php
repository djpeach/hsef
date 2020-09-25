<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'admin'])) {
  redirect('exception', ['errMsg' => 'You do not have permission to view this page']);
  die();
} ?>
<main>
  <article class="limit-width-md pt-5">
    <?php $post = new Post(); $errors = new Errors(); ?>
    <?php
    $existingUser = isset($_GET['id']);
    $allowUserSelect = false;
    if ($existingUser && !isset($_POST['STUDENT_FORM'])) {
      $sql = DB::get()->prepare(Queries::GET_STUDENT_BY_ID);
      $sql->execute([$_GET['id']]);
      $student = $sql->fetch();
      $post->schoolId = $student->SchoolId;
      $post->schoolSelect = $student->SchoolName;
      $post->gradeLevelId = $student->GradeLevelId;
      $post->gradeLevelSelect = $student->GradeLevelName;
      $post->projectId = $student->ProjectId;
      $post->projectSelect = $student->ProjectName;
      $post->firstName = $student->FirstName;
      $post->lastName = $student->LastName;
      $post->suffix = $student->Suffix;
      $post->email = $student->Email;
    }

    $readonly = isset($_GET['readonly']) ? $_GET['readonly'] === 'true' : false;
    ?>
    <?php

    $requiredUserFields = ['firstName', 'lastName'];
    $formSubmitted = isset($_POST['STUDENT_FORM']);

    // Find and create validation errors
    if ($formSubmitted) {
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

      if ($errors->isEmpty()) {
        $db = DB::get();
        $id =$existingUser ? $_GET['id'] : null;
        if ($existingUser) { // edited existing student
          // update user details
          $sql = $db->prepare(Queries::UPDATE_USER_BY_SID);
          $email = $post->email === '' ? null : $post->email;
          $sql->execute([$post->firstName, $post->lastName, $post->suffix, $email, $id]);
          // update student details
          $sql = $db->prepare(Queries::UPDATE_STUDENT_BY_ID);
          $schoolId = $post->schoolId ? $post->schoolId : null;
          $gradeLevelId = $post->gradeLevelId ? $post->gradeLevelId : null;
          $projectId = $post->projectId ? $post->projectId : null;
          $sql->execute([$schoolId, $gradeLevelId, $projectId, $id]);
        }
        redirect('studentForm', ['id'=>$id, 'readonly'=>true]);
      }
    }
    ?>
    <h2 class="article-header"><?php echo $existingUser ? ($readonly ? 'Student Profile' : 'Edit Student') : 'New Student'; ?></h2>
    <?php include 'components/divider.php' ?>
    <form method="POST" class="container">
      <?php include_once 'pages/userFields.php'?>
      <fieldset <?php echo $readonly ? 'disabled' : ''; ?>>
        <div class="row no-gutters mt-3">
          <div class="col-10">
            <div class="floating-label-group pr-5" id="schoolSelectDiv">
              <p class="group-label">Select Existing School</p>
              <input type="text" name="schoolSelect" id="schoolSelect" placeholder="Search for a school" value="<?php echo $post->schoolSelect ?>">
              <input type="text" name="schoolId" id="schoolId" hidden value="<?php echo $post->schoolId ?>">
              <p class="form-error"><?php echo $errors->school; ?></p>
            </div>
          </div>
          <div class="col-2 d-flex align-items-center">
            <button class="btn btn-sm btn-outline-darkgreen" type="button" data-toggle="modal" data-target="#schoolFormModal">
              <i class="fas fa-plus mr-1"></i>
              New School
            </button>
          </div>
        </div>
        <div class="row no-gutters mt-3">
          <div class="col-10">
            <div class="floating-label-group pr-5" id="gradeLevelSelectDiv">
              <p class="group-label">Select Existing Grade Level</p>
              <input type="text" name="gradeLevelSelect" id="gradeLevelSelect" placeholder="Search for a grade level" value="<?php echo $post->gradeLevelSelect ?>">
              <input type="text" name="gradeLevelId" id="gradeLevelId" hidden value="<?php echo $post->gradeLevelId ?>">
              <p class="form-error"><?php echo $errors->gradeLevel; ?></p>
            </div>
          </div>
          <div class="col-2 d-flex align-items-center">
            <button class="btn btn-sm btn-outline-darkgreen" type="button" data-toggle="modal" data-target="#gradeLevelFormModal">
              <i class="fas fa-plus mr-1"></i>
              New Grade Level
            </button>
          </div>
        </div>
        <div class="row no-gutters mt-3">
          <div class="col-10">
            <div class="floating-label-group pr-5" id="categorySelectDiv">
              <p class="group-label">Select Existing Project</p>
              <input type="text" name="projectSelect" id="projectSelect" placeholder="Search for a project" value="<?php echo $post->projectSelect ?>">
              <input type="text" name="projectId" id="projectId" hidden value="<?php echo $post->projectId ?>">
              <p class="form-error"><?php echo $errors->project; ?></p>
            </div>
          </div>
          <div class="col-2 d-flex align-items-center">
            <button class="btn btn-sm btn-outline-darkgreen" type="button" data-toggle="modal" data-target="#projectFormModal">
              <i class="fas fa-plus mr-1"></i>
              New Project
            </button>
          </div>
        </div>
      </fieldset>
      <?php if (!$readonly) : ?>
        <div class="row mt-3">
          <div class="col text-right">
            <button class="btn btn-darkgreen" type="submit" name="STUDENT_FORM">Save Student</button>
          </div>
        </div>
      <?php else : ?>
        <div class="row mt-3">
          <?php
          $href = '/hsef/?page=studentForm';
          $href .= isset($_GET['id']) ? '&id='.$_GET['id'] : '';
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
      <?php endif; ?>
    </form>
  </article>
</main>
<?php ModalLoader::get()->add('newSchool'); ?>
<?php ModalLoader::get()->add('newGradeLevel'); ?>
<?php ModalLoader::get()->add('newProject'); ?>
<?php JS::get()->add('studentFields'); ?>
