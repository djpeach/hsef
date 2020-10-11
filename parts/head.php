<?php

  /**
   * Global Helpers and Variables
   */
  require_once 'helpers/Session.php';
  require_once 'helpers/DB.php';
  require_once 'helpers/JSLoader.php';
  require_once 'helpers/ModalLoader.php';
  require_once 'helpers/Post.php';
  require_once 'helpers/entities/AuthAccount.php';
  require_once 'helpers/entities/User.php';
  require_once 'helpers/entities/Operator.php';
  require_once 'helpers/Errors.php';
  require_once 'helpers/Queries.php';
  require_once 'helpers/utils.php';
  require_once 'helpers/Exceptions.php';

  ini_set('variables_order', 'EGPCS');

  // TODO get the actual email for sending emails
  $rootEmail = "hsef@sefi.org";

  /**
   * Initialize authentication
   * Auth strategy: reach out to db and look for valid session with this session_id()
   *
   * Load AuthAccount, User, and Operator details from the database if authenticated
   */
  AuthAccount::get()->authenticate();
  if (AuthAccount::get()->isAuthenticated()) {
    User::get(AuthAccount::get()->UserId);
    Operator::get(User::get()->UserId);
  }

  function urlGuard() {
    $publicPages = ['login', 'judgeRegistration', 'judgeAcceptance'];

    $newPage = isset($_GET['page']);
    $authenticated = AuthAccount::get()->isAuthenticated();

    if ($newPage) { // going to a new page
      $publicPage = in_array($_GET['page'], $publicPages);
      if (!$authenticated && !$publicPage) {
        Session::get()->page = 'login';
        Session::get()->flashMessage = 'You need to log in to view this page';
      } else if (!$authenticated && $publicPage) {
        Session::get()->page = $_GET['page'];
      } else if ($authenticated && !$publicPage) {
        Session::get()->page = $_GET['page'];
      } else if ($authenticated && $publicPage) {
        // authenticated users should not be going to public pages.
        redirect('dashboard');
      }
    } else { // on your current page
      $publicPage = in_array(Session::get()->page, $publicPages);
      if (!$authenticated && !$publicPage) {
        redirect('login');
      } else if ($authenticated && $publicPage) {
        redirect('dashboard');
      }
    }
  }

  urlGuard();

  /**
   * Initialize page variable
   */
  if (!isset(Session::get()->page)) {
    Session::get()->page = 'login';
  }

?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- jQuery UI CSS -->
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/smoothness/jquery-ui.css" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,600,700,900"/>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Custom CSS (includes bootstrap) -->
  <link rel="stylesheet" href="styles/styles.css"/>

  <title>HSEF</title>
</head>
<body>