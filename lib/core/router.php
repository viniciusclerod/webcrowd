<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// CLEAN URI
#var_dump($_SERVER["REQUEST_URI"]);
#var_dump(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
#var_dump(trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/"));
$path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");

// REMOVE BASEURL (IF EXISTS)
#var_dump(BASEURL);
#var_dump(strpos($path, BASEURL));
#var_dump(strlen(BASEURL.'/'));
#var_dump(substr($path, strlen(BASEURL.'/')));
if (strpos($path, BASEURL) === 0) {
    $path = substr($path, strlen(BASEURL.'/'));
}

// MAP THE PATH TO CONTROLLER, ACTION AND PARAMS
#var_dump(explode("/", $path, 3));
$segments = explode("/", $path, 3);
#var_dump(sizeof($segments));
switch (sizeof($segments)) {
    case 1:
        if (empty($segments[0])) {
            $segments = array(DEFAULT_CONTROLLER, DEFAULT_ACTION, '');
        } else {
            $segments = array($segments[0], DEFAULT_ACTION, '');
        }
        break;
    case 2:
        $segments[2] = '';
        break;
}
list($controller, $action, $params) = $segments;
/*echo '--------------------------------------------------';
var_dump($controller);
var_dump($action);
var_dump($params);
echo '--------------------------------------------------';*/

// SET CONTROLLER
#var_dump(strtolower($controller));
#var_dump(ucfirst(strtolower($controller)) . "Controller");
$controller = ucfirst(strtolower($controller)) . "Controller";
#var_dump(class_exists($controller));
if (!class_exists($controller)) exit("The controller '$controller' has not been defined.");

// SET ACTION
#var_dump(new ReflectionClass($controller));
$reflector = new ReflectionClass($controller);
#var_dump($reflector->hasMethod($action));
if (!$reflector->hasMethod($action)) exit("The action '$action' has been not defined.");

// SET PARAMS
#var_dump(explode("/", $params));
$params = explode("/", $params);

// DISPATCH ROUTE
call_user_func_array(array(new $controller($controller, $action), $action), $params);