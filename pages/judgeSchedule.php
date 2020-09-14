<?php if (!$authAccount->hasOneOfReqEntitlement(['owner', 'moderator', 'admin', 'judge'])) {
  redirect('exception', 'You do not have permission to view this page');
  die();
} ?>
<h1>Judge Schedule</h1>
