<?php

// require all the controllers
foreach(glob(__DIR__."/../controllers/*.php") as $file) {
  require_once $file;
}

function listRouter($app) {
  return function() use ($app) {
    /**
     * @api {get} /list/admins List Admins
     * @apiGroup List
     * @apiName Admin
     * @apiVersion 0.1.0
     * @apiDescription Get a list of lightweight admins, with a limit and offset
     *
     * @apiUse ListFields
     * @apiParam {Number{4}} [year=date("Y")]
     * @apiParam {String=active,registered,invited,archived} [status=active]
     * @apiParam {String} [t] the search term to look up admins by name
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
     * @apiUse UserNotFound
     *
     * @apiExample {js} Axios Example Usage:
     * axios.get(`/list/admins`, {
     *  params: {
     *    limit: 2,
     *    offset: 4,
     *    year: 2020,
     *    status: 'active'
     *    t: 'Da'
     *  }
     * })
     * .then(res => {
     *  console.log(res);
     * }).catch(err => {
     *  console.log(err.response.data);
     * });
     */
    $app->get('/admins', listAdmins($app));

    /**
     * @api {get} /list/admins/potential List potential Admins
     * @apiGroup List
     * @apiName PotentialAdmins
     * @apiVersion 0.1.0
     * @apiDescription Get a list of users which can be made into an admin
     *
     * @apiUse ListFields
     * @apiParam {Number{4}} [year=date("Y")]
     * @apiParam {String=active,registered,invited,archived} [status=active]
     * @apiParam {String} [t] the search term to look up admins by name
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
     * @apiUse UserNotFound
     *
     * @apiExample {js} Axios Example Usage:
     * axios.get(`/list/admins/potential`, {
     *  params: {
     *    limit: 2,
     *    offset: 4,
     *    year: 2020,
     *    status: 'active'
     *    t: 'Da'
     *  }
     * })
     * .then(res => {
     *  console.log(res);
     * }).catch(err => {
     *  console.log(err.response.data);
     * });
     */
    $app->get('/admins/potential', listPotentialAdmins($app));

    $app->get('/judges', function() use ($app) {
      echo 'List judges';
    });
    $app->get('/students', function() use ($app) {
      echo 'List students';
    });
    $app->get('/schools', function() use ($app) {
      echo 'List schools';
    });
    $app->get('/counties', function() use ($app) {
      echo 'List countys';
    });
    $app->get('/projects', function() use ($app) {
      echo 'List projects';
    });
    $app->get('/categories', function() use ($app) {
      echo 'List categorys';
    });
    $app->get('/booths', function() use ($app) {
      echo 'List booths';
    });
    $app->get('/gradeLevels', function() use ($app) {
      echo 'List gradeLevels';
    });
  };
}