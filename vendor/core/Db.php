<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace vendor\core;

/**
 * Description of Db
 *
 * @author Лёлька
 */
class Db {
    protected $pdo;
    protected static $instance;
    public static $countSQL=[];
    public static $countQuery=0;
    
    protected function __construct() {
        $db= require ROOT.'/config/config_db.php';
        $options=[
            
            \PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE=>\PDO::FETCH_ASSOC,
        ];
        $this->pdo= new \PDO($db['dns'], $db['username'], $db['password'],$options);
    }
    public static function instance() {
        if (self::$instance===null) {
            self::$instance= new self;
        }
        return self::$instance;
        
    }
    public  function execute($sql, $params=[]) {
        self::$countQuery++;
        self::$countSQL[]=$sql;
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }
    public function query($sql, $params=[]) {
        self::$countQuery++;
        self::$countSQL[]=$sql;
        $stmt = $this->pdo->prepare($sql);
        $res=$stmt->execute($params);
        if ($res!==false) {
            return $stmt->fetchAll();
            
        }
        return [];
        
    }
}
