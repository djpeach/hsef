<nav class="navbar navbar-dark navbar-custom bg-darkgreen fixed-top">
  <a href="/hsef/?page=dashboard" class="navbar-brand text-gold">HSEF System</a>
  <?php if ($authAccount->isAuthenticated()) : $operator = Operator::get(); ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainMenu">
      <div class="navbar-nav">
        <?php if ($operator->hasReqEntitlement('owner')) : ?>
          <span class="navbar-text">Owner Tools</span>
          <a href="/hsef/?page=accessManagement" class="nav-item nav-link text-gold">Global Access Management</a>
          <a href="/hsef/?page=adminManagement" class="nav-item nav-link text-gold">Admin Management</a>
        <?php endif; ?>
        <?php if ($operator->hasReqEntitlement('admin')) : ?>
          <span class="navbar-text">Admin Tools</span>
          <a href="/hsef/?page=eventManagement" class="nav-item nav-link text-gold">Event Management</a>
          <a href="/hsef/?page=judgeManagement" class="nav-item nav-link text-gold">Judge Management</a>
          <a href="/hsef/?page=studentManagement" class="nav-item nav-link text-gold">Student Management</a>
          <a href="/hsef/?page=projectManagement" class="nav-item nav-link text-gold">Project Management</a>
          <a href="/hsef/?page=scoreManagement" class="nav-item nav-link text-gold">Score Management</a>
        <?php endif; ?>
        <?php if ($operator->hasReqEntitlement('judge')) : ?>
          <span class="navbar-text">Judge Tools</span>
          <a href="/hsef/?page=judgeSchedule" class="nav-item nav-link text-gold">Judge Schedule</a>
          <a href="/hsef/?page=judgingForm" class="nav-item nav-link text-gold">Judging Form</a>
        <?php endif; ?>
        <?php if ($operator->hasReqEntitlement('viewer')) : ?>
          <span class="navbar-text">Other Tools</span>
          <a href="/hsef/?page=finalScores" class="nav-item nav-link text-gold">Final Scores</a>
        <?php endif; ?>
        <?php if (isset(Post::get()->LOGOUT)) {
          $authAccount->logout();
        } ?>
        <form method="POST" class="form-inline">
          <button class="btn btn-lg btn-gold my-4 font-weight-bolder ml-0" type="submit" name="LOGOUT">Logout</button>
        </form>
      </div>
    </div>
  <?php endif; ?>
</nav>