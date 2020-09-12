<?php
  // initialize errors, set to empty unless request_method is POST
  $errors = new Errors($_SERVER['REQUEST_METHOD'] === 'POST');

  $requiredFields = ['email', 'password'];

  // if request is POST, check all required fields
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($requiredFields as $field) {
      if (!$post->{$field}) {
        $errors->{$field} = "You must set a value for {$field}";
      }
    }

    // additionally check that email format is valid
    if (!$errors->email && !filter_var($post->email, FILTER_VALIDATE_EMAIL)) {
      $errors->email = 'Value set is not a valid email';
    }

    // if no errors, fetch user from db and compare password
    // if passwords match, set session data and send to auth'd page
  }


?>
<form method="POST" class="login-form">
  <fieldset>
    <div class="row mt-3">
      <div class="col">
        <div class="floating-label-group">
          <input type="text" placeholder="Email" id="email" name="email" value="<?php echo $post->email ?>">
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
      <button type="submit">Submit</button>
    </div>
  </fieldset>
</form>