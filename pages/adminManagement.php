<?php if (!$authAccount->hasOneOfReqEntitlement(['owner', 'moderator'])) {
  redirect('exception', 'You do not have permission to view this page');
  die();
} ?>
<h1>Admin Management</h1>
