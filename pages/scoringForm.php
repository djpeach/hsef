<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'moderator'])) {
  redirect('exception', 'You do not have permission to view this page');
  die();
} ?>
<main>
  <article class="limit-width-md p-5">
    <?php $post = new Post(); $errors = new Errors(); ?>

    <h2 class="article-header"> Add Score </h2>
    <?php include 'components/divider.php' ?>
    <form method="POST" class="container">
      <div class="row mt-3">
        <div class="col">
          <div class="floating-label-group">
            <input type="text" placeholder="Project Name*" id="number" name="number">
            <label for="number">Project Name</label>
            <p class="form-error"></p>
          </div>
        </div>
        <div class="col">
          <div class="floating-label-group">
            <input type="text" placeholder="Raw Score*" id="number" name="number" >
            <label for="number">Raw Score</label>
            <p class="form-error"></p>
          </div>
        </div>
      </div>
      </fieldset>
    </form>
  </article>

</main>