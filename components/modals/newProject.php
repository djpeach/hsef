<div class="modal fade" id="projectFormModal" tabindex="-1">
  <div class="modal-dialog" role="document">
    <form method="POST" id="newProjectFormInModal" class="modal-form">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Add a New Project</h3>
          <button type="button" class="close" data-dismiss="modal">
            <i class="fas fa-times"></i>
          </button>
        </div>
        <div class="modal-body">
          <ul id="projectFormErrors" class="text-danger ml-5"></ul>
          <?php include 'components/formFields/projectFields.php'; ?>
        </div>
        <div class="modal-footer d-flex justify-content-between">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-darkgreen" id="saveProject">Save Project</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php JSLoader::get()->add('entityCreation/projects'); ?>