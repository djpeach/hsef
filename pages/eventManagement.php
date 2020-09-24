<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'admin'])) {
  redirect('exception', 'You do not have permission to view this page');
  die();
} ?>
<main>
  <article class="limit-width-md container pt-5">
    <div class="row">
      <div class="col">
        <h2 class="article-header">Event Management</h2>
        <?php include 'components/divider.php' ?>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <a href="/hsef/?page=schoolManagement">Schools</a>
      </div>
    </div>

    <p>This page allows the admins to edit event details such as: </p>
    <ul>
      <li>Judge time slot lengths and black out slots</li>
      <li>Booth numbers and those in use</li>
      <li>Archive the event when it is over (It is important this is done at the end of the event)</li>
      <li>Generate final scores</li>
      <li>What else?</li>
      <li>What else?</li>
    </ul>
  </article>
</main>

