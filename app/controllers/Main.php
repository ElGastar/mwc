<?php
namespace app\controllers;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Main
 *
 * @author т
 */
class Main extends App {
    /*
     * определяем шаблон и вид
     * в данном случай шаблон layouts/main
     * вид Main/index.php
     * если ничего не включить 
     * поключентся дефолтный шаблон layouts/default 
     */
    //public $layout="main";
            function indexAction() {
                //$this->layout=false;
                //$this->view='test';
            
                // можно так $this->set(['name'=>'akmal']);
                //или 
                $name='akmal';
                $colors=[
                    'black'=>'черный',
                    'white'=>'белый'
                ];
                $title="page title";
                $this->set(compact('colors','name','title'));
    }
       function testAction() {
       
    }
       function testNewAction() {
       
    }
     function testq() {
        echo "posts::testNew<br>";
    }
}
