<?php require 'parts/head.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/hsef/helpers/fallback.php'; ?>

<div class="lab1">
  <nav class="navbar navbar-expand-xl navbar-dark navbar-custom bg-dark">
    <a href="/hsef/?page=dashboard" class="navbar-brand">HSEF System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainMenu">
      <div class="navbar-nav">
        <span class="navbar-text d-xl-none">Owner Tools</span>
        <a href="/hsef/?page=adminManagement" class="nav-item nav-link">Admin Management</a>
        <span class="navbar-text d-xl-none">Admin Tools</span>
        <a href="/hsef/?page=judgeManagement" class="nav-item nav-link">Judge Management</a>
        <a href="/hsef/?page=studentManagement" class="nav-item nav-link">Student Management</a>
        <a href="/hsef/?page=projectManagement" class="nav-item nav-link">Project Management</a>
        <a href="/hsef/?page=scoreManagement" class="nav-item nav-link">Score Management</a>
        <?php if (isset($_POST['LOGOUT'])) {
          $authAccount->logout();
          redirect('login');
        } ?>
        <?php if ($authAccount->isAuthenticated()) : ?>
        <form method="POST" class="form-inline">
          <button class="btn btn-lg btn-warning" type="submit" name="LOGOUT">Logout</button>
        </form>
        <?php endif; ?>
      </div>
    </div>
  </nav>

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
