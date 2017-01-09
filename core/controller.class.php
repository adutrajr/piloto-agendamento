<?php

/* 
 * Classe base para todos os controllers, possui os métodos para acessar os
 * recursos do sistema, sessão, view, model e parâmetros. 
 * 
 * 08/01/2017 adriano
 */

require_once 'core/config.inc.php';
require_once 'core/session.class.php';
require_once 'core/database.class.php';

class Controller {
    
    private $requireLogin = true;
    protected $session = false;
    private $db = false;
    private $models = [];
    
    /** Verifica se o controller sendo instanciado precisa de login, se precisar
     * e o usuário não estiver logado, redireciona para a página inicial
     */
    public function __construct($requireLogin = true) {
        $this->requireLogin = $requireLogin;
        
        if ($this->requireLogin){
            $this->session = Session::getInstance();
            
            if (!$this->session->exists(USER_LOGGED)){
                header('Location: '.BASE_URL.'login');
                exit();
            }
        }
    }
    
    /** Este método carrega o arquivo da view indicada no parâmetro '$view' e a 
     * exibe na tela. 
     * 
     * O parâmetro '$template' pode ser 'true' ou 'false' e indica se envolta do
     * conteúdo da view deve ser colocado o conteúdo da template. 
     * 
     * O parâmetro '$params' leva um array onde cada posição é um nível da URL
     * Ex: /agendamento/home/login/1/admin/ cria o array ([0]=>'1',[1]=>'admin')
     * 
     * O parâmetro '$scripts' é um array com os arquivos JavaScript e CSS que
     * devem ser carregados no template.
     */
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
    
    /** Instancia o model indicado no parâmetro '$name', por exemplo, se $name 
     * conter o valor 'usuario' será carregado o model em 
     * 'mode/usuario_model.class.php'.
     */
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
            
            $className = $name."_model";
            
            $model = new $className($this->db);

            $this->models[$name] = $model;

            return $model;
        }
        
    }
    
    /** Retorna o parâmetro com o nome '$name', funciona para GET e POST */
    public function param($name){
        return $_REQUEST[$name];
    }
    
    /** Verifica se foi enviado um parâmetro com o nome indicado em  '$name',
     * pode ter sido enviado por GET ou POST.
     * Retorna 'true' ou 'false' */
    public function paramExists($name){
        return isset($_REQUEST[$name]);
    }
}

?>