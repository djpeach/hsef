<article class="limit-width-md bg-light mt-5 rounded">
<!--  <h1>Welcome, --><?php //echo User::get()->FirstName; ?><!--!</h1>-->
  <h3>Entitlements: </h3>
  <ul class="list-group">
    <?php foreach(Operator::get()->getEntitlements() as $entitlement) : ?>
      <li class="list-group-item"><?php echo $entitlement; ?></li>
    <?php endforeach; ?>
  </ul>
</article>