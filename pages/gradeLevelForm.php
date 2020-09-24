<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'admin'])) {
  redirect('exception', ['errMsg' => 'You do not have permission to view this page']);
  die();
} ?>
<main>
  <article class="limit-width-md pt-5">
    <?php $post = new Post(); $errors = new Errors(); ?>
    <?php
    $existingGradeLevel = isset($_GET['glid']);
    $formSubmitted = isset($_POST['COUNTY_FORM']);

    if ($existingGradeLevel && !$formSubmitted) {
      $sql = DB::get()->prepare(Queries::GET_GRADELEVEL_BY_ID);
      $sql->execute([$_GET['glid']]);
      $gradeLevel = $sql->fetch();
      $post->name = $gradeLevel->Name;
    }

    $readonly = isset($_GET['readonly']) ? $_GET['readonly'] === 'true' : false;
    ?>
    <?php

    $requiredFields = ['name'];

    // Find and create validation errors
    if ($formSubmitted) {
      foreach ($requiredFields as $field) {
        if (!$post->{$field}) {
          $fieldName = cameltostr($field);
          $errors->{$field} = "$fieldName is required";
        }
      }

      if ($errors->isEmpty()) {
        $glid = $existingGradeLevel ? $_GET["glid"] : null;
        if ($existingGradeLevel) {
          $sql = DB::get()->prepare(Queries::UPDATE_GRADELEVEL_NAME_BY_ID);
          $sql->execute([$post->name, $glid]);
        } else {
          $sql = DB::get()->prepare(Queries::CREATE_NEW_GRADELEVEL);
          $sql->execute([$post->name]);
          $glid = DB::get()->lastInsertId();
        }
        redirect('gradeLevelForm', ['glid'=>$glid, 'readonly'=>true]);
      }
    }
    ?>
    <h2 class="article-header"><?php echo $existingGradeLevel ? ($readonly ? 'Grade Level Info' : 'Edit Grade Level') : 'New Grade Level'; ?></h2>
    <?php include 'components/divider.php' ?>
    <form method="POST" class="container">
      <?php include 'components/form-fields/gradeLevelFields.php'; ?>
      <?php if ($readonly) : ?>
        <fieldset>
          <div class="row mt-3">
            <div class="col-6">
              <a href="/hsef/?page=gradeLevelManagement" class="btn btn-yellow text-white">
                <i class="fas fa-angle-left text-white"></i>
                View All Grade Levels
              </a>
            </div>
            <?php if ($existingGradeLevel) : ?>
              <div class="col-6 text-right">
                <a href="/hsef/?page=gradeLevelForm&glid=<?php echo $_GET['glid']; ?>&readonly=false" class="btn btn-darkgreen">
                  <i class="fas fa-edit text-white"></i>
                  Edit Grade Level
                </a>
              </div>
            <?php endif; ?>
          </div>
        </fieldset>
      <?php else : ?>
        <fieldset>
          <div class="row mt-3">
            <div class="col text-right">
              <button class="btn btn-darkgreen" type="submit" name="COUNTY_FORM">Save Grade Level</button>
            </div>
          </div>
        </fieldset>
      <?php endif; // TODO: do the edit/readonly toggle with javascript, not a redirect ?>
    </form>
  </article>
</main>
