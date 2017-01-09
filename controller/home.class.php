<?php

/* 
 * Controller padrão do sistema, se na URL não constar qual controller deve ser
 * chamado esta classe é instânciada e o método 'index' é invocado.
 * 
 * 08/01/2017 adriano
 */

require_once 'core/controller.class.php';

class Home extends Controller {
    
    /** Redireciona para a página incial do sitema */
    function index(){        
        $this->view("home/index");
    }
    
    /** Envia para uma página que exibe uma mensagem passada por parâmetro na 
     * URL. Exemplo: /agendamento/home/mensagem/{sua mensagem aqui}/ */
    function mensagem($mensagem){
        $this->view("home/mensagem", ['mensagem'=>$mensagem]);
    }

}