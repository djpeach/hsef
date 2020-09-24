<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'admin', 'judge'])) {
  redirect('exception', ['errMsg' => 'You do not have permission to view this page']);
  die();
} ?>
<h1>Judging Form</h1>
