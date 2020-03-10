<?php
spl_autoload_register(function($className) {
    $namespace = str_replace("\\","/",__NAMESPACE__);
    $className = str_replace("\\","/",$className);
    $class = $_SERVER['DOCUMENT_ROOT'] . "/../src/" . (empty($namespace) ? "" : $namespace . "/") . "{$className}.php";
    require_once($class);
});

(new Router)->route();
