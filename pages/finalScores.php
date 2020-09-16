<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'moderator', 'admin', 'judge', 'viewer'])) {
  redirect('exception', 'You do not have permission to view this page');
  die();
} ?>
<main>
  <article class="limit-width-md p-5">
    <h2 class="article-header">Final Score(s/ing)</h2>
    <?php include 'components/divider.php' ?>
    <p>This page allows someone to view-only the final scores of the event.</p>
    <p>We might also let them change things, due to end of day judge deliberation</p>
    <p>We might also let them submit to external systems on this page, although that might be reserved for top level access only</p>
  </article>
</main>
