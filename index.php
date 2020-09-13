<?php require 'parts/head.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/helpers/fallback.php'; ?>

<div class="lab1">
  <header>
    <h1>HSEF System</h1>
  </header>

  <?php require "pages/$page.php"; ?>

  <footer>
    <p>Made by Group 4 for N-342</p>
  </footer>
</div>

<?php require 'parts/foot.php'; ?>
