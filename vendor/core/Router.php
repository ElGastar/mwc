<?php

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
            if($url==$pattern)
            {
                self::$route=$route;
                return true;
            }
        }
        return false ;
    }
}