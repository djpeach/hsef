<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'moderator'])) {
  redirect('exception', 'You do not have permission to view this page');
  die();
} ?>
<main>
  <article class="limit-width-md pt-5">
    <h2 class="article-header">Admin Management</h2>
    <?php include 'components/divider.php' ?>
    <div class="container-sm data-table">
      <div class="row border-bottom border-darkgreen mb-3 no-gutters">
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
        <div class="row no-gutters-r flex-nowrap">
          <div class="col-1">
            <p><?php echo $admin->OperatorId; ?></p>
          </div>
          <div class="col-4">
            <p><?php echo User::fullName($admin); ?></p>
          </div>
          <div class="col-5">
            <p><?php echo $admin->Email; ?></p>
          </div>
          <div class="col-2">
            <span class="tool-icon" data-toggle="rowSlide" data-target="#tools-<?php echo $admin->OperatorId; ?>">
              <i class="fas fa-ellipsis-v text-darkgreen"></i>
            </span>
          </div>
          <div class="col-10 d-flex justify-content-around" id="tools-<?php echo $admin->OperatorId; ?>">
              <span class="tool-icon bg-primary">
                <i class="fas fa-edit text-white"></i>
              </span>
              <span class="tool-icon bg-warning">
                <i class="fas fa-key text-white"></i>
              </span>
              <span class="tool-icon bg-danger">
                <i class="fas fa-trash text-white"></i>
              </span>
          </div>
        </div>
      <?php endforeach; ?>
      <div class="row mt-3">
        <a class="btn btn-gold" href="/hsef/?page=newAdmin"><i class="fas fa-plus"></i>New Admin</a>
      </div>
    </div>
  </article>
</main>
