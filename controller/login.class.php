<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'core/controller.class.php';

class Login extends Controller {
    
    public function __construct(){
        parent::__construct(false);
    }
    
    function index(){
        if (isset($_POST['user']) && isset($_POST['password'])){
            
            $db = new Database();
            $stmt = $db->prepare("SELECT * FROM user WHERE username = :user AND password = :pass");
            $stmt->bindParam(':user', $_POST['user']);
            $stmt->bindParam(':pass', $_POST['password']);
            $stmt->execute();
            $count = $stmt->rowCount();
            
            if ($count > 0) {
                Session::getInstance()->set(USER_LOGGED,1);
                $this->view("home/mensagem",['mensagem'=>'Você está logado!']);
            } else {
                $this->view("login/index",['mensagem'=>'Usuário ou senha inválidos']);
            }
            
        } else {        
            $this->view("login/index");
        }
    }

    function logout(){
        Session::getInstance()->delete(USER_LOGGED);
        $this->view("login/index",['mensagem'=>'Você saiu do sistema!']);
    }
    
}