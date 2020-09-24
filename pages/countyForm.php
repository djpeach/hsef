<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'admin'])) {
  redirect('exception', ['errMsg' => 'You do not have permission to view this page']);
  die();
} ?>
<main>
  <article class="limit-width-md pt-5">
    <?php $post = new Post(); $errors = new Errors(); ?>
    <?php
    $existingCounty = isset($_GET['cid']);
    $formSubmitted = isset($_POST['COUNTY_FORM']);

    if ($existingCounty && !$formSubmitted) {
      $sql = DB::get()->prepare(Queries::GET_COUNTY_BY_ID);
      $sql->execute([$_GET['cid']]);
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
        redirect('countyForm', ['cid'=>1, 'readonly'=>true]);
      }
    }
    ?>
    <h2 class="article-header"><?php echo $existingCounty ? ($readonly ? 'County Info' : 'Edit County') : 'New County'; ?></h2>
    <?php include 'components/divider.php' ?>
    <form method="POST" class="container">
      <fieldset <?php echo $readonly ? 'disabled' : ''; ?>>
        <div class="row mt-3">
          <div class="col">
            <div class="floating-label-group">
              <input type="text" placeholder="Name*" id="name" name="name" value="<?php echo $post->name ?>">
              <label for="name">Name*</label>
              <p class="form-error"><?php echo $errors->name; ?></p>
            </div>
          </div>
        </div>
      </fieldset>
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
                <a href="/hsef/?page=countyForm&cid=<?php echo $_GET['cid']; ?>&readonly=false" class="btn btn-darkgreen">
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
<?php JS::get()->add('studentFields'); ?>
