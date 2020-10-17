<?php

// require all the controllers
foreach(glob(__DIR__."/../controllers/*.php") as $file) {
  require_once $file;
}

function createRouter($app) {
  return function() use ($app) {
      $app->group('/individual', function() use ($app) {
        /**
         * @api {post} /create/individual/admin/existingUser Admin from Existing User
         * @apiGroup Create[Individual]
         * @apiName CreateAdminFromExistingUser
         * @apiVersion 0.1.0
         * @apiDescription Create a new admin from an existing user
         *
         * @apiParam {Number} userId The id of an existing user to which to grant the 'admin' entitlement.
         *
         * @apiSuccess {String[]} entitlements The entitlements the operator has
         * @apiSuccess {Number} userId The User ID of the admin
         * @apiSuccess {Number} operatorId The Operator ID of the admin
         *
         * @apiExample {js} Axios Example Usage:
         * axios.post('/create/individual/admin/existingUser', {
         *  userId: 1234
         * }).then(res => {
         *  console.log(res);
         * }).catch(err => {
         *  console.log(err);
         * });
         */
        $app->post('/admin/existingUser', createAdminFromExisting($app));

        /**
         * @api {post} /create/individual/admin/newUser Admin with New User
         * @apiGroup Create[Individual]
         * @apiName CreateAdminWithNewUser
         * @apiVersion 0.1.0
         * @apiDescription Create a new user as an admin
         *
         * @apiParam {Object} user The new user details
         * @apiParam {String} user.firstName The new user's first name
         * @apiParam {String} [user.lastName] The new user's last name
         *
         * @apiSuccess {String[]} entitlements The entitlements the operator has
         * @apiSuccess {Number} userId The User ID of the admin
         * @apiSuccess {Number} operatorId The Operator ID of the admin
         *
         * @apiExample {js} Axios Example Usage:
         * axios.post('/create/individual/admin/newUser', {
         *  firstName: "Daniel",
         *  lastName: "Peach"
         * }).then(res => {
         *  console.log(res);
         * }).catch(err => {
         *  console.log(err);
         * });
         */
        $app->post('/admin/newUser', createNewAdmin($app));

        $app->post('/judge', function() use ($app) {
          echo 'Created judge';
        });

        $app->post('/student', function() use ($app) {
          echo 'Created student';
        });

        $app->post('/school', function() use ($app) {
          echo 'Created school';
        });

        $app->post('/county', function() use ($app) {
          echo 'Created county';
        });
        $app->post('/project', function() use ($app) {
          echo 'Created project';
        });
        $app->post('/category', function() use ($app) {
          echo 'Created category';
        });
        $app->post('/ranking', function() use ($app) {
          echo 'Created ranking';
        });
        $app->post('/booth', function() use ($app) {
          echo 'Created booth';
        });
        $app->post('/gradeLevel', function() use ($app) {
          echo 'Created gradeLevel';
        });
      });
      $app->group('/bulk', function() use ($app) {
        $app->post('/admin', function() use ($app) {
          echo 'Created admins';
        });
        $app->post('/judge', function() use ($app) {
          echo 'Created judges';
        });
        $app->post('/student', function() use ($app) {
          echo 'Created students';
        });
        $app->post('/school', function() use ($app) {
          echo 'Created schools';
        });
        $app->post('/county', function() use ($app) {
          echo 'Created countys';
        });
        $app->post('/project', function() use ($app) {
          echo 'Created projects';
        });
        $app->post('/category', function() use ($app) {
          echo 'Created categorys';
        });
        $app->post('/ranking', function() use ($app) {
          echo 'Created rankings';
        });
        $app->post('/booth', function() use ($app) {
          echo 'Created booths';
        });
        $app->post('/gradeLevel', function() use ($app) {
          echo 'Created gradeLevels';
        });
      });
    };
}
