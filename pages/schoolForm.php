<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'admin'])) {
  redirect('exception', ['errMsg' => 'You do not have permission to view this page']);
  die();
} ?>
<main>
  <article class="limit-width-md pt-5">
    <?php $post = new Post(); $errors = new Errors(); ?>
    <?php
    $existingSchool = isset($_GET['id']);
    $formSubmitted = isset($_POST['SCHOOL_FORM']);

    if ($existingSchool && !$formSubmitted) {
      $sql = DB::get()->prepare(Queries::GET_SCHOOL_BY_ID);
      $sql->execute([$_GET['id']]);
      $school = $sql->fetch();
      $post->schoolName = $school->SchoolName;
      $post->countyId = $school->CountyId;
      $post->countySelect = $school->CountyName;
    }

    $readonly = isset($_GET['readonly']) ? $_GET['readonly'] === 'true' : false;
    ?>
    <?php

    $requiredFields = ['schoolName'];

    // Find and create validation errors
    if ($formSubmitted) {
      foreach ($requiredFields as $field) {
        if (!$post->{$field}) {
          $fieldName = cameltostr($field);
          $errors->{$field} = "$fieldName is required";
        }
      }

      if ($errors->isEmpty()) {
        $db = DB::get();
        $id = $existingSchool ? $_GET['id'] : null;
        $countyId = $post->countySelect ? $post->countyId : null;

        if ($existingSchool) {
          $sql = $db->prepare(Queries::UPDATE_SCHOOL_BY_ID);
          $sql->execute([$post->schoolName, $countyId, $id]);
        } else {
          $sql = $db->prepare(Queries::CREATE_NEW_SCHOOL);
          $sql->execute([$post->schoolName, $countyId]);
          $id = $db->lastInsertId();
        }
        redirect('schoolForm', ['id'=>$id, 'readonly'=>true]);
      }
    }
    ?>
    <h2 class="article-header"><?php echo $existingSchool ? ($readonly ? 'School Info' : 'Edit School') : 'New School'; ?></h2>
    <?php include 'components/divider.php' ?>
    <form method="POST" class="container">
      <?php include 'components/form-fields/schoolFields.php'; ?>
      <?php if ($readonly) : ?>
        <fieldset>
          <div class="row mt-3">
            <div class="col-6">
              <a href="/hsef/?page=schoolManagement" class="btn btn-yellow text-white">
                <i class="fas fa-angle-left text-white"></i>
                View All Schools
              </a>
            </div>
            <?php if ($existingSchool) : ?>
              <div class="col-6 text-right">
                <a href="/hsef/?page=schoolForm&id=<?php echo $_GET['id']; ?>&readonly=false" class="btn btn-darkgreen">
                  <i class="fas fa-edit text-white"></i>
                  Edit School
                </a>
              </div>
            <?php endif; ?>
          </div>
        </fieldset>
      <?php else : ?>
        <fieldset>
          <div class="row mt-3">
            <div class="col text-right">
              <button class="btn btn-darkgreen" type="submit" name="SCHOOL_FORM">Save School</button>
            </div>
          </div>
        </fieldset>
      <?php endif; // TODO: do the edit/readonly toggle with javascript, not a redirect ?>
    </form>
  </article>
</main>
