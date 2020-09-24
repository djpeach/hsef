<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner'])) {
  redirect('exception', ['errMsg' => 'You do not have permission to view this page']);
  die();
} ?>
<main>
  <article class="limit-width-md p-5">
    <h2 class="article-header">Global Access Level Management</h2>
    <?php include 'components/divider.php' ?>
    <p>This page allows the owner complete access the the entitlements (aka access levels) of every user.</p>
  </article>
</main>
