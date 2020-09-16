<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'moderator', 'admin'])) {
  redirect('exception', 'You do not have permission to view this page');
  die();
} ?>
<main>
  <article class="limit-width-md p-5">
    <h2 class="article-header">Judge Management</h2>
    <?php include 'components/divider.php' ?>
    <p>This page allows admins to manage judges, approve registered judges, and invite previous and new judges.</p>
  </article>
</main>
