<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'admin'])) {
  redirect('exception', ['errMsg' => 'You do not have permission to view this page']);
  die();
} ?>
<main>
  <article class="limit-width-md pt-5">
    <?php $post = new Post(); $errors = new Errors(); ?>
    <?php
    $existingProject = isset($_GET['id']);
    $formSubmitted = isset($_POST['PROJECT_FORM']);

    if ($existingProject && !$formSubmitted) {
      $sql = DB::get()->prepare(Queries::GET_PROJECT_BY_ID);
      $sql->execute([$_GET['id']]);
      $project = $sql->fetch();
      $post->number = $project->ProjectNumber;
      $post->name = $project->ProjectName;
      $post->abstract = $project->Abstract;
      $post->boothId = $project->BoothId;
      $post->boothNumber = $project->BoothNumber;
      $post->boothSelect = $project->BoothNumber;
      $post->categoryId = $project->CategoryId;
      $post->categoryName = $project->CategoryName;
      $post->categorySelect = $project->CategoryName;
      $post->cnid = $project->CourseNetworkingId;
    }

    $readonly = isset($_GET['readonly']) ? $_GET['readonly'] === 'true' : false;
    ?>
    <?php

    $requiredFields = ['projectNumber', 'projectName'];

    // Find and create validation errors
    if ($formSubmitted) {
      foreach ($requiredFields as $field) {
        if (!$post->{$field}) {
          $fieldName = cameltostr($field);
          $errors->{$field} = "$fieldName is required";
        }
      }

      if ($errors->isEmpty()) {
        $id = $existingProject ? $_GET["id"] : null;
        if ($existingProject) {
          $sql = DB::get()->prepare(Queries::UPDATE_PROJECT_BY_ID);
          $abstract = isset($post->abstract) ? $post->abstract : null;
          $boothId = isset($post->boothId) ? $post->boothId : null;
          $categoryId = isset($post->categoryId) ? $post->categoryId : null;
          $cnid = isset($post->cnid) ? $post->cnid : null;
          $sql->execute([$post->number, $post->name, $abstract, $boothId, $cnid, $categoryId, $id]);
        } else {
          $sql = DB::get()->prepare(Queries::CREATE_NEW_PROJECT);
          $abstract = isset($post->abstract) ? $post->abstract : null;
          $boothId = isset($post->boothId) ? $post->boothId : null;
          $categoryId = isset($post->categoryId) ? $post->categoryId : null;
          $cnid = isset($post->cnid) ? $post->cnid : null;
          $sql->execute([$post->number, $post->name, $abstract, $boothId, $cnid, $categoryId]);
          $id = DB::get()->lastInsertId();
        }
        redirect('projectForm', ['id'=>$id, 'readonly'=>true]);
      }
    }
    ?>
    <h2 class="article-header"><?php echo $existingProject ? ($readonly ? 'Project Info' : 'Edit Project') : 'New Project'; ?></h2>
    <?php include 'components/divider.php' ?>
    <form method="POST" class="container">
      <?php include 'components/form-fields/projectFields.php'; ?>
      <?php if ($readonly) : ?>
        <fieldset>
          <div class="row mt-3">
            <div class="col-6">
              <a href="/hsef/?page=projectManagement" class="btn btn-yellow text-white">
                <i class="fas fa-angle-left text-white"></i>
                View All Projects
              </a>
            </div>
            <?php if ($existingProject) : ?>
              <div class="col-6 text-right">
                <a href="/hsef/?page=projectForm&id=<?php echo $_GET['id']; ?>&readonly=false" class="btn btn-darkgreen">
                  <i class="fas fa-edit text-white"></i>
                  Edit Project
                </a>
              </div>
            <?php endif; ?>
          </div>
        </fieldset>
      <?php else : ?>
        <fieldset>
          <div class="row mt-3">
            <div class="col text-right">
              <button class="btn btn-darkgreen" type="submit" name="PROJECT_FORM">Save Project</button>
            </div>
          </div>
        </fieldset>
      <?php endif; // TODO: do the edit/readonly toggle with javascript, not a redirect ?>
    </form>
  </article>
</main>
