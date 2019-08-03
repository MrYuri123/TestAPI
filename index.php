<?php

function autoloader($className) {
      if (file_exists($className . '.php')) {
          require_once $className . '.php';
          return true;
      }
      return false;
}
spl_autoload_register('autoloader');

use api\MainApi;

$api = new MainApi($_SERVER['REQUEST_METHOD']);
//Check if we can trust to that IP.
$api->checkAccess();
//If request http://localhost/users?id=1 $requestName will be "users"
$requestName = explode('/', strtok($_SERVER['REQUEST_URI'], '?'))[1];

echo $api->getResult($requestName);
