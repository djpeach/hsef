<?php require 'parts/head.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/hsef/helpers/fallback.php'; ?>

<div class="lab1">
  <header>
    <h1>HSEF System</h1>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $authAccount->logout();
      redirect('login');
    } ?>
    <form method="POST">
      <button>Logout</button>
    </form>
  </header>

  <?php if (isset($session->flashMessage)) : ?>
    <article class="limit-width-sm">
      <div class="alert alert-danger">
        <h4 class="alert-heading">Alert: </h4>
        <p>
          <?php echo $session->flashMessage; ?>
        </p>
      </div>
    </article>
  <?php unset($session->flashMessage); endif; ?>

  <?php require "pages/$page.php"; ?>

  <footer>
    <p>Made by Group 4 for N-342</p>
  </footer>
</div>

<?php require 'parts/foot.php'; ?>
