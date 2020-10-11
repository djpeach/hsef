<fieldset <?php echo $readonly ? 'disabled' : ''; ?>>
  <div class="row mt-3">
    <div class="col">
      <div class="floating-label-group">
        <input type="text" placeholder="Name*" id="gradeLevelName" name="gradeLevelName" value="<?php echo $post->gradeLevelName ?>">
        <label for="gradeLevelName">Name*</label>
        <p class="form-error"><?php echo $errors->gradeLevelName; ?></p>
      </div>
    </div>
  </div>
</fieldset>