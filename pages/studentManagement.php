<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'admin'])) {
  redirect('exception', ['errMsg' => 'You do not have permission to view this page']);
  die();
} ?>
<?php
$post = new Post();
$errors = new Errors();
$delFormSubmitted = isset($_POST['STUDENT_DELETE_SUBMIT']);

if ($delFormSubmitted) {
  $delType = $post->deleteType;
  $studentId = $post->studentId;
  $sql = DB::get()->prepare(Queries::ARCHIVE_STUDENT_BY_ID);
  if (!$sql->execute([$studentId])) {
    $errors->message = "Database execution went wrong, please try again";
  }
}
?>
<main>
  <article class="limit-width-md pt-5">
    <?php if (!$errors->isEmpty()) : ?>
      <div class="limit-width-sm alert alert-danger mb-5">
        <h4 class="alert-heading">Alert: </h4>
        <p>
          <?php echo $errors->message; ?>
        </p>
      </div>
    <?php endif; ?>
    <h2 class="article-header">Student Management</h2>
    <?php include 'components/divider.php' ?>
    <div class="container-sm data-table">
      <div class="row border-bottom border-darkgreen mb-3 no-gutters pl-2">
        <div class="col-1">
          <p class="font-weight-bold">Id</p>
        </div>
        <div class="col-3">
          <p class="font-weight-bold">Name</p>
        </div>
        <div class="col-4">
          <p class="font-weight-bold">School</p>
        </div>
        <div class="col-2">
          <p class="font-weight-bold">Grade</p>
        </div>
        <div class="col-2">
          <p class="font-weight-bold">Tools</p>
        </div>
      </div>
      <?php $students = DB::get()->query(Queries::GET_ALL_STUDENTS)->fetchAll(); ?>
      <?php foreach ($students as $student) : ?>
        <div class="row row-sliding no-gutters pl-3">
          <div class="col-1">
            <p><?php echo $student->StudentId; ?></p>
          </div>
          <div class="col-3">
            <p><?php echo User::fullName($student); ?></p>
          </div>
          <div class="col-4">
            <p>
              <?php if ($student->SchoolId) : ?>
                <a href="/hsef/?page=schoolForm&id=<?php echo $student->SchoolId; ?>&readonly=true">
                  <?php echo $student->SchoolName; ?>
                </a>
              <?php else : ?>
                N/A
              <?php endif; ?>
            </p>
          </div>
          <div class="col-2">
            <?php if ($student->GradeLevelId) : ?>
              <a href="/hsef/?page=gradeLevelForm&glid=<?php echo $student->GradeLevelId; ?>&readonly=true">
                <?php echo $student->GradeLevelName; ?>
              </a>
            <?php else : ?>
              N/A
            <?php endif; ?>
          </div>
          <div class="col-2 d-md-none">
            <span class="tool-icon" data-toggle="row-slide" data-target="#tools-<?php echo $student->StudentId; ?>">
              <i class="fas fa-ellipsis-v text-darkgreen"></i>
            </span>
          </div>
          <div class="col-4 col-md-2 slide-tray" id="tools-<?php echo $student->StudentId; ?>">
            <a href="/hsef/?page=studentForm&id=<?php echo $student->StudentId ?>&readonly=false" class="col-4 tool-icon bg-green">
              <i class="fas fa-edit text-white"></i>
            </a>
            <a href="/hsef/?page=studentForm&id=<?php echo $student->StudentId ?>&readonly=true" class="col-4 tool-icon bg-primary">
              <i class="fas fa-user text-white"></i>
            </a>
            <button class="btn col-4 tool-icon btn-danger" data-toggle="modal" data-target="#deletionModal-<?php echo $student->StudentId; ?>">
              <i class="fas fa-trash text-white"></i>
            </button>
            <!-- Deletion Modal -->
            <div class="modal fade deletion-modal" id="deletionModal-<?php echo $student->StudentId; ?>" tabindex="-1">
              <div class="modal-dialog">
                <form method="POST">
                  <div class="modal-content">
                    <div class="modal-header bg-light font-weight-bold">
                      <h3 class="modal-title">Remove Student</h3>
                      <button type="button" class="close" data-dismiss="modal">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="alert alert-danger">
                        <h4 class="alert-heading">
                          <i class="fas fa-exclamation-circle"></i>
                          Warning: this is a destructive action
                        </h4>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <label for="studentNameConfirmation-<?php echo $student->StudentId ?>">Please type <span class="font-weight-bold"><?php echo $student->FirstName.' '.$student->LastName ?></span> to confirm.</label>
                      <input type="text" name="deleteConfirm" id="studentNameConfirmation-<?php echo $student->StudentId ?>">
                      <input type="text" name="studentId" value="<?php echo $student->StudentId ?>" hidden>
                      <?php // TODO: figure out a way to pass the name confirm value to JS ?>
                      <input type="text" name="deleteConfirmValue" value="<?php echo $student->FirstName.' '.$student->LastName ?>" hidden>
                      <button type="submit" class="btn btn-outline-danger mx-auto" name="STUDENT_DELETE_SUBMIT" disabled>I understand, remove student.</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <div class="row no-gutters mt-3">
        <div class="col text-right">
          <a class="btn btn-yellow text-white" href="/hsef/?page=studentForm">
            <i class="fas fa-plus mr-1"></i>
            New Student
          </a>
        </div>
      </div>
    </div>
  </article>
</main>
<?php JS::get()->add('deletionModal'); ?>
