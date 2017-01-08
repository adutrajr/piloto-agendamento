<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'core/config.inc.php';
require_once 'core/session.class.php';
require_once 'core/database.class.php';

class Controller {
    
    private $requireLogin = true;
    protected $session = false;
    private $db = false;
    private $models = [];
    
    public function __construct($requireLogin = true) {
        $this->requireLogin = $requireLogin;
        
        if ($this->requireLogin){
            $this->session = Session::getInstance();
            
            if (!$this->session->exists(USER_LOGGED)){
                header('Location: '.SITE_DIRERCTORY.'login');
                exit();
            }
        }
    }
    
    public function view($view = "home", $params = [], $template = true, $scripts = []){
        $filename = 'view/' . $view . '.php';
        
        if (file_exists($filename)) {
            
            if($template) {
                include 'view/template/constants.inc.php';
                require 'view/template/header.php';
            }
            
            require $filename;
            
            if($template) {
                require 'view/template/footer.php';
            }
        }
    }
    
    public function loadModel($name){
        
        if (isset($this->models[$name])){
            return $this->models[$name];
        } 
        
        $filename = "model/" . $name . "_model.class.php";
    
        if (file_exists($filename)){

            require_once "core/model.class.php";
            require_once $filename;

            if (!$this->db) {
                $this->db = new Database();
            }

            $model = new $name . "_Model";

            $this->models[$name] = $model;

            return $model;
        }
        
    }
}

?>