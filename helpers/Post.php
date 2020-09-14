<?php require_once $_SERVER['DOCUMENT_ROOT'].'/hsef/helpers/fallback.php'; ?>
<?php

/**
 * Class Post
 * A class to make using $_POST unified and familiar
 */
class Post {

  public static $instance;

  public function __construct() {
    foreach ($_POST as $key => $postProp) {
      $this->{$key} = $postProp;
    }
  }

  public static function get() {
    if (!isset(Post::$instance)) {
      Post::$instance = new Post();
    }
    return Post::$instance;
  }

  public function __set($name, $value) {
    $this->{$name} = $value;
  }

  public function __get($name) {
    if (isset($this->{$name})) {
      return $this->{$name};
    }

    return NULL;
  }

  public function __isset($name) {
    return isset($this->{$name});
  }

  public function __unset($name) {
    unset($this->{$name});
  }
}