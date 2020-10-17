<?php

/**
 * @apiDefine UserNotFound
 * @apiError {Object} UserNotFound
 * @apiError {Number} UserNotFound.code <code>404</code>
 * @apiError {String} UserNotFound.error UserNotFound
 * @apiError {String} UserNotFound.message A User with that <code>id</code> could not be found
 */

/**
 * @apiDefine BadRequest
 * @apiError {Object} BadRequest
 * @apiError {Number} BadRequest.code <code>400</code>
 * @apiError {String} BadRequest.error BadRequest
 * @apiError {String} BadRequest.message The request was poorly formed
 */

/**
 * @apiDefine ResourceConflict
 * @apiError {Object} ResourceConflict
 * @apiError {Number} ResourceConflict.code <code>409</code>
 * @apiError {String} ResourceConflict.error ResourceConflict
 * @apiError {String} ResourceConflict.message That resource already exists
 */

/**
 * @apiDefine UserFields
 * @apiParam {Object} user The user details
 * @apiParam {String{128}} user.firstName
 * @apiParam {String{128}} user.lastName
 * @apiParam {String{64}} [user.suffix]
 * @apiParam {String{128}} [user.email]
 * @apiParam {String=male,female,other} [user.gender]
 * @apiParam {String=active,registered,invited,archived} [user.status=active]
 * @apiParam {Boolean} [user.checkedIn=false]
 */

/**
 * @apiDefine OperatorFields
 * @apiParam {Object} [operator] The operator details
 * @apiParam {String{255}} [operator.title] Eg, Doctor, Professor
 * @apiParam {String{255}} [operator.highestDegree]
 * @apiParam {String{255}} [operator.employer]
 */

/**
 * @apiDefine JudgeFields
 * @apiParam {Object} [judge] The judge details
 * @apiParam {Number[]} [judge.categoryPreferenceIds] The ids of the categories this judge wishes to be matched with
 * @apiParam {Number[]} [judge.gradeLevelPreferenceIds] The ids of the gradeLevels this judge wishes to be matched with
 */

/**
 * @apiDefine StudentFields
 * @apiParam {Object} [student] The student details
 * @apiParam {Number} [student.schoolId]
 * @apiParam {Number} [student.projectId]
 * @apiParam {Number} [student.gradeLevelId]
 */