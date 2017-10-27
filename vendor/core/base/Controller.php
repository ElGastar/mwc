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
    public $route=[];
    public $view;
    public function __construct($param) {
        $this->route=$param;
        //$this->view=$param['action'];
        //include APP."/views/{$param['controller']}/{$this->view}.php";
    }
}
