<?php

// require all the controllers
foreach(glob(__DIR__."/../controllers/*.php") as $file) {
  require_once $file;
}

function createRouter($app) {
  return function() use ($app) {
      /**
       * @api {post} /create/admins/existingUser Admin from Existing User
       * @apiGroup Create
       * @apiName AdminFromExisting
       * @apiVersion 0.1.0
       * @apiDescription Add admin entitlement to operator from an existing user. May need to create operator.
       *
       * @apiHeader {String} Content-Type=application/json
       *
       * @apiParam {Number} userId The id of an existing user to which to grant the 'admin' entitlements
       * @apiUse OperatorFields
       *
       * @apiSuccess {Number} userId
       * @apiSuccess {Number} operatorId
       *
       * @apiUse BadRequest
       * @apiUse DatabaseError
       * @apiUse ResourceConflict
       * @apiUse UserNotFound
       *
       * @apiExample {js} Axios Example Usage:
       * axios.post('/create/admins/existingUser', {
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
      $app->post('/admins/existingUser', createAdminFromExisting($app));

      /**
       * @api {post} /create/admins/newUser Admin with New User
       * @apiGroup Create
       * @apiName AdminWithNew
       * @apiVersion 0.1.0
       * @apiDescription Create a new user and operator with admin entitlement
       *
       * @apiHeader {String} Content-Type=application/json
       *
       * @apiParam {Object} user The user details
       * @apiParam {String{128}} user.firstName
       * @apiParam {String{128}} user.lastName
       * @apiParam {String{64}} [user.suffix]
       * @apiParam {String{128}} user.email
       * @apiParam {String=male,female,other} [user.gender]
       * @apiParam {String=active,registered,invited,archived} [user.status=active]
       * @apiParam {Boolean} [user.checkedIn=false]
       * @apiUse OperatorFields
       *
       * @apiSuccess {Number} userId
       * @apiSuccess {Number} operatorId
       *
       * @apiUse BadRequest
       * @apiUse DatabaseError
       * @apiUse ResourceConflict
       *
       * @apiExample {js} Axios Example Usage:
       * axios.post('/create/admins/newUser', {
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
      $app->post('/admins/newUser', createNewAdmin($app));

      /**
       * @api {post} /create/judges/existingUser Judge from Existing User
       * @apiGroup Create
       * @apiName JudgeFromExisting
       * @apiVersion 0.1.0
       * @apiDescription Add judge entitlement to operator from an existing user. May need to create operator.
       *
       * @apiHeader {String} Content-Type=application/json
       *
       * @apiParam {Number} userId The id of an existing user to which to grant the 'judge' entitlement.
       * @apiUse OperatorFields
       * @apiUse JudgeFields
       *
       * @apiSuccess {Number} userId
       * @apiSuccess {Number} operatorId
       *
       * @apiUse BadRequest
       * @apiUse DatabaseError
       * @apiUse ResourceConflict
       * @apiUse UserNotFound
       *
       * @apiExample {js} Axios Example Usage:
       * axios.post('/create/judges/existingUser', {
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
      $app->post('/judges/existingUser', createJudgeFromExisting($app));

      /**
       * @api {post} /create/judges/newUser Judge with New User
       * @apiGroup Create
       * @apiName JudgeWithNew
       * @apiVersion 0.1.0
       * @apiDescription Create a new user and operator with judge entitlement
       *
       * @apiHeader {String} Content-Type=application/json
       *
       * @apiParam {Object} user The user details
       * @apiParam {String{128}} user.firstName
       * @apiParam {String{128}} user.lastName
       * @apiParam {String{64}} [user.suffix]
       * @apiParam {String{128}} user.email
       * @apiParam {String=male,female,other} [user.gender]
       * @apiParam {String=active,registered,invited,archived} [user.status=active]
       * @apiParam {Boolean} [user.checkedIn=false]
       * @apiUse OperatorFields
       * @apiUse JudgeFields
       *
       * @apiSuccess {Number} userId
       * @apiSuccess {Number} operatorId
       *
       * @apiUse BadRequest
       * @apiUse DatabaseError
       *
       * @apiExample {js} Axios Example Usage:
       * axios.post('/create/judges/newUser', {
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
      $app->post('/judges/newUser', createNewJudge($app));

      /**
       * @api {post} /create/students New Student
       * @apiGroup Create
       * @apiName Student
       * @apiVersion 0.1.0
       * @apiDescription Create a new user and student
       *
       * @apiHeader {String} Content-Type=application/json
       *
       * @apiUse UserFields
       * @apiParam {Object} student The student details
       * @apiParam {Number} [student.schoolId]
       * @apiParam {Number} [student.projectId]
       * @apiParam {Number} [student.gradeLevelId]
       *
       * @apiSuccess {Number} userId
       * @apiSuccess {Number} studentId
       *
       * @apiUse BadRequest
       * @apiUse DatabaseError
       * @apiUse ResourceConflict
       *
       * @apiExample {js} Axios Example Usage:
       * axios.post('/create/students', {
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
      $app->post('/students', createNewStudent($app));

      /**
       * @api {post} /create/schools New School
       * @apiGroup Create
       * @apiName School
       * @apiVersion 0.1.0
       * @apiDescription Create a new school
       *
       * @apiHeader {String} Content-Type=application/json
       *
       * @apiParam {Object} school The school details
       * @apiParam {String{128}} school.name
       * @apiParam {Number} [school.countyId]
       *
       * @apiSuccess {Number} schoolId
       *
       * @apiUse BadRequest
       * @apiUse DatabaseError
       * @apiUse ResourceConflict
       *
       * @apiExample {js} Axios Example Usage:
       * axios.post('/create/schools', {
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
      $app->post('/schools', createNewSchool($app));

      /**
       * @api {post} /create/counties New County
       * @apiGroup Create
       * @apiName County
       * @apiVersion 0.1.0
       * @apiDescription Create a new county
       *
       * @apiHeader {String} Content-Type=application/json
       *
       * @apiParam {Object} county The county details
       * @apiParam {String{64}} county.name
       *
       * @apiSuccess {Number} countyId
       *
       * @apiUse BadRequest
       * @apiUse DatabaseError
       * @apiUse ResourceConflict
       *
       * @apiExample {js} Axios Example Usage:
       * axios.post('/create/counties', {
       *  county: {
       *    name: "Marion County"
       *  },
       * }).then(res => {
       *  console.log(res);
       * }).catch(err => {
       *  console.log(err.response.data);
       * });
       */
      $app->post('/counties', createNewCounty($app));

      /**
       * @api {post} /create/projects New Project
       * @apiGroup Create
       * @apiName Project
       * @apiVersion 0.1.0
       * @apiDescription Create a new project
       *
       * @apiHeader {String} Content-Type=application/json
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
       * @apiUse BadRequest
       * @apiUse DatabaseError
       * @apiUse ResourceConflict
       *
       * @apiExample {js} Axios Example Usage:
       * axios.post('/create/counties', {
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
      $app->post('/projects', createNewProject($app));

      /**
       * @api {post} /create/categories New Category
       * @apiGroup Create
       * @apiName Category
       * @apiVersion 0.1.0
       * @apiDescription Create a new category
       *
       * @apiHeader {String} Content-Type=application/json
       *
       * @apiParam {Object} category The category details
       * @apiParam {String{64}} category.name
       * @apiParam {Boolean} [category.active=true] Whether or not the category should be active
       *
       * @apiSuccess {Number} categoryId
       * @apiSuccess {String} name
       *
       * @apiUse BadRequest
       * @apiUse DatabaseError
       * @apiUse ResourceConflict
       *
       * @apiExample {js} Axios Example Usage:
       * axios.post('/create/categories', {
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
      $app->post('/categories', createNewCategory($app));

      /**
       * @api {post} /create/booths New Booth
       * @apiGroup Create
       * @apiName Booth
       * @apiVersion 0.1.0
       * @apiDescription Create a new booth
       *
       * @apiHeader {String} Content-Type=application/json
       *
       * @apiParam {Object} booth The booth details
       * @apiParam {Number} booth.number
       * @apiParam {Boolean} [booth.active=true] Whether or not the booth should be active
       *
       * @apiSuccess {Number} boothId
       * @apiSuccess {String} name
       *
       * @apiUse BadRequest
       * @apiUse DatabaseError
       * @apiUse ResourceConflict
       *
       * @apiExample {js} Axios Example Usage:
       * axios.post('/create/booths', {
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
      $app->post('/booths', createNewBooth($app));

      /**
       * @api {post} /create/gradeLevels New GradeLevel
       * @apiGroup Create
       * @apiName GradeLevel
       * @apiVersion 0.1.0
       * @apiDescription Create a new gradeLevel
       *
       * @apiHeader {String} Content-Type=application/json
       *
       * @apiParam {Object} gradeLevel The gradeLevel details
       * @apiParam {String{64}} gradeLevel.name
       * @apiParam {Boolean} [gradeLevel.active=true] Whether or not the gradeLevel should be active
       *
       * @apiSuccess {Number} gradeLevelId
       * @apiSuccess {String} name
       *
       * @apiUse BadRequest
       * @apiUse DatabaseError
       * @apiUse ResourceConflict
       *
       * @apiExample {js} Axios Example Usage:
       * axios.post('/create/gradeLevels', {
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
      $app->post('/gradeLevels', createNewGradeLevel($app));
    };
}
