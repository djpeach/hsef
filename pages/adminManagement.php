<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'moderator'])) {
  redirect('exception', 'You do not have permission to view this page');
  die();
} ?>
<main>
  <article class="limit-width-sm">
    <h2 class="article-header">Admin Management</h2>
    <?php include 'components/divider.php' ?>
    <table class="table table-hover mt-5 data-table">
      <thead class="thead-light">
      <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Checked In?</th>
        <th scope="col">Tools</th>
      </tr>
      </thead>
      <tbody>
      <?php $admins = DB::get()->query(Queries::GET_ALL_ADMINS)->fetchAll(); ?>
      <?php foreach ($admins as $admin) : ?>
        <tr>
          <th><?php echo $admin->OperatorId; ?></th>
          <td><?php echo User::fullName($admin); ?></td>
          <td><?php echo $admin->Email; ?></td>
          <td class="text-center"><?php echo $admin->CheckedIn ? 'Yes' : 'No'; ?></td>
          <td>
            <i class="fas fa-edit text-primary"></i>
            <i class="fas fa-trash text-danger"></i>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    <a class="btn btn-gold" href="/hsef/?page=newAdmin"><i class="fas fa-plus"></i>New Admin</a>
  </article>
</main>
