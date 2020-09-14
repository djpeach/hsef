<?php require_once $_SERVER['DOCUMENT_ROOT'].'/hsef/helpers/fallback.php'; ?>
<?php if ($errors->authError) : ?>
  <div class="alert alert-danger limit-width-sm">
    <?php echo $errors->authError; ?>
  </div>
<?php endif; ?>
<form method="POST" class="login-form">
  <fieldset>
    <div class="row">
      <div class="col">
        <div class="floating-label-group">
          <input type="text" placeholder="Email" id="email" name="email" value="<?php echo Post::get()->email ?>">
          <label for="email">Email</label>
          <p class="form-error"><?php echo $errors->email; ?></p>
        </div>
      </div>
    </div>
    <div class="row mt3">
      <div class="col">
        <div class="floating-label-group">
          <input type="password" placeholder="Password" id="password" name="password">
          <label for="password">Password</label>
          <p class="form-error"><?php echo $errors->password; ?></p>
        </div>
      </div>
    </div>
    <div class="row mt-3">
      <button type="submit" name="LOGIN">Log In</button>
    </div>
  </fieldset>
</form>