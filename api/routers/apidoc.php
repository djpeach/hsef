<?php

/**
 * @apiDefine ResourceNotFound
 * @apiError {Object} ResourceNotFound
 * @apiError {Number} ResourceNotFound.code <code>404</code>
 * @apiError {String} ResourceNotFound.error ResourceNotFound
 * @apiError {String} ResourceNotFound.message Could not find resource
 */

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
 * @apiDefine DatabaseError
 * @apiError {Object} DatabaseError
 * @apiError {Number} DatabaseError.code <code>502</code>
 * @apiError {String} DatabaseError.error DatabaseError
 * @apiError {String} DatabaseError.message There was an error communicating with the database
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
 * @apiDefine ListFields
 * @apiParam {Number} [limit=10] The max number of results to return
 * @apiParam {Number} [offset=0] Where to start the pagination
 */

/**
 * @apiDefine ListResults
 * @apiSuccess {Object} links
 * @apiSuccess {String} links.base The base url without a resource uri
 * @apiSuccess {String} [links.next] If there are more resources, a url to find them is returned
 * @apiSuccess {String} [links.prev] If there are previous resources, a url to find them is returned
 * @apiSuccess {Number} limit The max number of resources requested
 * @apiSuccess {Number} offset The offset used to fetch resources
 * @apiSuccess {Number} count The number of results returned
 */