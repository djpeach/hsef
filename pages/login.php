<?php
// initialize errors, set to empty unless request_method is POST
$errors = new Errors($_SERVER['REQUEST_METHOD'] === 'POST');

$requiredFields = ['email', 'password'];

// if request is POST, check all required fields
if (isset(Post::get()->LOGIN)) {
  foreach ($requiredFields as $field) {
    if (!Post::get()->{$field}) {
      $errors->{$field} = "You must provide a {$field}";
    }
  }

  // additionally check that email format is valid
  if (!$errors->email && !filter_var(Post::get()->email, FILTER_VALIDATE_EMAIL)) {
    $errors->email = 'Value set is not a valid email';
  }

  if ($errors->isEmpty()) {
    $post = Post::get();
    try {
      AuthAccount::get()->authenticateWithEmailPassword($post->email, $post->password);
      if (AuthAccount::get()->isAuthenticated()) {
        redirect('dashboard');
      } else {
        throw new AuthException('Could not authenticate for unknown reason');
      }
    } catch (AuthException $e) {
      $errors->authError = $e->getMessage();
    }
  }
}


?>
<main>
  <article class="limit-width-sm">
    <h2 class="article-header">Judge & Admin Login Portal</h2>
    <?php include 'components/divider.php' ?>
    <?php require 'components/login-form.php' ?>
  </article>
</main>