<?php

$query=$_SERVER['QUERY_STRING'];
require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';

Router::add('posts/add', ['controller'=>'Posts','action'=>'add']);
Router::add('posts', ['controller'=>'Posts','action'=>'index']);

debug(Router::getRoutes());
if(Router::matchRoute($query))
   {
debug(Router::getRoute());

   }else
       {
    echo"404";
       }
