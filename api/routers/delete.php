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
     *
     * @apiUse BadRequest
     * @apiUse DatabaseError
     *
     * @apiExample {js} Axios Example Usage:
     * axios.get('/delete/admins/25').then(res => {
     *  console.log(res);
     * }).catch(err => {
     *  console.log(err.response.data);
     * });
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
     *
     * @apiUse BadRequest
     * @apiUse DatabaseError
     *
     * @apiExample {js} Axios Example Usage:
     * axios.get('/delete/judges/25').then(res => {
     *  console.log(res);
     * }).catch(err => {
     *  console.log(err.response.data);
     * });
     */
    $app->delete('/judges', function() use ($app) {
      echo 'Delete judge';
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
     *
     * @apiUse BadRequest
     * @apiUse DatabaseError
     *
     * @apiExample {js} Axios Example Usage:
     * axios.get('/delete/students/25').then(res => {
     *  console.log(res);
     * }).catch(err => {
     *  console.log(err.response.data);
     * });
     */
    $app->delete('/students', function() use ($app) {
      echo 'Delete student';
    });
  };
}