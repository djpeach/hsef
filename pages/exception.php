<main>
  <article class="limit-width-sm">
    <div class="alert alert-danger">
      <h4 class="alert-heading">Error!</h4>
      <p>
        <?php echo Session::get()->errMsg; ?>
      </p>
      <hr>
      <a href="/hsef/?page=dashboard" class="alert-link">Go back to Home Page</a>
    </div>
  </article>
</main>
<?php unset(Session::get()->page); unset(Session::get()->errMsg); ?>
