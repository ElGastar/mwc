<?php
namespace app\controllers;

use app\models\Main;
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
class MainController extends AppController {
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
              $model = new Main;
              //$res=$model->query("CREATE TABLE posts SELECT * FROM yii2.post");
              $posts=$model->findAll();
              
                $title="page title";
                $this->set(compact('title','posts'));
    }
       function testAction() {
       
    }
       function testNewAction() {
       
    }
     function testq() {
        echo "posts::testNew<br>";
    }
}
