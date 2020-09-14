<?php require 'parts/head.php'; ?>

<div class="lab1">
  <nav class="navbar navbar-dark navbar-custom bg-dark">
    <a href="/hsef/?page=dashboard" class="navbar-brand">HSEF System</a>
    <?php if ($authAccount->isAuthenticated()) : ?>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainMenu">
        <div class="navbar-nav">
          <?php if ($authAccount->hasReqEntitlement('owner')) : ?>
            <span class="navbar-text">Owner Tools</span>
            <a href="/hsef/?page=adminManagement" class="nav-item nav-link">Admin Management</a>
          <?php endif; ?>
          <?php if ($authAccount->hasReqEntitlement('moderator')) : ?>
            <span class="navbar-text">Moderator Tools</span>
          <?php endif; ?>
          <?php if ($authAccount->hasReqEntitlement('admin')) : ?>
            <span class="navbar-text">Admin Tools</span>
            <a href="/hsef/?page=judgeManagement" class="nav-item nav-link">Judge Management</a>
            <a href="/hsef/?page=studentManagement" class="nav-item nav-link">Student Management</a>
            <a href="/hsef/?page=projectManagement" class="nav-item nav-link">Project Management</a>
            <a href="/hsef/?page=scoreManagement" class="nav-item nav-link">Score Management</a>
          <?php endif; ?>
          <?php if ($authAccount->hasReqEntitlement('judge')) : ?>
            <span class="navbar-text">Judge Tools</span>
          <?php endif; ?>
          <?php if ($authAccount->hasReqEntitlement('viewer')) : ?>
            <span class="navbar-text">Other Tools</span>
          <?php endif; ?>
          <?php if (isset(Post::get()->LOGOUT)) {
            $authAccount->logout();
            redirect('login');
          } ?>
          <form method="POST" class="form-inline">
            <button class="btn btn-lg btn-warning" type="submit" name="LOGOUT">Logout</button>
          </form>
        </div>
      </div>
    <?php endif; ?>
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
