<?php

// require all the controllers
foreach(glob(__DIR__."/../controllers/*.php") as $file) {
  require_once $file;
}

function createRouter($app) {
  return function() use ($app) {
      /**
       * @api {post} /create/admin/existingUser Admin from Existing User
       * @apiGroup Create
       * @apiName AdminFromExisting
       * @apiVersion 0.1.0
       * @apiDescription Add admin entitlement to operator from an existing user. May need to create operator.
       *
       * @apiParam {Number} userId The id of an existing user to which to grant the 'admin' entitlements
       * @apiUse OperatorFields
       *
       * @apiSuccess {String[]} entitlements
       * @apiSuccess {Number} userId
       * @apiSuccess {Number} operatorId
       *
       * @apiUse ResourceConflict
       * @apiUse BadRequest
       * @apiUse UserNotFound
       *
       * @apiExample {js} Axios Example Usage:
       * axios.post('/create/admin/existingUser', {
       *  userId: 1234,
       *  operator: {
       *    title: "Dr.",
       *    highestDegree: "Masters",
       *    employer: "IU Health"
       *  }
       * }).then(res => {
       *  console.log(res);
       * }).catch(err => {
       *  console.log(err.response.data);
       * });
       */
      $app->post('/admin/existingUser', createAdminFromExisting($app));

      /**
       * @api {post} /create/admin/newUser Admin with New User
       * @apiGroup Create
       * @apiName AdminWithNew
       * @apiVersion 0.1.0
       * @apiDescription Create a new user and operator with admin entitlement
       *
       * @apiUse UserFields
       * @apiUse OperatorFields
       *
       * @apiSuccess {String[]} entitlements
       * @apiSuccess {Number} userId
       * @apiSuccess {Number} operatorId
       *
       * @apiUse ResourceConflict
       * @apiUse BadRequest
       *
       * @apiExample {js} Axios Example Usage:
       * axios.post('/create/admin/newUser', {
       *  user: {
       *    firstName: "Daniel",
       *    lastName: "Peach",
       *    suffix: "Jr",
       *    email: "daniel.peach@gmail.com",
       *    gender: "male",
       *    status: "active",
       *    checkedIn: "false",
       *  },
       *  operator: {
       *    title: "Dr.",
       *    highestDegree: "Masters",
       *    employer: "IU Health"
       *  }
       * }).then(res => {
       *  console.log(res);
       * }).catch(err => {
       *  console.log(err.response.data);
       * });
       */
      $app->post('/admin/newUser', createNewAdmin($app));

      /**
       * @api {post} /create/judge/existingUser Judge from Existing User
       * @apiGroup Create
       * @apiName JudgeFromExisting
       * @apiVersion 0.1.0
       * @apiDescription Add judge entitlement to operator from an existing user. May need to create operator.
       *
       * @apiParam {Number} userId The id of an existing user to which to grant the 'judge' entitlement.
       * @apiUse OperatorFields
       * @apiUse JudgeFields
       *
       * @apiSuccess {String[]} entitlements
       * @apiSuccess {Number} userId
       * @apiSuccess {Number} operatorId
       *
       * @apiUse ResourceConflict
       * @apiUse BadRequest
       * @apiUse UserNotFound
       *
       * @apiExample {js} Axios Example Usage:
       * axios.post('/create/judge/existingUser', {
       *  userId: 1234,
       *  operator: {
       *    title: "Dr.",
       *    highestDegree: "Masters",
       *    employer: "IU Health"
       *  },
       *  judge: {
       *    categoryPreferenceIds: [12, 7, 19],
       *    gradeLevelPreferenceIds: [4, 5, 7, 2]
       *  }
       * }).then(res => {
       *  console.log(res);
       * }).catch(err => {
       *  console.log(err.response.data);
       * });
       */
      $app->post('/judge/existingUser', createNewJudge($app));

      /**
       * @api {post} /create/judge/newUser Judge with New User
       * @apiGroup Create
       * @apiName JudgeWithNew
       * @apiVersion 0.1.0
       * @apiDescription Create a new user and operator with judge entitlement
       *
       * @apiUse UserFields
       * @apiUse OperatorFields
       * @apiUse JudgeFields
       *
       * @apiSuccess {String[]} entitlements
       * @apiSuccess {Number} userId
       * @apiSuccess {Number} operatorId
       *
       * @apiUse ResourceConflict
       * @apiUse BadRequest
       *
       * @apiExample {js} Axios Example Usage:
       * axios.post('/create/judge/newUser', {
       *  user: {
       *    firstName: "Daniel",
       *    lastName: "Peach",
       *    suffix: "Jr",
       *    email: "daniel.peach@gmail.com",
       *    gender: "male",
       *    status: "active",
       *    checkedIn: "false",
       *  },
       *  operator: {
       *    title: "Dr.",
       *    highestDegree: "Masters",
       *    employer: "IU Health"
       *  },
       *  judge: {
       *    categoryPreferenceIds: [12, 7, 19],
       *    gradeLevelPreferenceIds: [4, 5, 7, 2]
       *  }
       * }).then(res => {
       *  console.log(res);
       * }).catch(err => {
       *  console.log(err.response.data);
       * });
       */
      $app->post('/judge/newUser', createJudgeFromExisting($app));

      /**
       * @api {post} /create/student/newUser Student with New User
       * @apiGroup Create
       * @apiName Student
       * @apiVersion 0.1.0
       * @apiDescription Create a new user and student
       *
       * @apiUse UserFields
       * @apiUse StudentFields
       *
       * @apiSuccess {Number} userId
       * @apiSuccess {Number} studentId
       *
       * @apiUse ResourceConflict
       * @apiUse BadRequest
       *
       * @apiExample {js} Axios Example Usage:
       * axios.post('/create/student/newUser', {
       *  user: {
       *    firstName: "Daniel",
       *    lastName: "Peach",
       *    suffix: "Jr",
       *    email: "daniel.peach@gmail.com",
       *    gender: "male",
       *    status: "active",
       *    checkedIn: "false",
       *  },
       *  student: {
       *    schoolId: 12,
       *    projectId: 47,
       *    gradeLevelId: 8
       *  }
       * }).then(res => {
       *  console.log(res);
       * }).catch(err => {
       *  console.log(err.response.data);
       * });
       */
      $app->post('/student/newUser', createNewStudent($app));

      /**
       * @api {post} /school New School
       * @apiGroup Create
       * @apiName School
       * @apiVersion 0.1.0
       * @apiDescription Create a new school
       *
       * @apiParam {Object} school The school details
       * @apiParam {String{128}} school.name
       * @apiParam {Number} [school.countyId]
       *
       * @apiSuccess {Number} schoolId
       * @apiSuccess {String} name
       * @apiSuccess {Number} countyId
       *
       * @apiUse ResourceConflict
       * @apiUse BadRequest
       *
       * @apiExample {js} Axios Example Usage:
       * axios.post('/create/school', {
       *  school: {
       *    name: "Adams Central High School",
       *    countyId: 12
       *  },
       * }).then(res => {
       *  console.log(res);
       * }).catch(err => {
       *  console.log(err.response.data);
       * });
       */
      $app->post('/school', createNewSchool($app));

      /**
       * @api {post} /county New County
       * @apiGroup Create
       * @apiName County
       * @apiVersion 0.1.0
       * @apiDescription Create a new county
       *
       * @apiParam {Object} county The county details
       * @apiParam {String{64}} county.name
       *
       * @apiSuccess {Number} countyId
       * @apiSuccess {String} name
       *
       * @apiUse ResourceConflict
       * @apiUse BadRequest
       *
       * @apiExample {js} Axios Example Usage:
       * axios.post('/create/county', {
       *  county: {
       *    name: "Marion County"
       *  },
       * }).then(res => {
       *  console.log(res);
       * }).catch(err => {
       *  console.log(err.response.data);
       * });
       */
      $app->post('/county', createNewCounty($app));

      /**
       * @api {post} /project New Project
       * @apiGroup Create
       * @apiName Project
       * @apiVersion 0.1.0
       * @apiDescription Create a new project
       *
       * @apiParam {Object} project The project details
       * @apiParam {String{128}} project.name
       * @apiParam {Number} [project.number] Different than ID in that projects from different years may have the same number
       * @apiParam {String{600}} [project.abstract]
       * @apiParam {Number} [project.boothId]
       * @apiParam {String{128}} [project.courseNetworkingId] The id of the project from Course Networking, and external system
       * @apiParam {Number} [project.categoryId]
       *
       * @apiSuccess {Number} projectId
       * @apiSuccess {String} name
       *
       * @apiUse ResourceConflict
       * @apiUse BadRequest
       *
       * @apiExample {js} Axios Example Usage:
       * axios.post('/create/county', {
       *  project: {
       *    name: "Volcanoes!",
       *    number: 12,
       *    abstract: "Praesent venenatis metus at tortor pulvinar varius. Sed mollis, eros et ultrices tempus, mauris ipsum aliquam libero, non adipiscing dolor urna a orci. Sed hendrerit. Nunc egestas, augue at pellentesque laoreet, felis eros vehicula leo, at malesuada velit leo quis pede. Cras varius.",
       *    boothId: 109,
       *    courseNetworkingId: 21342,
       *    categoryId: 13
       *  },
       * }).then(res => {
       *  console.log(res);
       * }).catch(err => {
       *  console.log(err.response.data);
       * });
       */
      $app->post('/project', createNewProject($app));

      /**
       * @api {post} /county New Category
       * @apiGroup Create
       * @apiName Category
       * @apiVersion 0.1.0
       * @apiDescription Create a new category
       *
       * @apiParam {Object} category The category details
       * @apiParam {String{64}} category.name
       * @apiParam {Boolean} [category.active=true] Whether or not the category should be active
       *
       * @apiSuccess {Number} categoryId
       * @apiSuccess {String} name
       *
       * @apiUse ResourceConflict
       * @apiUse BadRequest
       *
       * @apiExample {js} Axios Example Usage:
       * axios.post('/create/category', {
       *  county: {
       *    name: "Botany",
       *    active: true
       *  },
       * }).then(res => {
       *  console.log(res);
       * }).catch(err => {
       *  console.log(err.response.data);
       * });
       */
      $app->post('/category', createNewCategory($app));

      /**
       * @api {post} /county New Booth
       * @apiGroup Create
       * @apiName Booth
       * @apiVersion 0.1.0
       * @apiDescription Create a new booth
       *
       * @apiParam {Object} booth The booth details
       * @apiParam {Number} booth.number
       * @apiParam {Boolean} [booth.active=true] Whether or not the booth should be active
       *
       * @apiSuccess {Number} boothId
       * @apiSuccess {String} name
       *
       * @apiUse ResourceConflict
       * @apiUse BadRequest
       *
       * @apiExample {js} Axios Example Usage:
       * axios.post('/create/booth', {
       *  county: {
       *    number: 109,
       *    active: true
       *  },
       * }).then(res => {
       *  console.log(res);
       * }).catch(err => {
       *  console.log(err.response.data);
       * });
       */
      $app->post('/booth', createNewBooth($app));

      /**
       * @api {post} /county New GradeLevel
       * @apiGroup Create
       * @apiName GradeLevel
       * @apiVersion 0.1.0
       * @apiDescription Create a new gradeLevel
       *
       * @apiParam {Object} gradeLevel The gradeLevel details
       * @apiParam {String{64}} gradeLevel.name
       * @apiParam {Boolean} [gradeLevel.active=true] Whether or not the gradeLevel should be active
       *
       * @apiSuccess {Number} gradeLevelId
       * @apiSuccess {String} name
       *
       * @apiUse ResourceConflict
       * @apiUse BadRequest
       *
       * @apiExample {js} Axios Example Usage:
       * axios.post('/create/gradeLevel', {
       *  county: {
       *    name: "9th Grade",
       *    active: true
       *  },
       * }).then(res => {
       *  console.log(res);
       * }).catch(err => {
       *  console.log(err.response.data);
       * });
       */
      $app->post('/gradeLevel', createNewGradeLevel($app));
    };
}
