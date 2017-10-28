<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace vendor\core\base;

/**
 * Description of Controller
 *
 * @author т
 */
abstract class Controller { 
/**
  * Текущий маршрут и параметры(Controller,action,param)
  * @var array
  */
    public $route=[];
    
 /**
   * вид
   * @var string
   */
    public $view;
    
    /**
  * Текущий шаблон
  * @var string
  */
    public $layout;
    /**
  * Ползовательские данные 
  * @var array
  */
    public $vars=[];
    
    public function __construct($route) {
        $this->route=$route;
        $this->view=$route['action'];
 
    }
    
    public function getView() {
        $vObj= new View($this->route, $this->layout, $this->view);
        $vObj->rendor($this->vars);
    }
    public function set($vars) {
        $this->vars=$vars;
    }
}
