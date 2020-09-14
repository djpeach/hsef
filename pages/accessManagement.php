<?php if (!$authAccount->hasOneOfReqEntitlement(['owner'])) {
  redirect('exception', 'You do not have permission to view this page');
  die();
} ?>
<h1>Global Access Management</h1>
