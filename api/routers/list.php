<?php

// require all the controllers
foreach(glob(__DIR__."/../controllers/*.php") as $file) {
  require_once $file;
}

function listRouter($app) {
  return function() use ($app) {
    /**
     * @api {get} /list/admin List Admins
     * @apiGroup List
     * @apiName Admin
     * @apiVersion 0.1.0
     * @apiDescription Get a list of lightweight admins, with a limit and offset
     *
     * @apiUse ListFields
     *
     * @apiUse ListResults
     * @apiSuccess {Number} results.operatorId
     * @apiSuccess {Number} results.userId
     * @apiSuccess {String} results.firstName
     * @apiSuccess {String} results.lastName
     * @apiSuccess {String} [results.suffix]
     * @apiSuccess {Boolean} results.checkedIn Will return as <code>0</code> for false and <code>1</code> for true
     * @apiSuccess {String} [results.email]
     * @apiSuccess {String} [results.title]
     * @apiSuccess {String} [results.highestDegree]
     * @apiSuccess {String} [results.employer]
     *
     * @apiUse BadRequest
     *
     * @apiExample {js} Axios Example Usage:
     * axios.get(`/list/admin?limit=${2}&offset=${4}`)
     * .then(res => {
     *  console.log(res);
     * }).catch(err => {
     *  console.log(err.response.data);
     * });
     */
    $app->get('/admin', listAdmins($app));

    $app->get('/judge', function() use ($app) {
      echo 'List judges';
    });
    $app->get('/student', function() use ($app) {
      echo 'List students';
    });
    $app->get('/school', function() use ($app) {
      echo 'List schools';
    });
    $app->get('/county', function() use ($app) {
      echo 'List countys';
    });
    $app->get('/project', function() use ($app) {
      echo 'List projects';
    });
    $app->get('/category', function() use ($app) {
      echo 'List categorys';
    });
    $app->get('/booth', function() use ($app) {
      echo 'List booths';
    });
    $app->get('/gradeLevel', function() use ($app) {
      echo 'List gradeLevels';
    });
  };
}