<fieldset <?php echo $readonly ? 'disabled' : ''; ?>>
    <div class="row mt-3">
      <div class="col">
        <div class="floating-label-group">
          <input type="text" placeholder="First Name*" id="firstName" name="firstName" value="<?php echo $post->firstName ?>">
          <label for="firstName">First Name*</label>
          <p class="form-error"><?php echo $errors->firstName; ?></p>
        </div>
      </div>
      <div class="col">
        <div class="floating-label-group">
          <input type="text" placeholder="Last Name*" id="lastName" name="lastName" value="<?php echo $post->lastName ?>">
          <label for="lastName">Last Name*</label>
          <p class="form-error"><?php echo $errors->lastName; ?></p>
        </div>
      </div>
      <div class="col-2">
        <div class="floating-label-group">
          <input type="text" placeholder="Suffix" id="suffix" name="suffix" value="<?php echo $post->suffix ?>">
          <label for="suffix">Suffix</label>
          <p class="form-error"><?php echo $errors->suffix; ?></p>
        </div>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col">
        <div class="floating-label-group">
          <input type="email" placeholder="Email*" id="email" name="email" value="<?php echo $post->email ?>">
          <label for="email">Email*</label>
          <p class="form-error"><?php echo $errors->email; ?></p>
        </div>
      </div>
    </div>
</fieldset>