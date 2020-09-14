<?php if (!$authAccount->hasOneOfReqEntitlement(['owner', 'moderator', 'admin', 'judge', 'viewer'])) {
  redirect('exception', 'You do not have permission to view this page');
  die();
} ?>
<h1>Final Scores</h1>
