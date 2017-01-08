<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Session {
    
    private static $instance;
    
    private $sessionState = false;
    
    private function __construct(){
    }
    
    private function startSession(){
        if(!$this->sessionState){
            $this->sessionState = session_start();
        }
        
        return $this->sessionState;
    }
    
    public function destroy(){
        
        if ($this->sessionState){
            $this->sessionState = !session_destroy();
            unset($_SESSION);
            
            return !$this->sessionState;
        }
        
        return false;
    }
    
    public function getInstance(){
        
        if (!isset(self::$instance)){
            self::$instance = new self;
        }
        
        self::$instance->startSession();
                
        return self::$instance;
    }
    
    public function get($key){
        if (isset($_SESSION[$key])){
            return $_SESSION[$key]; 
        }
    }
    
    public function set($key, $value){
        return $_SESSION[$key] = $value;
    }
    
    public function delete($key){
        unset($_SESSION[$key]);
    }
    
    public function exists($key){
        return isset($_SESSION[$key]);
    }
    
}