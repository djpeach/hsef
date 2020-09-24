<fieldset <?php echo $readonly ? 'disabled' : ''; ?>>
  <div class="row mt-3">
    <div class="col">
      <div class="floating-label-group">
        <input type="text" placeholder="Number*" id="number" name="number" value="<?php echo $post->number ?>">
        <label for="number">Number*</label>
        <p class="form-error"><?php echo $errors->number; ?></p>
      </div>
    </div>
  </div>
</fieldset>