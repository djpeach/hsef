<fieldset <?php echo $readonly ? 'disabled' : ''; ?>>
  <?php if (!$existingAdmin) : ?>
    <div class="row mt-3">
    <div class="col">
      <div class="floating-label-group--checkbox">
        <p class="group-label">Select Existing User</p>
        <div class="row">
          <div class="col-2">
            <label class="switch d-block ml-auto mt-3">
              <input name="selectUserToggle" id="selectUserToggle" type="checkbox" data-toggle="collapse" data-target="#newUser" <?php echo $readonly ? '' : 'checked' ?>>
              <span class="slider round"></span>
            </label>
          </div>
          <div class="col-10">
            <label for="userSelect" class="d-none">User Select</label>
            <select id="userSelect" name="userSelect" class="ml-3">
              <option value="1">Daniel Peach</option>
              <option value="2">Ashley Harris</option>
              <option value="3">Daniel Northam</option>
              <option value="4">Kate Davis</option>
            </select>
          </div>
        </div>
        <p class="form-error"><?php echo $errors->user; ?></p>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <div id="newUser" class="<?php echo $existingAdmin ? '' : ($readonly ? '' : 'collapse') ?>">
    <?php if (!$existingAdmin) : ?>
      <p class="group-label mt-3">Create New User</p>
    <?php endif; ?>
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
  </div>
</fieldset>
<?php JS::get()->add('userFields'); ?>