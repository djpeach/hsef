<fieldset <?php echo $readonly ? 'disabled' : ''; ?>>
  <div class="row mt-3">
    <div class="col">
      <div class="floating-label-group">
        <input type="text" placeholder="Name*" id="categoryName" name="categoryName" value="<?php echo $post->categoryName ?>">
        <label for="categoryName">Name*</label>
        <p class="form-error"><?php echo $errors->name; ?></p>
      </div>
    </div>
  </div>
</fieldset>