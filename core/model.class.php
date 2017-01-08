<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Model {
    
    private $db;
    
    function __construct($db){
        if (is_a($db, "Database")) {
            $this->db = $db;
        }        
    }
}