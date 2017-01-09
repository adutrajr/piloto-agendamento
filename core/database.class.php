<?php

/* 
 * Classe que se conecta ao o SGBD e disponibliza os métodos para trabalhar 
 * com as informações na base de dados.
 * 
 * Como a classe herda de PDO, que é uma classe de um módulo do PHP, é 
 * necessário que o módulo do PDO (pdo_mysql) esteja habilitado no 'php.ini' e
 * que também esteja habilitado o módulo que contém o driver do SGBD utilizado,
 * neste caso o MySQL (mysqli).
 * 
 * No arquivo 'core\config.inc.php' são definidas as constantes utilizadas para
 * montar a string de conexão com o SGBD.
 * 
 * 08/01/2017 adriano
 */

class Database extends PDO {
    
    /** Chama o construtor da classe pai e passa a string de conexão com o banco
     * de dados. Este método deve ser sempre público, ou o PHP não permite que
     * o objeto seja criado.
     */
    public function __construct(){
        parent::__construct(DATABASE_TYPE.':host='.DATABASE_HOST.';dbname='.DATABASE_NAME, DATABASE_USER, DATABASE_PASSWORD);
    }
   
}
