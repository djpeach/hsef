<main>
  <article class="limit-width-sm">
    <div class="alert alert-danger">
      <h4 class="alert-heading">Error!</h4>
      <p>
        <?php echo $session->exceptionMessage; ?>
      </p>
      <hr>
      <a href="/hsef/" class="alert-link">Go back to Home Page</a>
    </div>
  </article>
</main>
<?php unset($session->page); unset($session->exceptionMessage); ?>
