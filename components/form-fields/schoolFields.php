<fieldset <?php echo $readonly ? 'disabled' : ''; ?>>
  <div class="row mt-3">
    <div class="col">
      <div class="floating-label-group">
        <input type="text" placeholder="School Name*" id="name" name="name" value="<?php echo $post->name ?>">
        <label for="name">School Name*</label>
        <p class="form-error"><?php echo $errors->name; ?></p>
      </div>
    </div>
  </div>
  <div class="row no-gutters mt-3">
    <div class="col-10">
      <div class="floating-label-group pr-5" id="countySelectDiv">
        <p class="group-label">Select Existing County</p>
        <input type="text" name="countySelect" id="countySelect" placeholder="Search for a county" value="<?php echo $post->countySelect ?>">
        <input type="text" name="countyId" id="countyId" hidden value="<?php echo $post->countyId ?>">
        <p class="form-error"><?php echo $errors->county; ?></p>
      </div>
    </div>
    <div class="col-2 d-flex align-items-center">
      <button class="btn btn-sm btn-outline-darkgreen" type="button" data-toggle="modal" data-target="#countyFormModal">
        <i class="fas fa-plus mr-1"></i>
        New County
      </button>
    </div>
  </div>
</fieldset>
<?php ModalLoader::get()->add('newCounty'); ?>
<?php JS::get()->add('schoolFields'); ?>
