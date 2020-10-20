<?php

function readRouter($app) {
  return function() use ($app) {
    /**
     * @api {get} /read/admin/:id Get a current admin by OpId
     * @apiGroup Read
     * @apiName Admin
     * @apiVersion 0.1.0
     * @apiDescription Get an admin from the current year, given a operator id
     *
     * @apiParam {Number} id The operator id to find the admin with
     * @apiParam {Number{4}} [year] The year you want to find an admin for
     * @apiParam {String} [status=active,registered,invited,archived] The status you want to find an admin for
     *
     * @apiSuccess {Number} operatorId
     * @apiSuccess {String} [title]
     * @apiSuccess {String} [highestDegree]
     * @apiSuccess {String} [employer]
     * @apiSuccess {Number} userId
     * @apiSuccess {String} firstName
     * @apiSuccess {String} lastName
     * @apiSuccess {String} [suffix]
     * @apiSuccess {String=male,female,other} [gender]
     * @apiSuccess {String=active,registered,invited,archived} status
     * @apiSuccess {Boolean} checkedIn This will return <code>0</code> for false and <code>1</code> for true
     * @apiSuccess {String} email
     *
     * @apiUse BadRequest
     * @apiUse UserNotFound
     * @apiUse DatabaseError
     *
     * @apiExample {js} Axios Example Usage:
     * axios.get('/read/admin/25').then(res => {
     *  console.log(res);
     * }).catch(err => {
     *  console.log(err.response.data);
     * });
     */
    $app->get('/admin/:id', getAdminByOpId($app));

    $app->get('/judge', function() use ($app) {
      echo 'Read judge';
    });
    $app->get('/student', function() use ($app) {
      echo 'Read student';
    });
    $app->get('/school', function() use ($app) {
      echo 'Read school';
    });
    $app->get('/county', function() use ($app) {
      echo 'Read county';
    });
    $app->get('/project', function() use ($app) {
      echo 'Read project';
    });
    $app->get('/category', function() use ($app) {
      echo 'Read category';
    });
    $app->get('/booth', function() use ($app) {
      echo 'Read booth';
    });
    $app->get('/gradeLevel', function() use ($app) {
      echo 'Read gradeLevel';
    });
  };
}