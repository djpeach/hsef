<?php

// require all the controllers
foreach(glob(__DIR__."/../controllers/*.php") as $file) {
  require_once $file;
}

function listRouter($app) {
  return function() use ($app) {
    /**
     * @api {get} /list/admins Admins
     * @apiGroup List
     * @apiName Admin
     * @apiVersion 0.1.0
     * @apiDescription Get a list of admins
     *
     * @apiUse ListFields
     * @apiParam {Number{4}} [year=date("Y")]
     * @apiParam {String=active,registered,invited,archived} [status=active]
     * @apiParam {String} [t] the search term to look up admins by name
     *
     * @apiUse ListResults
     * @apiSuccess {Object[]} results
     * @apiSuccess {Number} results.operatorId
     * @apiSuccess {Number} results.userId
     * @apiSuccess {String} results.firstName
     * @apiSuccess {String} results.lastName
     * @apiSuccess {String} [results.suffix]
     * @apiSuccess {Boolean} results.checkedIn Will return as <code>0</code> for false and <code>1</code> for true
     * @apiSuccess {String} results.email
     * @apiSuccess {String} [results.title]
     * @apiSuccess {String} [results.highestDegree]
     * @apiSuccess {String} [results.employer]
     *
     * @apiUse BadRequest
     * @apiUse DatabaseError
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
     * @api {get} /list/admins/potential Potential Admins
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
     * @apiSuccess {Object[]} results
     * @apiSuccess {Number} results.operatorId
     * @apiSuccess {Number} results.userId
     * @apiSuccess {String} results.firstName
     * @apiSuccess {String} results.lastName
     * @apiSuccess {String} [results.suffix]
     * @apiSuccess {Boolean} results.checkedIn Will return as <code>0</code> for false and <code>1</code> for true
     * @apiSuccess {String} results.email
     * @apiSuccess {String} [results.title]
     * @apiSuccess {String} [results.highestDegree]
     * @apiSuccess {String} [results.employer]
     *
     * @apiUse BadRequest
     * @apiUse DatabaseError
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

    /**
     * @api {get} /list/judges Judges
     * @apiGroup List
     * @apiName Judge
     * @apiVersion 0.1.0
     * @apiDescription Get a list of judges
     *
     * @apiUse ListFields
     * @apiParam {Number{4}} [year=date("Y")]
     * @apiParam {String=active,registered,invited,archived} [status=active]
     * @apiParam {String} [t] the search term to look up admins by name
     *
     * @apiUse ListResults
     * @apiSuccess {Object[]} results
     * @apiSuccess {Number} results.operatorId
     * @apiSuccess {String} [results.title]
     * @apiSuccess {String} [results.highestDegree]
     * @apiSuccess {String} [results.employer]
     * @apiSuccess {Number} results.userId
     * @apiSuccess {String} results.firstName
     * @apiSuccess {String} results.lastName
     * @apiSuccess {String} [results.suffix]
     * @apiSuccess {String=male,female,other} [results.gender]
     * @apiSuccess {String=active,registered,invited,archived} results.status
     * @apiSuccess {Boolean} results.checkedIn This will return <code>0</code> for false and <code>1</code> for true
     * @apiSuccess {String} results.email
     * @apiSuccess {Object[]} [results.categoryPreferences] A list of categories the judge prefers to be matched with
     * @apiSuccess {Number} results.categoryPreferences.id
     * @apiSuccess {String} results.categoryPreferences.name
     * @apiSuccess {Object[]} [results.gradeLevelPreferences] A list of gradeLevels the judge prefers to be matched with
     * @apiSuccess {Number} results.gradeLevelPreferences.id
     * @apiSuccess {String} results.gradeLevelPreferences.name
     *
     * @apiUse BadRequest
     * @apiUse DatabaseError
     * @apiUse UserNotFound
     *
     * @apiExample {js} Axios Example Usage:
     * axios.get(`/list/judges`, {
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
    $app->get('/judges', function() use ($app) {
      echo 'List judges';
    });

    /**
     * @api {get} /list/judges/potential Potential Judges
     * @apiGroup List
     * @apiName PotentialJudges
     * @apiVersion 0.1.0
     * @apiDescription Get a list of users which can be made into an judge
     *
     * @apiUse ListFields
     * @apiParam {Number{4}} [year=date("Y")]
     * @apiParam {String=active,registered,invited,archived} [status=active]
     * @apiParam {String} [t] the search term to look up judges by name
     *
     * @apiUse ListResults
     * @apiSuccess {Object[]} results
     * @apiSuccess {Number} results.operatorId
     * @apiSuccess {Number} results.userId
     * @apiSuccess {String} results.firstName
     * @apiSuccess {String} results.lastName
     * @apiSuccess {String} [results.suffix]
     * @apiSuccess {Boolean} results.checkedIn Will return as <code>0</code> for false and <code>1</code> for true
     * @apiSuccess {String} results.email
     * @apiSuccess {String} [results.title]
     * @apiSuccess {String} [results.highestDegree]
     * @apiSuccess {String} [results.employer]
     *
     * @apiUse BadRequest
     * @apiUse DatabaseError
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
    $app->get('/judges/potential', function() use ($app) {
      echo 'List potential judges';
    });

    /**
     * @api {get} /list/students Students
     * @apiGroup List
     * @apiName Student
     * @apiVersion 0.1.0
     * @apiDescription Get a list of judges
     *
     * @apiUse ListFields
     * @apiParam {String} [t] the search term to look up judges by name
     * @apiParam {String=active,registered,invited,archived} [status=active]
     * @apiParam {Number{4}} [year=date("Y")]
     * @apiParam {Number} [schoolId]
     * @apiParam {Number} [projectId]
     * @apiParam {Number} [gradeLevelId]
     *
     * @apiUse ListResults
     * @apiSuccess {Object[]} results
     * @apiSuccess {Object} results.user
     * @apiSuccess {Number} results.user.id
     * @apiSuccess {String} results.user.firstName
     * @apiSuccess {String} results.user.lastName
     * @apiSuccess {String} [results.user.suffix]
     * @apiSuccess {Number{4}} results.user.year
     * @apiSuccess {Object} [results.school]
     * @apiSuccess {Number} results.school.id
     * @apiSuccess {String} results.school.name
     * @apiSuccess {Object} [results.project]
     * @apiSuccess {Number} results.project.id
     * @apiSuccess {String} results.project.name
     * @apiSuccess {Object} [results.gradeLevel]
     * @apiSuccess {Number} results.gradeLevel.id
     * @apiSuccess {String} results.gradeLevel.name
     *
     * @apiUse BadRequest
     * @apiUse DatabaseError
     * @apiUse UserNotFound
     *
     * @apiExample {js} Axios Example Usage:
     * axios.get(`/list/judges`, {
     *  params: {
     *    limit: 2,
     *    offset: 4,
     *    year: 2020,
     *    status: 'active'
     *    t: 'Da',
     *    schoolId: 12,
     *    projectId: 42,
     *    gradeLevelId: 9,
     *  }
     * })
     * .then(res => {
     *  console.log(res);
     * }).catch(err => {
     *  console.log(err.response.data);
     * });
     */
    $app->get('/students', function() use ($app) {
      echo 'List students';
    });

    /**
     * @api {get} /list/schools Schools
     * @apiGroup List
     * @apiName School
     * @apiVersion 0.1.0
     * @apiDescription Get a list of schools
     *
     * @apiUse ListFields
     * @apiParam {String} [t] the search term to look up schools by name
     * @apiParam {Number{4}} [year=date("Y")]
     * @apiParam {Number} [countyId]
     *
     * @apiUse ListResults
     * @apiSuccess {Object[]} results
     * @apiSuccess {Number} results.id
     * @apiSuccess {String} results.name
     * @apiSuccess {Object} [results.county]
     * @apiSuccess {Number} results.county.id
     * @apiSuccess {String} results.county.name
     *
     * @apiUse BadRequest
     * @apiUse DatabaseError
     * @apiUse ResourceNotFound
     *
     * @apiExample {js} Axios Example Usage:
     * axios.get(`/list/schools`, {
     *  params: {
     *    limit: 2,
     *    offset: 4,
     *    year: 2020,
     *    t: 'Da',
     *    countyId: 12,
     *  }
     * })
     * .then(res => {
     *  console.log(res);
     * }).catch(err => {
     *  console.log(err.response.data);
     * });
     */
    $app->get('/schools', function() use ($app) {
      echo 'List schools';
    });

    /**
     * @api {get} /list/counties Counties
     * @apiGroup List
     * @apiName County
     * @apiVersion 0.1.0
     * @apiDescription Get a list of counties
     *
     * @apiUse ListFields
     * @apiParam {String} [t] the search term to look up counties by name
     *
     * @apiUse ListResults
     * @apiSuccess {Object[]} results
     * @apiSuccess {Number} results.id
     * @apiSuccess {String} results.name
     *
     * @apiUse BadRequest
     * @apiUse DatabaseError
     * @apiUse ResourceNotFound
     *
     * @apiExample {js} Axios Example Usage:
     * axios.get(`/list/counties`, {
     *  params: {
     *    t: 'Ma'
     *  }
     * })
     * .then(res => {
     *  console.log(res);
     * }).catch(err => {
     *  console.log(err.response.data);
     * });
     */
    $app->get('/counties', function() use ($app) {
      echo 'List countys';
    });

    /**
     * @api {get} /list/projects Projects
     * @apiGroup List
     * @apiName Project
     * @apiVersion 0.1.0
     * @apiDescription Get a list of projects
     *
     * @apiUse ListFields
     * @apiParam {String} [t] the search term to look up projects by name
     * @apiParam {Number{4}} [year=date("Y")]
     * @apiParam {Number} [categoryId]
     * @apiParam {Number} [gradeLevelId]
     *
     * @apiUse ListResults
     * @apiSuccess {Object[]} results
     * @apiSuccess {Number} results.id
     * @apiSuccess {String} results.name
     * @apiSuccess {Number} [results.number]
     * @apiSuccess {Object} [results.booth]
     * @apiSuccess {Number} results.booth.id
     * @apiSuccess {Number} results.booth.number
     * @apiSuccess {Object} [results.category]
     * @apiSuccess {Number} results.category.id
     * @apiSuccess {String} results.category.name
     * @apiSuccess {Object[]} [results.students]
     * @apiSuccess {Number} results.students.id
     * @apiSuccess {String} results.students.firstName
     * @apiSuccess {String} results.students.lastName
     * @apiSuccess {Object} [results.students.school]
     * @apiSuccess {Number} results.students.school.id
     * @apiSuccess {String} results.students.school.name
     * @apiSuccess {Object} [results.students.gradeLevel]
     * @apiSuccess {Number} results.students.gradeLevel.id
     * @apiSuccess {String} results.students.gradeLevel.name
     *
     * @apiUse BadRequest
     * @apiUse DatabaseError
     * @apiUse ResourceNotFound
     *
     * @apiExample {js} Axios Example Usage:
     * axios.get(`/list/projects`, {
     *  params: {
     *    t: 'Ma'
     *    year: 2020,
     *    categoryId: 12,
     *    gradeLevelId: 9
     *  }
     * })
     * .then(res => {
     *  console.log(res);
     * }).catch(err => {
     *  console.log(err.response.data);
     * });
     */
    $app->get('/projects', function() use ($app) {
      echo 'List projects';
    });

    /**
     * @api {get} /list/categories Categories
     * @apiGroup List
     * @apiName Category
     * @apiVersion 0.1.0
     * @apiDescription Get a list of categories
     *
     * @apiUse ListFields
     * @apiParam {String} [t] the search term to look up categories by name
     * @apiParam {Boolean} [active] Use if you want to filter only active or inactive
     *
     * @apiUse ListResults
     * @apiSuccess {Object[]} results
     * @apiSuccess {Number} results.id
     * @apiSuccess {String} results.name
     *
     * @apiUse BadRequest
     * @apiUse DatabaseError
     * @apiUse ResourceNotFound
     *
     * @apiExample {js} Axios Example Usage:
     * axios.get(`/list/categories`, {
     *  params: {
     *    t: 'Ma',
     *    active: true
     *  }
     * })
     * .then(res => {
     *  console.log(res);
     * }).catch(err => {
     *  console.log(err.response.data);
     * });
     */
    $app->get('/categories', function() use ($app) {
      echo 'List categorys';
    });

    /**
     * @api {get} /list/booths Booths
     * @apiGroup List
     * @apiName Booth
     * @apiVersion 0.1.0
     * @apiDescription Get a list of booths
     *
     * @apiUse ListFields
     * @apiParam {String} [t] the search term to look up booths by name
     * @apiParam {Boolean} [active] Use if you want to filter only booths or inactive
     *
     * @apiUse ListResults
     * @apiSuccess {Object[]} results
     * @apiSuccess {Number} results.id
     * @apiSuccess {String} results.name
     *
     * @apiUse BadRequest
     * @apiUse DatabaseError
     * @apiUse ResourceNotFound
     *
     * @apiExample {js} Axios Example Usage:
     * axios.get(`/list/booths`, {
     *  params: {
     *    t: 'Ma',
     *    active: true
     *  }
     * })
     * .then(res => {
     *  console.log(res);
     * }).catch(err => {
     *  console.log(err.response.data);
     * });
     */
    $app->get('/booths', function() use ($app) {
      echo 'List booths';
    });

    /**
     * @api {get} /list/gradeLevels GradeLevels
     * @apiGroup List
     * @apiName GradeLevel
     * @apiVersion 0.1.0
     * @apiDescription Get a list of gradeLevels
     *
     * @apiUse ListFields
     * @apiParam {String} [t] the search term to look up gradeLevels by name
     * @apiParam {Boolean} [active] Use if you want to filter only booths or inactive
     *
     * @apiUse ListResults
     * @apiSuccess {Object[]} results
     * @apiSuccess {Number} results.id
     * @apiSuccess {String} results.name
     *
     * @apiUse BadRequest
     * @apiUse DatabaseError
     * @apiUse ResourceNotFound
     *
     * @apiExample {js} Axios Example Usage:
     * axios.get(`/list/gradeLevels`, {
     *  params: {
     *    t: 'Ma',
     *    active: true
     *  }
     * })
     * .then(res => {
     *  console.log(res);
     * }).catch(err => {
     *  console.log(err.response.data);
     * });
     */
    $app->get('/gradeLevels', function() use ($app) {
      echo 'List gradeLevels';
    });
  };
}