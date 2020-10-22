<?php

function readRouter($app) {
  return function() use ($app) {
    /**
     * @api {get} /read/admins/:id Admin by OpId
     * @apiGroup Read
     * @apiName Admin
     * @apiVersion 0.1.0
     * @apiDescription Get an admin, given an operator id
     *
     * @apiParam {Number} id The operator id to find the admin with
     *
     * @apiSuccess {Object} result The admin object
     * @apiSuccess {Number} result.operatorId
     * @apiSuccess {String} [result.title]
     * @apiSuccess {String} [result.highestDegree]
     * @apiSuccess {String} [result.employer]
     * @apiSuccess {Number} result.userId
     * @apiSuccess {String} result.firstName
     * @apiSuccess {String} result.lastName
     * @apiSuccess {String} [result.suffix]
     * @apiSuccess {String=male,female,other} [result.gender]
     * @apiSuccess {String=active,registered,invited,archived} result.status
     * @apiSuccess {Boolean} result.checkedIn This will return <code>0</code> for false and <code>1</code> for true
     * @apiSuccess {String} result.email
     *
     * @apiUse BadRequest
     * @apiUse DatabaseError
     * @apiUse UserNotFound
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
     * @api {get} /read/judges/:id Judge by OpId
     * @apiGroup Read
     * @apiName Judge
     * @apiVersion 0.1.0
     * @apiDescription Get a judge given an operator id
     *
     * @apiParam {Number} id The operator id to find the judge with
     *
     * @apiSuccess {Object} result The judge object
     * @apiSuccess {Number} result.operatorId
     * @apiSuccess {String} [result.title]
     * @apiSuccess {String} [result.highestDegree]
     * @apiSuccess {String} [result.employer]
     * @apiSuccess {Number} result.userId
     * @apiSuccess {String} result.firstName
     * @apiSuccess {String} result.lastName
     * @apiSuccess {String} [result.suffix]
     * @apiSuccess {String=male,female,other} [result.gender]
     * @apiSuccess {String=active,registered,invited,archived} result.status
     * @apiSuccess {Boolean} result.checkedIn This will return <code>0</code> for false and <code>1</code> for true
     * @apiSuccess {String} result.email
     * @apiSuccess {Object[]} [result.categoryPreferences] A list of categories the judge prefers to be matched with
     * @apiSuccess {Number} result.categoryPreferences.id
     * @apiSuccess {String} result.categoryPreferences.name
     * @apiSuccess {Object[]} [result.gradeLevelPreferences] A list of gradeLevels the judge prefers to be matched with
     * @apiSuccess {Number} result.gradeLevelPreferences.id
     * @apiSuccess {String} result.gradeLevelPreferences.name
     *
     * @apiUse BadRequest
     * @apiUse DatabaseError
     * @apiUse UserNotFound
     *
     * @apiExample {js} Axios Example Usage:
     * axios.get('/read/judges/25').then(res => {
     *  console.log(res);
     * }).catch(err => {
     *  console.log(err.response.data);
     * });
     */
    $app->get('/judges/:id', getJudgeByOpId($app));

    /**
     * @api {get} /read/students/:id Student by Id
     * @apiGroup Read
     * @apiName Student
     * @apiVersion 0.1.0
     * @apiDescription Get a student given an id
     *
     * @apiParam {Number} id The student id to find the student with
     *
     * @apiSuccess {Object} result The student object
     * @apiSuccess {Number} result.studentId
     * @apiSuccess {Object} result.user
     * @apiSuccess {String} result.user.firstName
     * @apiSuccess {String} result.user.lastName
     * @apiSuccess {String} [result.user.suffix]
     * @apiSuccess {String=male,female,other} [result.gender]
     * @apiSuccess {String=active,registered,invited,archived} result.status
     * @apiSuccess {Object} [result.school]
     * @apiSuccess {Number} result.school.id
     * @apiSuccess {String} result.school.name
     * @apiSuccess {Object} [result.project]
     * @apiSuccess {Number} result.project.id
     * @apiSuccess {String} result.project.name
     * @apiSuccess {Number} [result.project.number]
     * @apiSuccess {Number} [result.project.courseNetworkingId]
     * @apiSuccess {String} [result.project.abstract]
     * @apiSuccess {Object} [result.project.category]
     * @apiSuccess {Number} result.project.category.id
     * @apiSuccess {String} result.project.category.name
     * @apiSuccess {Object} [result.gradeLevel]
     * @apiSuccess {Number} result.gradeLevel.id
     * @apiSuccess {String} result.gradeLevel.name
     *
     * @apiUse BadRequest
     * @apiUse DatabaseError
     * @apiUse UserNotFound
     *
     * @apiExample {js} Axios Example Usage:
     * axios.get('/read/students/25').then(res => {
     *  console.log(res);
     * }).catch(err => {
     *  console.log(err.response.data);
     * });
     */
    $app->get('/students/:id', function() use ($app) {
      echo 'Read student';
    });

    /**
     * @api {get} /read/schools/:id School by Id
     * @apiGroup Read
     * @apiName School
     * @apiVersion 0.1.0
     * @apiDescription Get a school given an id
     *
     * @apiParam {Number} id The school id to find the school with
     *
     * @apiSuccess {Object} result The school object
     * @apiSuccess {Number} result.schoolId
     * @apiSuccess {String} result.name
     * @apiSuccess {Object} [result.county]
     * @apiSuccess {Number} result.county.id
     * @apiSuccess {String} result.county.name
     *
     * @apiUse BadRequest
     * @apiUse DatabaseError
     * @apiUse ResourceNotFound
     *
     * @apiExample {js} Axios Example Usage:
     * axios.get('/read/schools/25').then(res => {
     *  console.log(res);
     * }).catch(err => {
     *  console.log(err.response.data);
     * });
     */
    $app->get('/schools/:id', function() use ($app) {
      echo 'Read school';
    });

    /**
     * @api {get} /read/counties/:id County by Id
     * @apiGroup Read
     * @apiName County
     * @apiVersion 0.1.0
     * @apiDescription Get a county given an id
     *
     * @apiParam {Number} id The county id to find the county with
     *
     * @apiSuccess {Object} result The county object
     * @apiSuccess {Number} result.countyId
     * @apiSuccess {String} result.name
     *
     * @apiUse BadRequest
     * @apiUse DatabaseError
     * @apiUse ResourceNotFound
     *
     * @apiExample {js} Axios Example Usage:
     * axios.get('/read/counties/25').then(res => {
     *  console.log(res);
     * }).catch(err => {
     *  console.log(err.response.data);
     * });
     */
    $app->get('/counties/:id', function() use ($app) {
      echo 'Read county';
    });

    /**
     * @api {get} /read/projects/:id Project by Id
     * @apiGroup Read
     * @apiName Project
     * @apiVersion 0.1.0
     * @apiDescription Get a project given an id
     *
     * @apiParam {Number} id The project id to find the project with
     *
     * @apiSuccess {Object} result The project object
     * @apiSuccess {Number} result.projectId
     * @apiSuccess {String} result.name
     * @apiSuccess {Number} [result.number]
     * @apiSuccess {String} [result.abstract]
     * @apiSuccess {Number} [result.courseNetworkingId]
     * @apiSuccess {Object} [result.booth]
     * @apiSuccess {Number} result.booth.id
     * @apiSuccess {Number} result.booth.number
     * @apiSuccess {Object} [result.category]
     * @apiSuccess {Number} result.category.id
     * @apiSuccess {Name} result.category.name
     *
     * @apiUse BadRequest
     * @apiUse DatabaseError
     * @apiUse ResourceNotFound
     *
     * @apiExample {js} Axios Example Usage:
     * axios.get('/read/projects/25').then(res => {
     *  console.log(res);
     * }).catch(err => {
     *  console.log(err.response.data);
     * });
     */
    $app->get('/projects/:id', function() use ($app) {
      echo 'Read project';
    });

    /**
     * @api {get} /read/categories/:id Category by Id
     * @apiGroup Read
     * @apiName Category
     * @apiVersion 0.1.0
     * @apiDescription Get a category given an id
     *
     * @apiParam {Number} id The category id to find the category with
     *
     * @apiSuccess {Object} result The category object
     * @apiSuccess {Number} result.categoryId
     * @apiSuccess {String} result.name
     *
     * @apiUse BadRequest
     * @apiUse DatabaseError
     * @apiUse ResourceNotFound
     *
     * @apiExample {js} Axios Example Usage:
     * axios.get('/read/categories/25').then(res => {
     *  console.log(res);
     * }).catch(err => {
     *  console.log(err.response.data);
     * });
     */
    $app->get('/categories/:id', function() use ($app) {
      echo 'Read category';
    });

    /**
     * @api {get} /read/booths/:id Booth by Id
     * @apiGroup Read
     * @apiName Booth
     * @apiVersion 0.1.0
     * @apiDescription Get a booth given an id
     *
     * @apiParam {Number} id The booth id to find the booth with
     *
     * @apiSuccess {Object} result The booth object
     * @apiSuccess {Number} result.boothId
     * @apiSuccess {Number} result.number
     *
     * @apiUse BadRequest
     * @apiUse DatabaseError
     * @apiUse ResourceNotFound
     *
     * @apiExample {js} Axios Example Usage:
     * axios.get('/read/booths/25').then(res => {
     *  console.log(res);
     * }).catch(err => {
     *  console.log(err.response.data);
     * });
     */
    $app->get('/booths/:id', function() use ($app) {
      echo 'Read booth';
    });

    /**
     * @api {get} /read/gradeLevels/:id GradeLevel by Id
     * @apiGroup Read
     * @apiName GradeLevel
     * @apiVersion 0.1.0
     * @apiDescription Get a gradeLevel given an id
     *
     * @apiParam {Number} id The gradeLevel id to find the gradeLevel with
     *
     * @apiSuccess {Object} result The gradeLevel object
     * @apiSuccess {Number} result.gradeLevelId
     * @apiSuccess {String} result.name
     *
     * @apiUse BadRequest
     * @apiUse DatabaseError
     * @apiUse ResourceNotFound
     *
     * @apiExample {js} Axios Example Usage:
     * axios.get('/read/gradeLevels/25').then(res => {
     *  console.log(res);
     * }).catch(err => {
     *  console.log(err.response.data);
     * });
     */
    $app->get('/gradeLevels/:id', function() use ($app) {
      echo 'Read gradeLevel';
    });
  };
}