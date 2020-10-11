<div class="modal fade" id="gradeLevelFormModal" tabindex="-1">
  <div class="modal-dialog" role="document">
    <form method="POST" id="newGradeLevelFormInModal" class="modal-form">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Add a New Grade Level</h3>
          <button type="button" class="close" data-dismiss="modal">
            <i class="fas fa-times"></i>
          </button>
        </div>
        <div class="modal-body">
          <ul id="gradeLevelFormErrors" class="text-danger ml-5"></ul>
          <?php include 'components/formFields/gradeLevelFields.php'; ?>
        </div>
        <div class="modal-footer d-flex justify-content-between">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-darkgreen" id="saveGradeLevel">Save Grade Level</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php JSLoader::get()->add('entityCreation/gradeLevels'); ?>