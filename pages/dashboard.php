<?php require_once $_SERVER['DOCUMENT_ROOT'].'/helpers/fallback.php'; ?>
<?php if (!$authAccount->isAuthenticated()) { redirect('login'); } ?>

<h1>The Dashboard (Authenticated)</h1>

<!-- only use the query method if you must, it is not the most efficient, as it does a double page load -->
<h3><a href="/?page=anotherAuthPage">Another Authenticated Page</a></h3>
