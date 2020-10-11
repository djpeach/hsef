<fieldset <?php echo $readonly ? 'disabled' : ''; ?>>
  <div class="row mt-3">
    <div class="col">
      <div class="floating-label-group">
        <input type="text" placeholder="Number*" id="boothNumber" name="boothNumber" value="<?php echo $post->boothNumber ?>">
        <label for="boothNumber">Number*</label>
        <p class="form-error"><?php echo $errors->boothNumber; ?></p>
      </div>
    </div>
  </div>
</fieldset>