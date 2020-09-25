<fieldset <?php echo $readonly ? 'disabled' : ''; ?>>
  <div class="row mt-3">
    <div class="col-3">
      <div class="floating-label-group">
        <input type="text" placeholder="Number*" id="projectNumber" name="projectNumber" value="<?php echo $post->projectNumber ?>">
        <label for="projectNumber">Number*</label>
        <p class="form-error"><?php echo $errors->projectNumber; ?></p>
      </div>
    </div>
    <div class="col-9">
      <div class="floating-label-group">
        <input type="text" placeholder="Name*" id="projectName" name="projectName" value="<?php echo $post->projectName ?>">
        <label for="projectName">Name*</label>
        <p class="form-error"><?php echo $errors->projectName; ?></p>
      </div>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col">
      <div class="floating-label-group--textarea">
        <p class="group-label">Project's Abstract</p>
        <textarea type="text" placeholder="Abstract" id="abstract" name="abstract" rows="6"><?php echo $post->abstract; ?></textarea>
        <p class="form-error"><?php echo $errors->abstract; ?></p>
      </div>
    </div>
  </div>
  <div class="row no-gutters mt-3">
    <div class="col-10">
      <div class="floating-label-group pr-5" id="boothSelectDiv">
        <p class="group-label">Select Existing Booth</p>
        <input type="text" name="boothSelect" id="boothSelect" placeholder="Search for a booth" value="<?php echo $post->boothSelect ?>">
        <input type="text" name="boothId" id="boothId" hidden value="<?php echo $post->boothId ?>">
        <p class="form-error"><?php echo $errors->booth; ?></p>
      </div>
    </div>
    <div class="col-2 d-flex align-items-center">
      <button class="btn btn-sm btn-outline-darkgreen" type="button" data-toggle="modal" data-target="#boothFormModal">
        <i class="fas fa-plus mr-1"></i>
        New Booth
      </button>
    </div>
  </div>
  <div class="row no-gutters mt-3">
    <div class="col-10">
      <div class="floating-label-group pr-5" id="categorySelectDiv">
        <p class="group-label">Select Existing Category</p>
        <input type="text" name="categorySelect" id="categorySelect" placeholder="Search for a category" value="<?php echo $post->categorySelect ?>">
        <input type="text" name="categoryId" id="categoryId" hidden value="<?php echo $post->categoryId ?>">
        <p class="form-error"><?php echo $errors->category; ?></p>
      </div>
    </div>
    <div class="col-2 d-flex align-items-center">
      <button class="btn btn-sm btn-outline-darkgreen" type="button" data-toggle="modal" data-target="#categoryFormModal">
        <i class="fas fa-plus mr-1"></i>
        New Category
      </button>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col">
      <div class="floating-label-group">
        <input type="text" placeholder="Course Networking Id" id="cnid" name="cnid" value="<?php echo $post->cnid ?>">
        <label for="cnid">Course Networking Id</label>
        <p class="form-error"><?php echo $errors->cnid; ?></p>
      </div>
    </div>
  </div>
</fieldset>
<?php ModalLoader::get()->add('newBooth'); ?>
<?php ModalLoader::get()->add('newCategory'); ?>
<?php JS::get()->add('projectFields'); ?>