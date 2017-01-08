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
    
    function view($view = "home", $params = [], $template = true, $scripts = []){
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
}

?>