<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'admin'])) {
  redirect('exception', ['errMsg' => 'You do not have permission to view this page']);
  die();
} ?>
<main>
  <article class="limit-width-md pt-5">
    <?php $post = new Post(); $errors = new Errors(); ?>
    <?php
    $existingCounty = isset($_GET['id']);
    $formSubmitted = isset($_POST['COUNTY_FORM']);

    if ($existingCounty && !$formSubmitted) {
      $sql = DB::get()->prepare(Queries::GET_COUNTY_BY_ID);
      $sql->execute([$_GET['id']]);
      $county = $sql->fetch();
      $post->name = $county->Name;
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
        // TODO database work
        redirect('countyForm', ['id'=>1, 'readonly'=>true]);
      }
    }
    ?>
    <h2 class="article-header"><?php echo $existingCounty ? ($readonly ? 'County Info' : 'Edit County') : 'New County'; ?></h2>
    <?php include 'components/divider.php' ?>
    <form method="POST" class="container">
      <?php include 'components/form-fields/countyFields.php'; ?>
      <?php if ($readonly) : ?>
        <fieldset>
          <div class="row mt-3">
            <div class="col-6">
              <a href="/hsef/?page=countyManagement" class="btn btn-yellow text-white">
                <i class="fas fa-angle-left text-white"></i>
                View All Counties
              </a>
            </div>
            <?php if ($existingCounty) : ?>
              <div class="col-6 text-right">
                <a href="/hsef/?page=countyForm&id=<?php echo $_GET['id']; ?>&readonly=false" class="btn btn-darkgreen">
                  <i class="fas fa-edit text-white"></i>
                  Edit County
                </a>
              </div>
            <?php endif; ?>
          </div>
        </fieldset>
      <?php else : ?>
        <fieldset>
          <div class="row mt-3">
            <div class="col text-right">
              <button class="btn btn-darkgreen" type="submit" name="COUNTY_FORM">Save County</button>
            </div>
          </div>
        </fieldset>
      <?php endif; // TODO: do the edit/readonly toggle with javascript, not a redirect ?>
    </form>
  </article>
</main>
