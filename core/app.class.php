<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor. * 
 */

class App {    
    
    protected $controller = "home";
        
    protected $method = "index";
    
    protected $params = [];
    
    public function __construct() {        
        
        $link = (isset($_REQUEST['url']) && is_string($_REQUEST['url'])) ? $_REQUEST['url'] : "";
        $url = self::parseUrl($link);
        
        if (isset($url[0])) {            
            
            if(file_exists("controller/" . $url[0] . ".class.php")) {
                $this->controller = $url[0];
                unset($url[0]);
            } 
            
            require_once("controller/" . $this->controller . ".class.php");
        }
        
        $this->controller = new $this->controller;
        
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        
        $this->params = $url ? array_values($url) : [];
        
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
    
    private function parseUrl($url){
        return explode("/", filter_var(rtrim($url, "/"), FILTER_SANITIZE_URL));
    }
}
?>