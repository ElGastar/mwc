<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace vendor\core\base;

use vendor\core\Db;
/**
 * Description of Model
 *
 * @author Лёлька
 */
abstract class Model {
    protected $pdo;
    protected $table;
    
    public function __construct() {
        $this->pdo = Db::instance();
        
    }
    public function query($sql) {
        return $this->pdo->execute($sql);
    }
    
    public function findAll() {
        $sql="SELECT * FROM {$this->table}";
        return $this->pdo->query($sql);
    }
    
}
