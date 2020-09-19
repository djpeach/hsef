<!-- the file that includes this must set $post, $errors, $existingUser, $allowUserSelect, and $didSelectUser -->
<?php if (!$existingUser && $allowUserSelect) : ?>
  <div class="row mt-3">
  <div class="col">
    <div class="floating-label-group--checkbox">
      <p class="group-label">Select Existing User</p>
      <div class="row">
        <div class="col-2">
          <label class="switch d-block ml-auto mt-4">
            <input name="selectUserToggle" id="selectUserToggle" type="checkbox" data-toggle="collapse" data-target="#userDetailFields" <?php echo $didSelectUser ? 'checked' : '' ?>>
            <span class="slider round"></span>
          </label>
        </div>
        <div class="col-10" id="userSelectDiv">

          <label for="userSelect" class="d-none">User Select</label>
          <input type="text" name="userSelect" id="userSelect" placeholder="Search for a user" value="<?php echo $post->userSelect ?>">
          <input type="text" name="userId" id="userId" hidden value="<?php echo $post->userId ?>">
        </div>
      </div>
      <p class="form-error"><?php echo $errors->user; ?></p>
    </div>
  </div>
</div>
<?php endif; ?>
<div id="userDetailFields" class="<?php echo ($existingUser || !$allowUserSelect) ? '' : ($didSelectUser ? 'collapse' : 'show') ?>">
  <?php if (!$existingUser) : ?>
    <p class="group-label mt-3">Create New User</p>
  <?php endif; ?>
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
</div>
<?php JS::get()->add('userFields'); ?>