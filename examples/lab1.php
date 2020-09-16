<?php require 'parts/head.php' ?>

<div class="lab1">
  <header>
    <h1>User Registration</h1>
  </header>

  <main>
    <?php include 'parts/form-processing.php'?>
    <article>
      <?php if ($errors->isEmpty()) : ?>
        <div class="article-header">
          <h2>Thank You!</h2>
          <p>Your details were saved as listed below. (Password not listed for security)</p>
        </div>
      <?php else : ?>
        <div class="article-header">
          <h2>Sign Up</h2>
          <p>Fill out the form below to sign up</p>
        </div>
      <?php endif; ?>
      <?php include 'parts/divider.php'?>
      <?php require 'parts/registration-form.php' ?>
    </article>
  </main>

  <footer>
    <p>Made by Daniel Peach for N-342</p>
  </footer>
</div>

<?php require 'parts/foot.php' ?>