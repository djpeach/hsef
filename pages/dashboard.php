<?php if (!$authAccount->isAuthenticated()) { redirect('login'); die(); } ?>

<article class="limit-width-md bg-light mt-5 rounded">
  <h1>Welcome, <?php echo $user->FirstName; ?>!</h1>
  <h3>Entitlements: </h3>
  <ul class="list-group">
    <?php foreach($authAccount->getEntitlements() as $entitlement) : ?>
      <li class="list-group-item"><?php echo $entitlement; ?></li>
    <?php endforeach; ?>
  </ul>
</article>