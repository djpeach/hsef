<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'admin'])) {
  redirect('exception', ['errMsg' => 'You do not have permission to view this page']);
  die();
} ?>
<?php
$post = new Post();
$errors = new Errors();
$delFormSubmitted = isset($_POST['JUDGE_DELETE_SUBMIT']);

if ($delFormSubmitted) {
  $delType = $post->deleteType;
  $judgeId = $post->operatorId;

  $sql = null;
  if ($delType === "delete") {
    $sql = DB::get()->prepare(Queries::ARCHIVE_OPERATOR_BY_ID);
  } else if ($delType === "demote") {
    $sql = DB::get()->prepare(Queries::REMOVE_JUDGE_BY_OPID);
  } else {
    $errors->message = "Something went wrong, please try again";
  }

  if ($errors->isEmpty()) {
    if (!$sql->execute([$judgeId])) {
      $errors->message = "Database execution went wrong, please try again";
    }
  }
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
    <h2 class="article-header">Judge Management</h2>
    <?php include 'components/divider.php' ?>
    <div class="container-sm data-table">
      <div class="row border-bottom border-darkgreen mb-3 no-gutters pl-2">
        <div class="col-1">
          <p class="font-weight-bold">Id</p>
        </div>
        <div class="col-4">
          <p class="font-weight-bold">Name</p>
        </div>
        <div class="col-5">
          <p class="font-weight-bold">Email</p>
        </div>
        <div class="col-2">
          <p class="font-weight-bold">Tools</p>
        </div>
      </div>
      <?php $judges = DB::get()->query(Queries::GET_ALL_ACTIVE_JUDGES)->fetchAll(); ?>
      <?php foreach ($judges as $judge) : ?>
        <div class="row row-sliding no-gutters pl-3">
          <div class="col-1">
            <p><?php echo $judge->OperatorId; ?></p>
          </div>
          <div class="col-4">
            <p><?php echo User::fullName($judge); ?></p>
          </div>
          <div class="col-5">
            <p><?php echo $judge->Email; ?></p>
          </div>
          <div class="col-2 d-md-none">
            <span class="tool-icon" data-toggle="row-slide" data-target="#tools-<?php echo $judge->OperatorId; ?>">
              <i class="fas fa-ellipsis-v text-darkgreen"></i>
            </span>
          </div>
          <div class="col-4 col-md-2 slide-tray" id="tools-<?php echo $judge->OperatorId; ?>">
            <a href="/hsef/?page=judgeForm&opid=<?php echo $judge->OperatorId ?>&readonly=false" class="col-4 tool-icon bg-green">
              <i class="fas fa-edit text-white"></i>
            </a>
            <a href="/hsef/?page=judgeForm&opid=<?php echo $judge->OperatorId ?>&readonly=true" class="col-4 tool-icon bg-primary">
              <i class="fas fa-user text-white"></i>
            </a>
            <button class="btn col-4 tool-icon btn-danger" data-toggle="modal" data-target="#deletionModal-<?php echo $judge->OperatorId; ?>">
              <i class="fas fa-trash text-white"></i>
            </button>
            <!-- Deletion Modal -->
            <div class="modal fade deletion-modal" id="deletionModal-<?php echo $judge->OperatorId; ?>" tabindex="-1">
              <div class="modal-dialog">
                <form method="POST">
                  <div class="modal-content">
                    <div class="modal-header bg-light font-weight-bold">
                      <h3 class="modal-title">Remove Judge</h3>
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
                      <div class="radio-btns">
                        <div class="radio-btns-group">
                          <input type="radio" id="demote-<?php echo $judge->OperatorId; ?>" name="deleteType" value="demote">
                          <label for="demote-<?php echo $judge->OperatorId; ?>">Demote from Judge</label>
                        </div>
                        <p class="additional-info">This will <span class="font-weight-bold">remove the judge permissions from</span> the user, but retain them in the system for the current year. They will lose all access to judge tools immediately.</p>
                        <div class="radio-btns-group">
                          <input type="radio" id="delete-<?php echo $judge->OperatorId; ?>" name="deleteType" value="delete">
                          <label for="delete-<?php echo $judge->OperatorId; ?>">Delete user from system</label>
                        </div>
                        <p class="additional-info">This will <span class="font-weight-bold">delete</span> the user, and <span class="font-weight-bold">remove them from the system for the current year</span></p>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <label for="operatorNameConfirmation-<?php echo $judge->OperatorId ?>">Please type <span class="font-weight-bold"><?php echo $judge->FirstName.' '.$judge->LastName ?></span> to confirm.</label>
                      <input type="text" name="deleteConfirm" id="operatorNameConfirmation-<?php echo $judge->OperatorId ?>" disabled>
                      <input type="text" name="operatorId" value="<?php echo $judge->OperatorId ?>" hidden>
                      <?php // TODO: figure out a way to pass the name confirm value to JS ?>
                      <input type="text" name="deleteConfirmValue" value="<?php echo $judge->FirstName.' '.$judge->LastName ?>" hidden>
                      <button type="submit" class="btn btn-outline-danger mx-auto" name="JUDGE_DELETE_SUBMIT" disabled>I understand, remove judge.</button>
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
          <a class="btn btn-yellow text-white" href="/hsef/?page=judgeForm">
            <i class="fas fa-plus mr-1"></i>
            New Judge
          </a>
        </div>
      </div>
    </div>
  </article>
</main>
<?php JS::get()->add('deletionModal'); ?>
