<?php
namespace vendor\core;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Router
 *
 * @author т
 */
class Router 
{
    //public function __construct() {
     //   echo "hello world";
    //}
    protected static $routes = [];
    protected static $route = [];
    
    public static function add($regexp, $route=[])
     {
        self::$routes[$regexp]=$route;
    }
    public static function getRoutes()
    {
        return self::$routes;
    }
    public static function getRoute()
    {
        return self::$route;
    }
    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern=>$route)
        {
            if(preg_match("#$pattern#i", $url, $matches))
            {
                foreach ($matches as $k=>$v)
                {
                    if(is_string($k))
                    {
                        $route[$k]=$v;
                    }
                }
                if (!isset($route['action'])) {
                    $route['action']='index';
                }
                $route['controller']= self::upperCamelCase($route['controller']);
                self::$route=$route;
                return true;
            }
        }
        return false ;
    }
    public static function dispatch($url) {
        $url= self::removeQueryString($url);
        var_dump($url);
        if (self::matchRoute($url)) { 
            
            $controller= 'app\controllers\\' . self::$route['controller'] ;
           
               if (class_exists($controller)) {
                $cObj=new $controller(self::$route); 
                
                /* .Action добовляется для того что бы
                 *  не возможно было вызвать методы без называнье Action
                 */
                
                  $action= self::lowwerCamelCase(self::$route['action'])."Action";
                     if (method_exists($cObj, $action)) {
                    $cObj->$action();
                } else {
                 echo "Method $controller::$action not found<br>";    
                }
            } else {
            echo "Controller $controller not found<br>";    
            }
        } else {
            http_response_code(404);
            include '404.html'; 
        }
    }
    
    protected static function upperCamelCase($name)
    {
  
        
      return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
        
        
    }
    
        protected static function lowwerCamelCase($name)
    {
  
        
      return lcfirst(self::upperCamelCase($name));
        
        
    }
    protected static function removeQueryString($url)
    {
        if ($url) 
        {
         $params = explode('&', $url, 2);
         if(false === strpos($params[0], '='))
                 {
             return rtrim($params[0], '/');   
                 } else {
                     return '';    
                 }
        }   
    }
    
    
}