<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'core/controller.class.php';

class Home extends Controller {
    
    function index(){        
        $this->view("home/index");
    }
    
    function mensagem($mensagem="", $valor=""){        
        $this->view("home/mensagem", ['mensagem'=>$mensagem,'valor'=>$valor], true, ['padrao.js','teste.css']);
    }
}