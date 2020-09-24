<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'admin'])) {
  redirect('exception', 'You do not have permission to view this page');
  die();
} ?>
<h1>Project Management</h1>
