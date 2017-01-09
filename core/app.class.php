<?php

/* 
 * Classe responsável por carregar as classes controller e chamar o método 
 * especificado na URL. 
 * 
 * Segue a seguinte regra: /agendamento/{nome do controller}/{nome do método}/
 * Se nenhum controller for especificado carrega o controller 'Home', 
 * se nenhum método for especificado chama o método 'index'.
 * 
 * Os demais níveis da URL, após o nome do método são passados como parêmtro
 * Por exemplo /agendamento/home/index/1/admin/
 * vai passar  '1' e 'admin' como parâmetro para o método 'index' (se o método
 * receber parâmetros).
 * 
 * O arquivo .htaccess redireciona todas as chamadas para
 * o arquivo 'index.php' que instancia esta classe. Para que esse sistema 
 * funcione é necessário que o módulo 'mod_rewrite' do Apache esteja habilitado
 * no arquivo de configuração do Apache.
 * 
 * 08/01/2017 adriano
 */

class App {    
    
    protected $controller = "home";
        
    protected $method = "index";
    
    protected $params = [];
    
    /** Constrói o objeto controller e chama o método especificados na URL */
    public function __construct() {        
        
        $link = (isset($_REQUEST['url']) && is_string($_REQUEST['url'])) ? $_REQUEST['url'] : "";
        $url = self::parseUrl($link);
        
        if (isset($url[0])) {            
            
            if(file_exists("controller/" . $url[0] . ".class.php")) {
                $this->controller = $url[0];
                unset($url[0]);
            } 
            
            //carrega o arquivo do controller 
            require_once("controller/" . $this->controller . ".class.php");
        }
        
        //cria a instância do controller
        $this->controller = new $this->controller;
        
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        
        $this->params = $url ? array_values($url) : [];
        
        //chama o método especificado na URL
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
    
    /** Quebra a URL em um Array de parâmetros.
     * Exemplo: 
     * /agendamento/home/index/ vira ([0]=>'home',[1]=>'index') */
    private function parseUrl($url){
        return explode("/", filter_var(rtrim($url, "/"), FILTER_SANITIZE_URL));
    }
}
?>