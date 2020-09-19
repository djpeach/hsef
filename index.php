<?php require 'parts/head.php'; ?>

<?php $authAccount = AuthAccount::get(); ?>

<div class="hsef">
  <?php include_once 'components/menu.php'; ?>

  <?php if (isset(Session::get()->flashMessage)) : ?>
    <article class="limit-width-sm mt-5">
      <div class="alert alert-danger">
        <h4 class="alert-heading">Alert: </h4>
        <p>
          <?php echo Session::get()->flashMessage; ?>
        </p>
      </div>
    </article>
  <?php unset(Session::get()->flashMessage); endif; ?>

  <?php require "pages/".Session::get()->page.".php"; ?>

  <footer>
    <p>Made by Group 4 for N-342</p>
  </footer>
</div>

<?php require 'parts/foot.php'; ?>
