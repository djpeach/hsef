<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'admin'])) {
  redirect('exception', ['errMsg' => 'You do not have permission to view this page']);
  die();
} ?>
<?php
$post = new Post();
$errors = new Errors();
$delFormSubmitted = isset($_POST['CATEGORY_DELETE_SUBMIT']);

if ($delFormSubmitted) {
  $sql = DB::get()->prepare(Queries::DELETE_CATEGORY_BY_ID);
  $sql->execute([$post->categoryId]);
}
?>
<main>
  <article class="limit-width-md pt-5">
    <?php if (!$errors->isEmpty()) : ?>
      <div class="limit-width-sm alert alert-danger mb-5">
        <h4 class="alert-heading">Alert: </h4>
        <p>
          <?php echo $errors->message; ?>
        </p>
      </div>
    <?php endif; ?>
    <h2 class="article-header">Category Management</h2>
    <?php include 'components/divider.php' ?>
    <div class="container-sm data-table">
      <div class="row border-bottom border-darkgreen mb-3 no-gutters pl-2">
        <div class="col-2">
          <p class="font-weight-bold">Id</p>
        </div>
        <div class="col-6">
          <p class="font-weight-bold">Name</p>
        </div>
        <div class="col-2">
          <p class="font-weight-bold">Tools</p>
        </div>
      </div>
      <?php $categorys = DB::get()->query(Queries::GET_ALL_CATEGORIES)->fetchAll(); ?>
      <?php foreach ($categorys as $category) : ?>
        <div class="row row-sliding no-gutters pl-3">
          <div class="col-1">
            <p><?php echo $category->CategoryId; ?></p>
          </div>
          <div class="col">
            <p><?php echo $category->Name; ?></p>
          </div>
          <div class="col-2 d-md-none">
            <span class="tool-icon" data-toggle="row-slide" data-target="#tools-<?php echo $category->CategoryId; ?>">
              <i class="fas fa-ellipsis-v text-darkgreen"></i>
            </span>
          </div>
          <div class="col-4 col-md-2 slide-tray" id="tools-<?php echo $category->CategoryId; ?>">
            <a href="/hsef/?page=categoryForm&id=<?php echo $category->CategoryId ?>&readonly=false" class="col-4 tool-icon bg-green">
              <i class="fas fa-edit text-white"></i>
            </a>
            <a href="/hsef/?page=categoryForm&id=<?php echo $category->CategoryId ?>&readonly=true" class="col-4 tool-icon bg-primary">
              <i class="fas fa-user text-white"></i>
            </a>
            <button class="btn col-4 tool-icon btn-danger" data-toggle="modal" data-target="#deletionModal-<?php echo $category->CategoryId; ?>">
              <i class="fas fa-trash text-white"></i>
            </button>
            <!-- Deletion Modal -->
            <div class="modal fade deletion-modal" id="deletionModal-<?php echo $category->CategoryId; ?>" tabindex="-1">
              <div class="modal-dialog">
                <form method="POST">
                  <div class="modal-content">
                    <div class="modal-header bg-light font-weight-bold">
                      <h3 class="modal-title">Remove Category</h3>
                      <button type="button" class="close" data-dismiss="modal">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="alert alert-danger">
                        <h4 class="alert-heading">
                          <i class="fas fa-exclamation-circle"></i>
                          Warning: this is a destructive action
                        </h4>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <label for="categoryNameConfirmation-<?php echo $category->CategoryId ?>">Please type <span class="font-weight-bold"><?php echo $category->Name; ?></span> to confirm.</label>
                      <input type="text" name="deleteConfirm" id="categoryNameConfirmation-<?php echo $category->CategoryId ?>" disabled>
                      <input type="text" name="categoryId" value="<?php echo $category->CategoryId ?>" hidden>
                      <?php // TODO: figure out a way to pass the name confirm value to JS ?>
                      <input type="text" name="deleteConfirmValue" hidden>
                      <button type="submit" class="btn btn-outline-danger mx-auto" name="CATEGORY_DELETE_SUBMIT" disabled>I understand, remove category.</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <div class="row no-gutters mt-3">
        <div class="col text-right">
          <a class="btn btn-yellow text-white" href="/hsef/?page=categoryForm">
            <i class="fas fa-plus mr-1"></i>
            New Category
          </a>
        </div>
      </div>
    </div>
  </article>
</main>
<?php JS::get()->add('deletionModal'); ?>
