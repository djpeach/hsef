<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'moderator'])) {
  redirect('exception', 'You do not have permission to view this page');
  die();
} ?>
<main>
  <article class="limit-width-md pt-5">
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
      <?php $admins = DB::get()->query(Queries::GET_ALL_ADMINS)->fetchAll(); ?>
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
            <a href="/hsef/?page=adminForm&opid=<?php echo $admin->OperatorId ?>&readonly=false" class="col-4 tool-icon bg-green">
              <i class="fas fa-edit text-white"></i>
            </a>
            <a href="/hsef/?page=adminForm&opid=<?php echo $admin->OperatorId ?>&readonly=true" class="col-4 tool-icon bg-primary">
              <i class="fas fa-user text-white"></i>
            </a>
            <button class="btn col-4 tool-icon btn-danger" data-toggle="modal" data-target="#deletionModalLabel-<?php echo $admin->OperatorId; ?>">
              <i class="fas fa-trash text-white"></i>
            </button>
            <!-- Deletion Modal -->
            <div class="modal fade" id="deletionModal" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="deletionModalLabel-<?php echo $admin->OperatorId; ?>">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="alert alert-danger">
                      <h4 class="alert-heading">Warning: This is a destructive action</h4>
                      <p>Do you want to remove this user as an admin, or remove this user from the system completely?</p>
                      <hr>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger">Demote from Admin</button>
                    <button type="button" class="btn btn-danger">Delete from System</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <div class="row mt-3">
        <a class="btn btn-gold" href="/hsef/?page=adminForm"><i class="fas fa-plus"></i>New Admin</a>
      </div>
    </div>
  </article>
</main>
