<?php

/* 
 * Este controlador é responsável pelas ações relacionadas ao logon e logout do
 * sistema.
 * 
 * 08/01/2017 adriano
 * 
 */

require_once 'core/controller.class.php';

class Login extends Controller {
    
    /** Enviar false como parâmetro indica que não é necessário que o usuário 
     * esteja logado para visualizar as telas deste controller
     */
    public function __construct(){
        parent::__construct(false);
    }
    
    /** Recebe o usuário e senha do formulário de login,
     * valida o usuário e manda para tela inicial do sistema, se o usuário for
     * válido ou devolve para a tela de login com a mensagem de usuário ou senha
     * inválidos */
    function logon(){
        
        $model = $this->loadModel('usuario');
            
        $usuario = $this->param('usuario');
        $senha = $this->param('senha');
        
        if ($model->usuarioExiste($usuario, $senha)) {

            Session::getInstance()->set(USER_LOGGED,1);
            $this->view("home/mensagem", ['mensagem'=>'Você está logado!']);

        } else {
            $this->view("login/index", ['mensagem'=>'Usuário ou senha inválidos']);
        }
    }
    
    /** Tela de login */
    function index(){
        $this->view("login/index");
    }

    /** Realiza o logout do usuário, apaga ele da sessão do servidor */
    function logout(){
        Session::getInstance()->delete(USER_LOGGED);
        $this->view("login/index", ['mensagem'=>'Você saiu do sistema!']);
    }
    
}