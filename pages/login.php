<?php require_once $_SERVER['DOCUMENT_ROOT'].'/hsef/helpers/fallback.php'; ?>
<?php if ($authAccount->isAuthenticated()) { redirect('dashboard'); } ?>
<?php
// initialize errors, set to empty unless request_method is POST
$errors = new Errors($_SERVER['REQUEST_METHOD'] === 'POST');

$requiredFields = ['email', 'password'];

// if request is POST, check all required fields
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  foreach ($requiredFields as $field) {
    if (!$post->{$field}) {
      $errors->{$field} = "You must provide a {$field}";
    }
  }

  // additionally check that email format is valid
  if (!$errors->email && !filter_var($post->email, FILTER_VALIDATE_EMAIL)) {
    $errors->email = 'Value set is not a valid email';
  }

  if ($errors->isEmpty()) {
    try {
      if ($authAccount->authenticateWithEmailPassword($post->email, $post->password)) {
        redirect('dashboard');
      }
    } catch (Exception $e) {
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