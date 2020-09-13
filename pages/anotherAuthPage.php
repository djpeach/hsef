<?php require_once $_SERVER['DOCUMENT_ROOT'].'/hsef/helpers/fallback.php'; ?>
<?php if (!$authAccount->isAuthenticated()) { redirect('login'); } ?>

<h1>Another Authenticated Page</h1>

<h3><a href="/hsef/?page=dashboard">Dashboard</a></h3>