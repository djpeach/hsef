<?php if (!$authAccount->hasOneOfReqEntitlement(['owner', 'moderator'])) {
  redirect('exception', 'You do not have permission to view this page');
  die();
} ?>
<main>
  <article class="limit-width-sm">
    <h2 class="article-header">Admin Management</h2>
    <?php include 'components/divider.php' ?>
    <table class="table table-hover  mt-5">
      <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Checked In?</th>
      </tr>
      </thead>
      <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
      </tr>
      </tbody>
    </table>
  </article>
</main>
