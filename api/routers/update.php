<?php

foreach(glob(__DIR__."/../controllers/*.php") as $file) {
  require_once $file;
}

function updateRouter($app) {
  return function() use ($app) {

    /**
     * @api {get} /update/admins/:id Admin by OpId
     * @apiGroup Update
     * @apiName Admin
     * @apiVersion 0.1.0
     * @apiDescription Update admin by OpId
     *
     * @apiParam {Number} id The operator id to find the admin with
     * @apiParam {String} [title]
     * @apiParam {String} [highestDegree]
     * @apiParam {String} [employer]
     * @apiParam {Object} [user]
     * @apiParam {String} [user.firstName]
     * @apiParam {String} [user.lastName]
     * @apiParam {String} [user.suffix]
     * @apiParam {String=male,female,other} [user.gender]
     * @apiParam {String=active,registered,invited,archived} [user.status]
     * @apiParam {Boolean} [user.checkedIn]
     * @apiParam {String} [user.email]
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
     */
    $app->put('/admins/:id', getAdminByOpId($app));

    /**
     * @api {get} /update/judges/:id Judge by OpId
     * @apiGroup Update
     * @apiName Judge
     * @apiVersion 0.1.0
     * @apiDescription Update judge by OpId
     *
     * @apiParam {Number} id The operator id to find the judge with
     * @apiParam {String} [title]
     * @apiParam {String} [highestDegree]
     * @apiParam {String} [employer]
     * @apiParam {Object} [user]
     * @apiParam {String} [user.firstName]
     * @apiParam {String} [user.lastName]
     * @apiParam {String} [user.suffix]
     * @apiParam {String=male,female,other} [user.gender]
     * @apiParam {String=active,registered,invited,archived} [user.status]
     * @apiParam {Boolean} [user.checkedIn]
     * @apiParam {String} [user.email]
     * @apiParam {Number[]} [categoryPreferenceIds]
     * @apiParam {Number[]} [gradeLevelPreferenceIds]
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
     */
    $app->put('/judges/:id', getJudgeByOpId($app));

    /**
     * @api {get} /update/students/:id Student
     * @apiGroup Update
     * @apiName Student
     * @apiVersion 0.1.0
     * @apiDescription Update student by Id
     *
     * @apiParam {Number} id The id to find the student with
     * @apiParam {Number} [schoolId]
     * @apiParam {Number} [projectId]
     * @apiParam {Number} [gradeLevelId]
     * @apiParam {Object} [user]
     * @apiParam {String} [user.firstName]
     * @apiParam {String} [user.lastName]
     * @apiParam {String} [user.suffix]
     * @apiParam {String=male,female,other} [user.gender]
     * @apiParam {String=active,registered,invited,archived} [user.status]
     * @apiParam {String} [user.email]
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
     */
    $app->put('/students/:id', function() use ($app) {
      echo 'Update student';
    });

    /**
     * @api {get} /update/schools/:id School
     * @apiGroup Update
     * @apiName School
     * @apiVersion 0.1.0
     * @apiDescription Update school by Id
     *
     * @apiParam {Number} id The id to find the school with
     * @apiParam {String} [name]
     * @apiParam {Number} [countyId]
     *
     * @apiSuccess {Object} result The school object
     * @apiSuccess {Number} result.schoolId
     * @apiSuccess {String} result.name
     * @apiSuccess {Object} [result.county]
     * @apiSuccess {Number} result.county.id
     * @apiSuccess {String} result.county.name
     */
    $app->put('/schools/:id', function() use ($app) {
      echo 'Update school';
    });

    /**
     * @api {get} /update/counties/:id County
     * @apiGroup Update
     * @apiName County
     * @apiVersion 0.1.0
     * @apiDescription Update county by Id
     *
     * @apiParam {Number} id The id to find the county with
     * @apiParam {String} [name]
     *
     * @apiSuccess {Object} result The county object
     * @apiSuccess {Number} result.countyId
     * @apiSuccess {String} result.name
     */
    $app->put('/counties/:id', function() use ($app) {
      echo 'Update county';
    });

    /**
     * @api {get} /update/projects/:id Project
     * @apiGroup Update
     * @apiName Project
     * @apiVersion 0.1.0
     * @apiDescription Update project by Id
     *
     * @apiParam {Number} id The id to find the project with
     * @apiParam {String} [name]
     * @apiParam {Number} [number]
     * @apiParam {String} [abstract]
     * @apiParam {Number} [boothId]
     * @apiParam {Number} [courseNetworkingId]
     * @apiParam {Number} [categoryId]
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
     */
    $app->put('/projects/:id', function() use ($app) {
      echo 'Update project';
    });

    /**
     * @api {get} /update/categories/:id Category
     * @apiGroup Update
     * @apiName Category
     * @apiVersion 0.1.0
     * @apiDescription Update category by Id
     *
     * @apiParam {Number} id The id to find the category with
     * @apiParam {String} [name]
     *
     * @apiSuccess {Object} result The category object
     * @apiSuccess {Number} result.categoryId
     * @apiSuccess {String} result.name
     */
    $app->put('/categories/:id', function() use ($app) {
      echo 'Update category';
    });

    /**
     * @api {get} /update/booths/:id Booth
     * @apiGroup Update
     * @apiName Booth
     * @apiVersion 0.1.0
     * @apiDescription Update booth by Id
     *
     * @apiParam {Number} id The id to find the booth with
     * @apiParam {Number} [number]
     *
     * @apiSuccess {Object} result The booth object
     * @apiSuccess {Number} result.boothId
     * @apiSuccess {Number} result.number
     */
    $app->put('/booths/:id', function() use ($app) {
      echo 'Update booth';
    });

    /**
     * @api {get} /update/gradeLevels/:id GradeLevel
     * @apiGroup Update
     * @apiName GradeLevel
     * @apiVersion 0.1.0
     * @apiDescription Update gradeLevel by Id
     *
     * @apiParam {Number} id The id to find the gradeLevel with
     * @apiParam {String} [name]
     *
     * @apiSuccess {Object} result The gradeLevel object
     * @apiSuccess {Number} result.gradeLevelId
     * @apiSuccess {String} result.name
     */
    $app->put('/gradeLevels/:id', function() use ($app) {
      echo 'Update gradeLevel';
    });

    $app->put('/sessions/:id', saveScore($app));

    $app->put('/pwdReset', resetPwdEmailSubmit($app));

    $app->put('/judges/:id/approve', approveJudge($app));
    $app->put('/judges/:id/deny', denyJudge($app));

    /**
     * @api {put} /update/judges/:id/updateCheckedIn Judge Check in and out
     * @apiGroup Update
     * @apiName UpdateJudgeCheckin
     * @apiVersion 0.1.0
     * @apiDescription Update the value of a judge's checkedin status
     *
     * @apiParam {Boolean} checkedIn
     */
    $app->put('/judges/:id/updateCheckedIn', updateCheckedIn($app));
  };
}