<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'admin'])) {
  redirect('exception', ['errMsg' => 'You do not have permission to view this page']);
  die();
} ?>
<?php
$post = new Post();
$errors = new Errors();
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
    <h2 class="article-header">Judge Archives</h2>
    <?php include 'components/divider.php' ?>
    <div class="container-sm data-table">
      <div class="row border-bottom border-darkgreen mb-3 no-gutters pl-2">
        <div class="col-1">
          <p class="font-weight-bold">Id</p>
        </div>
        <div class="col-3">
          <p class="font-weight-bold">Name</p>
        </div>
        <div class="col-4">
          <p class="font-weight-bold">Email</p>
        </div>
        <div class="col-2">
          <p class="font-weight-bold">Checked In</p>
        </div>
        <div class="col-2">
          <p class="font-weight-bold">Tools</p>
        </div>
      </div>
      <div class="text-center" id="app">
        <div v-if="loading">
          <div  class="spinner-border spinner-border-xl text-darkgreen">
            <span class="sr-only">Loading...</span>
          </div>
        </div>
        <div v-else-if="error">

          <div class="alert alert-danger">
            <p class="mb-0">{{error}}</p>
          </div>
        </div>
        <div v-else>
          <div v-for="judge in judges" class="row row-sliding no-gutters pl-3">
            <div class="col-1">
              <p>{{judge.OperatorId}}</p>
            </div>
            <div class="col-3">
              <p>{{judge|fullName}}</p>
            </div>
            <div class="col-4">
              <p v-if="judge.Email">
                  <a :href="`mailto:${judge.Email}`">
                    {{judge.Email}}
                  </a>
              </p>
              <p v-else>N/A</p>
            </div>
            <div class="col-2 text-center">
              <p class="font-weight-bold">
                  <i v-if="judge.CheckedIn" class="fas fa-check-square"></i>
                  <i v-else class="fas fa-times"></i>
              </p>
            </div>
            <div class="col-2 d-md-none">
            <span class="tool-icon" data-toggle="row-slide" :data-target="`#tools-${judge.OperatorId}`">
              <i class="fas fa-ellipsis-v text-darkgreen"></i>
            </span>
            </div>
            <div class="col-4 col-md-2 slide-tray" :id="`tools-${judge.OperatorId}`">
              <a :href="`/hsef/?page=judgeForm&id=${judge.OperatorId}&readonly=false`" class="col-4 tool-icon bg-green">
                <i class="fas fa-edit text-white"></i>
              </a>
              <a :href="`/hsef/?page=judgeForm&id=${judge.OperatorId}&readonly=true`" class="col-4 tool-icon bg-primary">
                <i class="fas fa-user text-white"></i>
              </a>
              <button class="btn col-4 tool-icon btn-yellow" data-toggle="modal" :data-target="`#invitationModal-${judge.OperatorId}`">
                <i class="fas fa-envelope text-white"></i>
              </button>
            </div>
            <!-- Deletion Modal -->
            <div class="modal fade deletion-modal" :id="`invitationModal-${judge.OperatorId}`" tabindex="-1">
              <div class="modal-dialog">
                <form method="POST">
                  <div class="modal-content">
                    <div class="modal-header bg-light font-weight-bold">
                      <h3 class="modal-title">Invite Judge</h3>
                      <button type="button" class="close" data-dismiss="modal">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-outline-yellow mx-auto" name="JUDGE_DELETE_SUBMIT">Send Invitation</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </article>
</main>
<?php JSLoader::get()->add('modals/deletionModal'); ?>
<?php JSLoader::get()->add('vendors/vue'); ?>
<?php JSLoader::get()->add('vue/judgeArchives'); ?>
