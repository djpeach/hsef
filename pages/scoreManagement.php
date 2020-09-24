<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'admin'])) {
  redirect('exception', 'You do not have permission to view this page');
  die();
} ?>
<h1>Score Management</h1>
// add dropdown here

<script>
  // use js to fill dropdown
  // fetch counties from database
</script>
