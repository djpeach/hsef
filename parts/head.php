<?php if ($_SERVER['REQUEST_URI'] === '/hsef/index.php') require_once $_SERVER['DOCUMENT_ROOT'].'/hsef/helpers/fallback.php'; ?>
<?php

  /**
   * Used by fallback.php to determine if a page was directly accessed.
   */
  $directAccessAttack = false;

  /**
   * Global Helpers and Variables
   */
  require_once 'helpers/Session.php';
  $session = new Session();

  require_once 'helpers/Post.php';
  require_once 'helpers/AuthAccount.php';
  require_once 'helpers/Errors.php';
  require_once 'helpers/Queries.php';
  require_once 'helpers/utils.php';

  /**
   * Use this for href attributes.
   * eg <a href="/hsef/?page=dashboard">Dashboard</a>
   */
  if (isset($_GET['page'])) {
    $session->page = $_GET['page'];
    echo "<script>history.replaceState && history.replaceState(null, '', location.pathname + location.search.replace(/[\?&]page=[^&]+/, '').replace(/^&/, '?'));</script>";
  }

  $post = new Post(); // $_POST variables class
  $authAccount = new AuthAccount();

  /**
   * Database Connection
   */
  $db = null;
  try {
    $host = 'localhost';
    $db   = 'djpeach_db';
    $user = 'djpeach';
    $pass = 'djpeach';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
      PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $db = new PDO($dsn, $user, $pass, $options);
  } catch (\PDOException $e) {
    // TODO: list admin email, or auto-send email.
    print $e;
    print "Error connecting to database. Contact a admin ASAP!";
    die();
  }

  /**
   * Initialize page variable
   */
  if (!isset($session->page)) {
    $session->page = 'login';
  }
  $page = $session->page;

?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="styles/styles.css"/>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,600,700,900"/>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <title>HSEF</title>
</head>
<body>