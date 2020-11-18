<?php

function deleteRouter($app) {
  return function() use ($app) {
    /**
     * @api {delete} /delete/admins/:id Remove Admin Entitlement
     * @apiGroup Delete
     * @apiName Admin
     * @apiVersion 0.1.0
     * @apiDescription Removes the admin entitlement, and if no other entitlements left, archives the user.
     *
     * @apiParam {Number} id The operator id to find the admin with
     *
     * @apiSuccess {Number} id The OpId of the deleted admin
     */
    $app->delete('/admins', function() use ($app) {
      echo 'Delete admin';
    });

    /**
     * @api {delete} /delete/judges/:id Remove Judge Entitlement
     * @apiGroup Delete
     * @apiName Judge
     * @apiVersion 0.1.0
     * @apiDescription Removes the judge entitlement, and if no other entitlements left, archives the user.
     *
     * @apiParam {Number} id The operator id to find the judge with
     *
     * @apiSuccess {Number} id The OpId of the deleted judge
     */
    $app->delete('/judges/:id', function($id) use ($app) {
      $sql = DB::get()->prepare("UPDATE User SET Status = 'archived' WHERE UserId = (SELECT UserId FROM UserYear WHERE UserYearId = (SELECT UserYearId FROM Operator WHERE OperatorId = ?))");
      $sql->execute([$id]);
      $app->res->json(["success" => true]);
    });

    /**
     * @api {delete} /delete/students/:id Archive Student by Id
     * @apiGroup Delete
     * @apiName Student
     * @apiVersion 0.1.0
     * @apiDescription Archives the student
     *
     * @apiParam {Number} id The student id to find the student with
     *
     * @apiSuccess {Number} id The Id of the deleted student
     */
    $app->delete('/students', function() use ($app) {
      echo 'Delete student';
    });
  };
}