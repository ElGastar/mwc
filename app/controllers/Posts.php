<?php
namespace app\controllers;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Posts
 *
 * @author т
 */
class Posts extends App {
  
      function indexAction() {
          debug($this->route);
        echo "posts::index<br>";
    }
       function testAction() {
        echo "posts::test<br>";
    }
       function testNewAction() {
        echo "posts::testNew<br>";
    }
     function testq() {
        echo "posts::testNew<br>";
    }
}
