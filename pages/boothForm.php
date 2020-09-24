<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'admin'])) {
  redirect('exception', ['errMsg' => 'You do not have permission to view this page']);
  die();
} ?>
<main>
  <article class="limit-width-md pt-5">
    <?php $post = new Post(); $errors = new Errors(); ?>
    <?php
    $existingBooth = isset($_GET['bid']);
    $formSubmitted = isset($_POST['BOOTH_FORM']);

    if ($existingBooth && !$formSubmitted) {
      $sql = DB::get()->prepare(Queries::GET_BOOTH_BY_ID);
      $sql->execute([$_GET['bid']]);
      $booth = $sql->fetch();
      $post->number = $booth->Number;
    }

    $readonly = isset($_GET['readonly']) ? $_GET['readonly'] === 'true' : false;
    ?>
    <?php

    $requiredFields = ['number'];

    // Find and create validation errors
    if ($formSubmitted) {
      foreach ($requiredFields as $field) {
        if (!$post->{$field}) {
          $fieldName = cameltostr($field);
          $errors->{$field} = "$fieldName is required";
        }
      }

      if ($errors->isEmpty()) {
        $bid = $existingBooth ? $_GET["bid"] : null;
        if ($existingBooth) {
          $sql = DB::get()->prepare(Queries::UPDATE_BOOTH_NUMBER_BY_ID);
          $sql->execute([$post->number, $bid]);
        } else {
          $sql = DB::get()->prepare(Queries::CREATE_NEW_BOOTH);
          $sql->execute([$post->number]);
          $bid = DB::get()->lastInsertId();
        }
        redirect('boothForm', ['bid'=>$bid, 'readonly'=>true]);
      }
    }
    ?>
    <h2 class="article-header"><?php echo $existingBooth ? ($readonly ? 'Booth Info' : 'Edit Booth') : 'New Booth'; ?></h2>
    <?php include 'components/divider.php' ?>
    <form method="POST" class="container">
      <?php include 'components/form-fields/boothFields.php'; ?>
      <?php if ($readonly) : ?>
        <fieldset>
          <div class="row mt-3">
            <div class="col-6">
              <a href="/hsef/?page=boothManagement" class="btn btn-yellow text-white">
                <i class="fas fa-angle-left text-white"></i>
                View All Booths
              </a>
            </div>
            <?php if ($existingBooth) : ?>
              <div class="col-6 text-right">
                <a href="/hsef/?page=boothForm&bid=<?php echo $_GET['bid']; ?>&readonly=false" class="btn btn-darkgreen">
                  <i class="fas fa-edit text-white"></i>
                  Edit Booth
                </a>
              </div>
            <?php endif; ?>
          </div>
        </fieldset>
      <?php else : ?>
        <fieldset>
          <div class="row mt-3">
            <div class="col text-right">
              <button class="btn btn-darkgreen" type="submit" name="BOOTH_FORM">Save Booth</button>
            </div>
          </div>
        </fieldset>
      <?php endif; // TODO: do the edit/readonly toggle with javascript, not a redirect ?>
    </form>
  </article>
</main>
