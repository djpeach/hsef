<?php require 'parts/head.php' ?>

<div class="lab1">
  <header>
    <h1>HSEF System</h1>
  </header>

  <main>
    <?php $session->flashMessage = 'You\'ve been logged out, pleast log in again'; ?>
    <?php if ($session->flashMessage) : ?>
      <article class="limit-width-sm">
        <div class="alert alert-danger">
          <?php echo $session->flashMessage; ?>
        </div>
      </article>
    <?php unset($session->flashMessage); ?>
    <?php endif; ?>
    <article class="limit-width-sm">
      <h2 class="article-header">Judge & Admin Login Portal</h2>
      <?php include 'components/divider.php' ?>
      <?php require 'components/login-form.php' ?>
    </article>
  </main>

  <footer>
    <p>Made by Group 4 for N-342</p>
  </footer>
</div>

<?php require 'parts/foot.php' ?>