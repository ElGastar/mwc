<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace vendor\core\base;

/**
 * Description of View
 *
 * @author т
 */
class View {
/**
 * Текущий маршрут и параметры(Controller,action,param)
 * @var array
 */
    public $route=[];
    
/**
  * Текущий вид
  * @var string
  */
    public $view;
    
/**
  * Текущий шаблон
  * @var string
  */
    public $layout;
    
    public function __construct($route, $layout, $view)
    {
        $this->route=$route;
        if ($layout===false) {
            $this->layout=FALSE;
        } else {
           $this->layout= $layout ?: LAYOUT;
        }
        
        $this->view= $view;
        
    }
    
    public function rendor($vars) {
        if (is_array($vars)) {
            extract($vars);
        }
        
       /*
        * Подключаем вид 
        * но перед подключением вида должно подключатся шаблон 
        * по этому данные шаблона 
        * храним переменной
        */
        $file_view= APP . "/views/{$this->route['controller']}/{$this->view}.php";
        /*
         * после вызова этой функции вес код
         * который находится за ним
         * сохроняется в буфере обмена 
         */
        ob_start();
        if (file_exists($file_view)) {
            require $file_view;
        } else {
            echo "Вид $file_view не найден";
        }
        /*
         * и сохроняем в переменной все что находится
         * в буфере обмена и очищаем буфер
         */
       $content= ob_get_clean();
       if ($this->layout!==FALSE) {
           $file_layout= APP . "/views/layouts/{$this->layout}.php";
       if (file_exists($file_layout)) {
            require $file_layout;
        } else {
            echo "Вид $file_layout не найден";
        }
       }
       
    }
}
