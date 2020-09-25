<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'admin'])) {
  redirect('exception', ['errMsg' => 'You do not have permission to view this page']);
  die();
} ?>
<main>
  <article class="limit-width-md pt-5">
    <?php $post = new Post(); $errors = new Errors(); ?>
    <?php
    $existingCategory = isset($_GET['id']);
    $formSubmitted = isset($_POST['CATEGORY_FORM']);

    if ($existingCategory && !$formSubmitted) {
      $sql = DB::get()->prepare(Queries::GET_CATEGORY_BY_ID);
      $sql->execute([$_GET['id']]);
      $category = $sql->fetch();
      $post->name = $category->Name;
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
        $id = $existingCategory ? $_GET["id"] : null;
        if ($existingCategory) {
          $sql = DB::get()->prepare(Queries::UPDATE_CATEGORY_NAME_BY_ID);
          $sql->execute([$post->name, $id]);
        } else {
          $sql = DB::get()->prepare(Queries::CREATE_NEW_CATEGORY);
          $sql->execute([$post->name]);
          $id = DB::get()->lastInsertId();
        }
        redirect('categoryForm', ['id'=>$id, 'readonly'=>true]);
      }
    }
    ?>
    <h2 class="article-header"><?php echo $existingCategory ? ($readonly ? 'Category Info' : 'Edit Category') : 'New Category'; ?></h2>
    <?php include 'components/divider.php' ?>
    <form method="POST" class="container">
      <?php include 'components/form-fields/categoryFields.php'; ?>
      <?php if ($readonly) : ?>
        <fieldset>
          <div class="row mt-3">
            <div class="col-6">
              <a href="/hsef/?page=categoryManagement" class="btn btn-yellow text-white">
                <i class="fas fa-angle-left text-white"></i>
                View All Categories
              </a>
            </div>
            <?php if ($existingCategory) : ?>
              <div class="col-6 text-right">
                <a href="/hsef/?page=categoryForm&id=<?php echo $_GET['id']; ?>&readonly=false" class="btn btn-darkgreen">
                  <i class="fas fa-edit text-white"></i>
                  Edit Category
                </a>
              </div>
            <?php endif; ?>
          </div>
        </fieldset>
      <?php else : ?>
        <fieldset>
          <div class="row mt-3">
            <div class="col text-right">
              <button class="btn btn-darkgreen" type="submit" name="CATEGORY_FORM">Save Category</button>
            </div>
          </div>
        </fieldset>
      <?php endif; // TODO: do the edit/readonly toggle with javascript, not a redirect ?>
    </form>
  </article>
</main>
