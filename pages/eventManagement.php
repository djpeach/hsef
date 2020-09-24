<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'admin'])) {
  redirect('exception', 'You do not have permission to view this page');
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
                          <div class="card-title">categories</div>
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
  </article>
</main>

