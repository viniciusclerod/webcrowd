<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function __autoload($class_name) {
    if (file_exists(BASEPATH.DS.'lib'.DS.'core'.DS.$class_name.'.class.php')) {
        // AUTOLOAD LIB/CORE
        require_once(BASEPATH.DS.'lib'.DS.'core'.DS.$class_name.'.class.php');

    } elseif (file_exists(BASEPATH.DS.'lib'.DS.'helper'.DS.$class_name.'.php')) {
        // AUTOLOAD LIB/HELPERS
        require_once(BASEPATH.DS.'lib'.DS.'helper'.DS.$class_name.'.php');

    } elseif (file_exists(BASEPATH.DS.'app'.DS.'controllers'.DS.$class_name.'.php')) {
        // AUTOLOAD APP/CONTROLLERS
        require_once(BASEPATH.DS.'app'.DS.'controllers'.DS.$class_name.'.php');

    } elseif (file_exists(BASEPATH.DS.'app'.DS.'models'.DS.$class_name.'.php')) {
        // AUTOLOAD APP/MODELS
        require_once(BASEPATH.DS.'app'.DS.'models'.DS.$class_name.'.php');

    } elseif (file_exists(BASEPATH.DS.'app'.DS.'helpers'.DS.$class_name.'.php')) {
        // AUTOLOAD APP/HELPERS
        require_once(BASEPATH.DS.'app'.DS.'helpers'.DS.$class_name.'.php');

    } else {
        // TO DO
        /* Error Generation Code */
    }
}
