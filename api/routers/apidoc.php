<?php

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