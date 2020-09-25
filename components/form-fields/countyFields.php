<fieldset <?php echo $readonly ? 'disabled' : ''; ?>>
  <div class="row mt-3">
    <div class="col">
      <div class="floating-label-group">
        <input type="text" placeholder="Name*" id="countyName" name="countyName" value="<?php echo $post->countyName ?>">
        <label for="countyName">Name*</label>
        <p class="form-error"><?php echo $errors->countyName; ?></p>
      </div>
    </div>
  </div>
</fieldset>