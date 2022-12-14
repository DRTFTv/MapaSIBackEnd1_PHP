<?php

  class Router {
    private static $routes = array();

    private function __construct() {}
    private function __clone() {}

    public static function register($pattern, $callback) {
      $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
      self::$routes[$pattern] = $callback;
    }

    public static function execute($url) {
      foreach (self::$routes as $pattern => $callback) {
        if (preg_match($pattern, $url, $params)) {
          array_shift($params);
          return call_user_func_array($callback, array_values($params));
        }
      }
    }
  }
?>