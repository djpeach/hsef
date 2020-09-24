<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'admin'])) {
  redirect('exception', ['errMsg' => 'You do not have permission to view this page']);
  die();
} ?>
<main>
  <article class="limit-width-md container pt-5">
    <div class="row">
      <div class="col">
        <h2 class="article-header">Event Management</h2>
        <?php include 'components/divider.php' ?>
      </div>
    </div>
    <div class="row">
      <div class="mt-3 col-12 col-sm-6 col-md-4">
        <a href="/hsef/?page=judgeManagement" class="mgt-card card text-yellow bg-darkgreen">
          <div class="card-body text-center">
            <i class="fas fa-gavel p-5"></i>
            <h2 class="mgt-card-label">Judges</h2>
          </div>
        </a>
      </div>
      <div class="mt-3 col-12 col-sm-6 col-md-4">
        <a href="/hsef/?page=studentManagement" class="mgt-card card text-yellow bg-darkgreen">
          <div class="card-body text-center">
            <i class="fas fa-user-graduate p-5"></i>
            <h2 class="mgt-card-label">Students</h2>
          </div>
        </a>
      </div>
      <div class="mt-3 col-12 col-sm-6 col-md-4">
        <a href="/hsef/?page=projectManagement" class="mgt-card card text-yellow bg-darkgreen">
          <div class="card-body text-center">
            <i class="fas fa-microscope p-5"></i>
            <h2 class="mgt-card-label">Projects</h2>
          </div>
        </a>
      </div>
    </div>
    <div class="row">
      <div class="mt-3 col-12 col-sm-6 col-md-4">
        <a href="/hsef/?page=schoolManagement" class="mgt-card card text-yellow bg-darkgreen">
          <div class="card-body text-center">
            <i class="fas fa-university p-5"></i>
            <h2 class="mgt-card-label">Schools</h2>
          </div>
        </a>
      </div>
      <div class="mt-3 col-12 col-sm-6 col-md-4">
        <a href="/hsef/?page=categoryManagement" class="mgt-card card text-yellow bg-darkgreen">
          <div class="card-body text-center">
            <i class="fas fa-stream p-5"></i>
            <h2 class="mgt-card-label">Categories</h2>
          </div>
        </a>
      </div>
      <div class="mt-3 col-12 col-sm-6 col-md-4">
        <a href="/hsef/?page=scoreManagement" class="mgt-card card text-yellow bg-darkgreen">
          <div class="card-body text-center">
            <i class="fas fa-award p-5"></i>
            <h2 class="mgt-card-label">Scores</h2>
          </div>
        </a>
      </div>
    </div>
    <div class="row">
      <div class="mt-3 col-12 col-sm-6 col-md-4">
        <a href="/hsef/?page=boothManagement" class="mgt-card card text-yellow bg-darkgreen">
          <div class="card-body text-center">
            <i class="fas fa-thumbtack p-5"></i>
            <h2 class="mgt-card-label">Booths</h2>
          </div>
        </a>
      </div>
      <div class="mt-3 col-12 col-sm-6 col-md-4">
        <a href="/hsef/?page=countyManagement" class="mgt-card card text-yellow bg-darkgreen">
          <div class="card-body text-center">
            <i class="fas fa-map-marked-alt p-5"></i>
            <h2 class="mgt-card-label">Counties</h2>
          </div>
        </a>
      </div>
      <div class="mt-3 col-12 col-sm-6 col-md-4">
        <a href="/hsef/?page=gradeLevelManagement" class="mgt-card card text-yellow bg-darkgreen">
          <div class="card-body text-center">
            <i class="fas fa-users p-5"></i>
            <h2 class="mgt-card-label">Grade Levels</h2>
          </div>
        </a>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col text-center">
        <h2 class="article-header mt-5">Post-Event Tools</h2>
        <?php include 'components/divider.php' ?>
        <button class="btn btn-outline-danger mt-3">
          Archive Event
        </button>
      </div>
    </div>
  </article>
</main>

