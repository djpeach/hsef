<main>
  <article class="container pt-5">
    <div class="row">
      <div class="col">
        <h2 class="article-header">Welcome!</h2>
        <?php include 'components/divider.php' ?>
      </div>
    </div>
    <div class="row limit-width-md mx-auto">
      <div class="col">
        <div class="alert alert-darkgreen" role="alert">
          <h4 class="alert-heading">Your Dashboard</h4>
          <p>This page is your dashboard. It contains all you most important tools.</p>
          <hr>
          <p class="mb-0">You can also find frequently asked questions and send an email to an admin if you have any issues</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-sm-6">
        <div class="row">
          <div class="col">
            <div class="group-label font-weight-bold mb-5">Check In:</div>
            <button class="btn btn-darkgreen ml-3">
              I'm Here
            </button>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col">
            <?php $errors = new Errors(); $post = new Post(); ?>
            <div class="group-label font-weight-bold mb-5">Questions and Comments for Admin</div>
            <button class="btn btn-darkgreen ml-3" data-toggle="collapse" data-target="#adminQuestions">
              Contact an Admin
            </button>
            <form class="collapse" id="adminQuestions">
              <div class="row mt-3">
                <div class="col">
                  <div class="floating-label-group--textarea">
                    <textarea type="text" placeholder="Content" id="abstract" name="abstract" rows="6"><?php echo $post->adminQuestions; ?></textarea>
                    <p class="form-error"><?php echo $errors->adminQuestions; ?></p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col text-right">
                  <button class="btn btn-darkgreen">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6">
        <div class="group-label font-weight-bold mb-5">Frequently Asked Questions:</div>
        <div class="accordian" id="faqAccordian">
          <div class="card mb-3">
            <div class="card-header" id="heading1">
              <h2 class="mb-0">
                <button class="btn btn btn-block text-left" type="button" data-toggle="collapse"
                        data-target="#question1">Question 1
                </button>
              </h2>
            </div>
            <div id="question1" class="collapse" data-parent="#faqAccordian">
              <div class="card-body">Answer to question 1</div>
            </div>
          </div>
          <div class="card mb-3">
            <div class="card-header" id="heading2">
              <h2 class="mb-0">
                <button class="btn btn btn-block text-left" type="button" data-toggle="collapse"
                        data-target="#question2">Question 2
                </button>
              </h2>
            </div>
            <div id="question2" class="collapse" data-parent="#faqAccordian">
              <div class="card-body">Answer to question 2</div>
            </div>
          </div>
          <div class="card mb-3">
            <div class="card-header" id="heading3">
              <h2 class="mb-0">
                <button class="btn btn btn-block text-left" type="button" data-toggle="collapse"
                        data-target="#question3">Question 3
                </button>
              </h2>
            </div>
            <div id="question3" class="collapse" data-parent="#faqAccordian">
              <div class="card-body">Answer to question 3</div>
            </div>
          </div>
          <div class="card mb-3">
            <div class="card-header" id="heading4">
              <h2 class="mb-0">
                <button class="btn btn btn-block text-left" type="button" data-toggle="collapse"
                        data-target="#question4">Question 4
                </button>
              </h2>
            </div>
            <div id="question4" class="collapse" data-parent="#faqAccordian">
              <div class="card-body">Answer to question 4</div>
            </div>
          </div>
          <div class="card mb-3">
            <div class="card-header" id="heading5">
              <h2 class="mb-0">
                <button class="btn btn btn-block text-left" type="button" data-toggle="collapse"
                        data-target="#question5">Question 5
                </button>
              </h2>
            </div>
            <div id="question5" class="collapse" data-parent="#faqAccordian">
              <div class="card-body">Answer to question 5</div>
            </div>
          </div>
          <div class="card mb-3">
            <div class="card-header" id="heading6">
              <h2 class="mb-0">
                <button class="btn btn btn-block text-left" type="button" data-toggle="collapse"
                        data-target="#question6">Question 6
                </button>
              </h2>
            </div>
            <div id="question6" class="collapse" data-parent="#faqAccordian">
              <div class="card-body">Answer to question 6</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </article>
</main>