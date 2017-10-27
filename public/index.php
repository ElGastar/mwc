<?php
use vendor\core\Router;
define("WWW", __DIR__);
define("CORE", dirname(__DIR__)."/vendor/core");
define("ROOT", dirname(__DIR__));
define("APP", dirname(__DIR__).'/app');




$query=$_SERVER['QUERY_STRING'];
//require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';
//require '../app/controllers/Main.php';
//require '../app/controllers/Posts.php';
//require '../app/controllers/PostsNew.php';
/*функция автозагрузки
 * 
 *  */
spl_autoload_register(function ($class){
    $file= ROOT .'/'. str_replace('\\', '/', $class) . ".php";
    if (is_file($file)) {
        require_once $file;
    }
});
/* 
 * так можно не существующие 
 * контроллери в маршруте 
 * оправить существующим контроллерам и методам
 */
Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller'=>'Page']);
/*
 * измененый маршрут без параметра action
 * если вести page/about 
 * сработает page/view/about
 */
Router::add('^page/(?P<alias>[a-z-]+)$', ['controller'=>'Page','action'=>'view']);

//дефолтные правила маршрузизации
Router::add('^$', ['controller'=>'Main','action'=>'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');


debug(Router::getRoutes());
Router::dispatch($query);
