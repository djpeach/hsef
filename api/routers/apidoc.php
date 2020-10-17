<?php

/**
 * @apiDefine UserNotFoundError
 * @apiError {Object} UserNotFound The error object
 * @apiError {String} UserNotFound.message A User with that <code>id</code> could not be found
 * @apiError {Number} UserNotFound.code The error code (404)
 * @apiError {Number} UserNotFound.severity The error severity level
 * @apiError {String} UserNotFound.filename The file where the error was created
 * @apiError {Number} UserNotFound.lineno The line number where the error was created
 * @apiError {String} UserNotFound.stacktrace The stacktrace of the error, as a string
 */