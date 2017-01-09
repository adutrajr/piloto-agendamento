<?php

/* 
 * Classe utilizada para acessar os valores armazenados na sessão do PHP,
 * essa classe implementa o padrão de projeto 'Singleton', impedindo que
 * seja criada mais de uma instância deste tipo, para acessar o objeto 
 * disponível deve-se chamar o método estático 'Session::getInstance()', que 
 * retorna e cria o objeto se necessário.
 * 
 * Como a sessão é uma só, nunca será necessário criar mais de um objeto, também
 * não é preciso se preocupar com a criação da instância, ela será criada pelo
 * construtor da classe 'Controller' e disponibilizada na propriedade '$session'
 * de todos as classes que herdam 'Controller'.
 * 
 * A principal razão para que essa classe tenha só uma instância é o fato dela
 * trabalhar com as funções do PHP que criam e destroem a sessão, se várias 
 * instâncias existirem operando esses métodos ao mesmo tempo seria muito fácil
 * disparar mensagens de erro do PHP tentando acessar a sessão depois de 
 * destruída, por exemplo.
 * 
 * 08/01/2017 adriano
 */

class Session {
    
    //Armazena a instância única do objeto desta classe
    private static $instance;
    
    //indica se a sessão já foi iniciada ou não
    private $sessionState = false;
    
    /** Construtor privado, imprede que a classe seja instânciada com 'new' em
     * outra classe que não seja esta.
     */
    private function __construct(){
    }
    
    /** Inicia a sessão no PHP */
    private function startSession(){
        if(!$this->sessionState){
            $this->sessionState = session_start();
        }
        
        return $this->sessionState;
    }
    
    /** Destrói a sessão, se o usuário estiver logado, vai perder o login. */
    public function destroy(){
        
        if ($this->sessionState){
            $this->sessionState = !session_destroy();
            unset($_SESSION);
            
            return !$this->sessionState;
        }
        
        return false;
    }
    
    /** Instancia e retorna um objeto desta classe, só é possível através deste
     * método, não é possível criar este objeto deste tipo usando 'new'.
     */
    public function getInstance(){
        
        if (!isset(self::$instance)){
            self::$instance = new self;
        }
        
        self::$instance->startSession();
                
        return self::$instance;
    }
    
    /** retorna o valor armazenado na sessão com o nome indicado em '$key'. */
    public function get($key){
        if (isset($_SESSION[$key])){
            return $_SESSION[$key]; 
        }
    }
    
    /** Cria um valor na sessão com o nome indicado em '$key' e o valor indicado
     * em '$value'.
     */
    public function set($key, $value){
        return $_SESSION[$key] = $value;
    }
    
    /** Apaga da sessão o valor armazenado com o nome indicado em '$key'. */
    public function delete($key){
        unset($_SESSION[$key]);
    }
    
    /** verifica se existe um valor na sessão com o nome indicado em '$key',
     * retorna 'true' ou 'false'.
     */
    public function exists($key){
        return isset($_SESSION[$key]);
    }
    
}