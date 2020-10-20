<?php

function readRouter($app) {
  return function() use ($app) {
    /**
     * @api {get} /read/admins/:id Get Admin by OpId
     * @apiGroup Read
     * @apiName Admin
     * @apiVersion 0.1.0
     * @apiDescription Get an admin, given an operator id, year, and status
     *
     * @apiParam {Number} id The operator id to find the admin with
     * @apiParam {Number{4}} [year=date("Y")] The year you want to find an admin for
     * @apiParam {String=active,registered,invited,archived} [status=active] The status you want to find an admin for
     *
     * @apiSuccess {Object} admin The admin object
     * @apiSuccess {Number} admin.operatorId
     * @apiSuccess {String} [admin.title]
     * @apiSuccess {String} [admin.highestDegree]
     * @apiSuccess {String} [admin.employer]
     * @apiSuccess {Number} admin.userId
     * @apiSuccess {String} admin.firstName
     * @apiSuccess {String} admin.lastName
     * @apiSuccess {String} [admin.suffix]
     * @apiSuccess {String=male,female,other} [admin.gender]
     * @apiSuccess {String=active,registered,invited,archived} admin.status
     * @apiSuccess {Boolean} admin.checkedIn This will return <code>0</code> for false and <code>1</code> for true
     * @apiSuccess {String} admin.email
     *
     * @apiUse BadRequest
     * @apiUse UserNotFound
     * @apiUse DatabaseError
     *
     * @apiExample {js} Axios Example Usage:
     * axios.get('/read/admins/25').then(res => {
     *  console.log(res);
     * }).catch(err => {
     *  console.log(err.response.data);
     * });
     */
    $app->get('/admins/:id', getAdminByOpId($app));

    /**
     * @api {get} /read/judges/:id Get Judge by OpId
     * @apiGroup Read
     * @apiName Judge
     * @apiVersion 0.1.0
     * @apiDescription Get a judge given an operator id, year, and status
     *
     * @apiParam {Number} id The operator id to find the judge with
     * @apiParam {Number{4}} [year=date("Y")] The year you want to find a judge for
     * @apiParam {String=active,registered,invited,archived} [status=active] The status you want to find a judge for
     *
     * @apiSuccess {Object} judge The judge object
     * @apiSuccess {Number} judge.operatorId
     * @apiSuccess {String} [judge.title]
     * @apiSuccess {String} [judge.highestDegree]
     * @apiSuccess {String} [judge.employer]
     * @apiSuccess {Number} judge.userId
     * @apiSuccess {String} judge.firstName
     * @apiSuccess {String} judge.lastName
     * @apiSuccess {String} [judge.suffix]
     * @apiSuccess {String=male,female,other} [judge.gender]
     * @apiSuccess {String=active,registered,invited,archived} judge.status
     * @apiSuccess {Boolean} judge.checkedIn This will return <code>0</code> for false and <code>1</code> for true
     * @apiSuccess {String} judge.email
     * @apiSuccess {Object[]} [judge.categoryPreferences] A list of categories the judge prefers to be matched with
     * @apiSuccess {Number} judge.categoryPreferences.id
     * @apiSuccess {String} judge.categoryPreferences.name
     * @apiSuccess {Object[]} [judge.gradeLevelPreferences] A list of gradeLevels the judge prefers to be matched with
     * @apiSuccess {Number} judge.gradeLevelPreferences.id
     * @apiSuccess {String} judge.gradeLevelPreferences.name
     *
     * @apiUse BadRequest
     * @apiUse UserNotFound
     * @apiUse DatabaseError
     *
     * @apiExample {js} Axios Example Usage:
     * axios.get('/read/judges/25').then(res => {
     *  console.log(res);
     * }).catch(err => {
     *  console.log(err.response.data);
     * });
     */
    $app->get('/judges/:id', getJudgeByOpId($app));
    $app->get('/students', function() use ($app) {
      echo 'Read student';
    });
    $app->get('/schools', function() use ($app) {
      echo 'Read school';
    });
    $app->get('/counties', function() use ($app) {
      echo 'Read county';
    });
    $app->get('/projects', function() use ($app) {
      echo 'Read project';
    });
    $app->get('/categories', function() use ($app) {
      echo 'Read category';
    });
    $app->get('/booths', function() use ($app) {
      echo 'Read booth';
    });
    $app->get('/gradeLevels', function() use ($app) {
      echo 'Read gradeLevel';
    });
  };
}