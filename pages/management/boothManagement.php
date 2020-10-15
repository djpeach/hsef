<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'admin'])) {
  redirect('exception', ['errMsg' => 'You do not have permission to view this page']);
  die();
} ?>
<?php
$post = new Post();
$errors = new Errors();
$delFormSubmitted = isset($_POST['BOOTH_DELETE_SUBMIT']);

if ($delFormSubmitted) {
  $sql = DB::get()->prepare(Queries::DELETE_BOOTH_BY_ID);
  $sql->execute([$post->boothId]);
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
    <h2 class="article-header">Booth Management</h2>
    <?php include 'components/divider.php' ?>
    <div class="container-sm data-table">
      <div class="row border-bottom border-darkgreen mb-3 no-gutters pl-2">
        <div class="col-2">
          <p class="font-weight-bold">Id</p>
        </div>
        <div class="col-6">
          <p class="font-weight-bold">Number</p>
        </div>
        <div class="col-2">
          <p class="font-weight-bold">Tools</p>
        </div>
      </div>
      <?php $booths = DB::get()->query(Queries::GET_ALL_BOOTHS)->fetchAll(); ?>
      <?php foreach ($booths as $booth) : ?>
        <div class="row row-sliding no-gutters pl-3">
          <div class="col-1">
            <p><?php echo $booth->BoothId; ?></p>
          </div>
          <div class="col">
            <p><?php echo $booth->BoothNumber; ?></p>
          </div>
          <div class="col-2 d-md-none">
            <span class="tool-icon" data-toggle="row-slide" data-target="#tools-<?php echo $booth->BoothId; ?>">
              <i class="fas fa-ellipsis-v text-darkgreen"></i>
            </span>
          </div>
          <div class="col-4 col-md-2 slide-tray" id="tools-<?php echo $booth->BoothId; ?>">
            <a href="/hsef/?page=boothForm&id=<?php echo $booth->BoothId ?>&readonly=false" class="col-4 tool-icon bg-green">
              <i class="fas fa-edit text-white"></i>
            </a>
            <a href="/hsef/?page=boothForm&id=<?php echo $booth->BoothId ?>&readonly=true" class="col-4 tool-icon bg-primary">
              <i class="fas fa-user text-white"></i>
            </a>
            <button class="btn col-4 tool-icon btn-danger" data-toggle="modal" data-target="#deletionModal-<?php echo $booth->BoothId; ?>">
              <i class="fas fa-trash text-white"></i>
            </button>
            <!-- Deletion Modal -->
            <div class="modal fade deletion-modal" id="deletionModal-<?php echo $booth->BoothId; ?>" tabindex="-1">
              <div class="modal-dialog">
                <form method="POST">
                  <div class="modal-content">
                    <div class="modal-header bg-light font-weight-bold">
                      <h3 class="modal-title">Remove Booth</h3>
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
                      <label for="boothNameConfirmation-<?php echo $booth->BoothId ?>">Please type <span class="font-weight-bold"><?php echo $booth->BoothNumber; ?></span> to confirm.</label>
                      <input type="text" name="deleteConfirm" id="boothNameConfirmation-<?php echo $booth->BoothId ?>">
                      <input type="text" name="boothId" value="<?php echo $booth->BoothId ?>" hidden>
                      <?php // TODO: figure out a way to pass the name confirm value to JS ?>
                      <input type="text" name="deleteConfirmValue" hidden>
                      <button type="submit" class="btn btn-outline-danger mx-auto" name="BOOTH_DELETE_SUBMIT" disabled>I understand, remove booth.</button>
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
          <a class="btn btn-yellow text-white" href="/hsef/?page=boothForm">
            <i class="fas fa-plus mr-1"></i>
            New Booth
          </a>
        </div>
      </div>
    </div>
  </article>
</main>
<?php JSLoader::get()->add('modals/deletionModal'); ?>
