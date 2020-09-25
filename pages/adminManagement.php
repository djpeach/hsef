<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner'])) {
  redirect('exception', ['errMsg' => 'You do not have permission to view this page']);
  die();
} ?>
<?php
  $post = new Post();
  $errors = new Errors();
  $delFormSubmitted = isset($_POST['ADMIN_DELETE_SUBMIT']);

  if ($delFormSubmitted) {
    $adminId = $post->operatorId;
    $sql = DB::get()->prepare(Queries::REMOVE_ADMIN_BY_OPID);
    $sql->execute([$adminId]);
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
    <h2 class="article-header">Admin Management</h2>
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
      <?php $admins = DB::get()->query(Queries::GET_ALL_ACTIVE_ADMINS)->fetchAll(); ?>
      <?php foreach ($admins as $admin) : ?>
        <div class="row row-sliding no-gutters pl-3">
          <div class="col-1">
            <p><?php echo $admin->OperatorId; ?></p>
          </div>
          <div class="col-4">
            <p><?php echo User::fullName($admin); ?></p>
          </div>
          <div class="col-5">
            <p><?php echo $admin->Email; ?></p>
          </div>
          <div class="col-2 d-md-none">
            <span class="tool-icon" data-toggle="row-slide" data-target="#tools-<?php echo $admin->OperatorId; ?>">
              <i class="fas fa-ellipsis-v text-darkgreen"></i>
            </span>
          </div>
          <div class="col-4 col-md-2 slide-tray" id="tools-<?php echo $admin->OperatorId; ?>">
            <a href="/hsef/?page=adminForm&id=<?php echo $admin->OperatorId ?>&readonly=false" class="col-4 tool-icon bg-green">
              <i class="fas fa-edit text-white"></i>
            </a>
            <a href="/hsef/?page=adminForm&id=<?php echo $admin->OperatorId ?>&readonly=true" class="col-4 tool-icon bg-primary">
              <i class="fas fa-user text-white"></i>
            </a>
            <button class="btn col-4 tool-icon btn-danger" data-toggle="modal" data-target="#deletionModal-<?php echo $admin->OperatorId; ?>">
              <i class="fas fa-trash text-white"></i>
            </button>
            <!-- Deletion Modal -->
            <div class="modal fade deletion-modal" id="deletionModal-<?php echo $admin->OperatorId; ?>" tabindex="-1">
              <div class="modal-dialog">
                <form method="POST">
                  <div class="modal-content">
                    <div class="modal-header bg-light font-weight-bold">
                      <h3 class="modal-title">Remove Admin</h3>
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
                      <p class="additional-info mt-4 text-center">This will <span class="font-weight-bold">demote</span> the admin, and they will lose access to all event management tools immediately.</p>
                    </div>
                    <div class="modal-footer">
                      <label for="operatorNameConfirmation-<?php echo $admin->OperatorId ?>">Please type <span class="font-weight-bold"><?php echo $admin->FirstName.' '.$admin->LastName ?></span> to confirm.</label>
                      <input type="text" name="deleteConfirm" id="operatorNameConfirmation-<?php echo $admin->OperatorId ?>">
                      <input type="text" name="operatorId" value="<?php echo $admin->OperatorId ?>" hidden>
                      <input type="text" name="deleteConfirmValue" value="<?php echo $admin->FirstName.' '.$admin->LastName ?>" hidden>
                      <button type="submit" class="btn btn-outline-danger mx-auto" name="ADMIN_DELETE_SUBMIT" disabled>I understand, remove admin.</button>
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
          <a class="btn btn-yellow text-white" href="/hsef/?page=adminForm">
            <i class="fas fa-plus mr-1"></i>
            New Admin
          </a>
        </div>
      </div>
    </div>
  </article>
</main>
<?php JS::get()->add('deletionModal'); ?>
