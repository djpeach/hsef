<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'admin'])) {
  redirect('exception', ['errMsg' => 'You do not have permission to view this page']);
  die();
} ?>
<main>
  <article class="limit-width-md container pt-5">
    <div class="row">
      <div class="col text-center">
        <h2 class="article-header">Pre-Event Tools</h2>
        <?php include 'components/divider.php' ?>
        <button class="btn btn-outline-green mx-2 mt-3">
          Generate Judge Sessions
        </button>
        <button class="btn btn-outline-darkgreen mx-2 mt-3">
          Generate Judge Auth Accounts
        </button>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col">
        <h2 class="article-header mt-5">Event Management</h2>
        <?php include 'components/divider.php' ?>
      </div>
    </div>
<<<<<<< HEAD
      <div class="container">
          <div class="row">
              <div class="col-12 col-sm-6 col-md-4">
                  <div class="card text-yellow bg-darkgreen">
                      <div class="card-header"><i class="fas fa-user-graduate"></i></div>
                      <div class="card-body">
                          <div class="card-title"><a href="/hsef/?page=studentManagement">Student</a></div>
                          <div class="card-text"></div>
                      </div>
                  </div>
              </div>
              <div class="col-12 col-sm-6 col-md-4">
                  <div class="card text-yellow bg-darkgreen">
                      <div class="card-header"><i class="fas fa-chalkboard"></i></div>
                      <div class="card-body">
                          <div class="card-title"><a href="/hsef/?page=projectManagement">Projects</a></div>
                          <div class="card-text"></div>
                      </div>
                  </div>
              </div>
              <div class="col-12 col-sm-6 col-md-4">
                  <div class="card text-yellow bg-darkgreen">
                      <div class="card-header"><i class="fas fa-gavel"></i></div>
                      <div class="card-body">
                          <div class="card-title"><a href="/hsef/?page=judgeManagement">Judges</a></div>
                          <div class="card-text"></div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-12 col-sm-6 col-md-4">
                  <div class="card text-yellow bg-darkgreen">
                      <div class="card-header"><i class="fas fa-school"></i></div>
                      <div class="card-body">
                          <div class="card-title"><a href="/hsef/?page=schoolManagement">Schools</a></div>
                          <div class="card-text"></div>
                      </div>
                  </div>
              </div>
              <div class="col-12 col-sm-6 col-md-4">
                  <div class="card text-yellow bg-darkgreen">
                      <div class="card-header"><i class="fas fa-list-ul"></i></div>
                      <div class="card-body">
                          <div class="card-title"><a href="/hsef/?page=categoryForm">Categories</a></div>
                          <div class="card-text"></div>
                      </div>
                  </div>
              </div>
              <div class="col-12 col-sm-6 col-md-4">
                  <div class="card text-yellow bg-darkgreen">
                      <div class="card-header"><i class="fas fa-award"></i></div>
                      <div class="card-body">
                          <div class="card-title"><a href="/hsef/?page=scoreManagement">Scores</a></div>
                          <div class="card-text"></div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
=======
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
>>>>>>> 8498506e6eb89543e6f09057ac06ac559be06df9
  </article>
</main>

