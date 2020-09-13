<?php require_once $_SERVER['DOCUMENT_ROOT'].'/hsef/helpers/fallback.php'; ?>
<?php if (!$authAccount->isAuthenticated()) { redirect('login'); } ?>

<h1>The Dashboard (Authenticated)</h1>

<h3><a href="/hsef/?page=anotherAuthPage">Another Authenticated Page</a></h3>
