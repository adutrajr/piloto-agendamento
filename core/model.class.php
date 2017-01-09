<?php

/* 
 * Classe base que deve ser herada por todas as classes model do sistema.
 * O construtor recebe como parâmetro o objeto de que dá acesso a base de dados,
 * deve ser um objeto da classe 'Database', que herda a classe PDO do PHP.
 * 
 * 08/01/2017 adriano
 */

class Model {
    
    /** objeto que dá acesso ao banco de dados */
    protected $db;
    
    /** Método construtor, verifica se o parâmetro é da classe esperada */
    function __construct($db){
        if (is_a($db, "Database")) {
            $this->db = $db;
        }        
    }
}