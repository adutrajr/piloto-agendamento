<?php

/* 
 * Realiza as operações e regras de negócio relacionadas aos usuários.
 * 
 * A senha dos usuários não é armazenada como texto plano na base de dados,
 * assim não é possível que uma pessoa que teve acesso ao banco consiga 
 * saber a senha dos usuários do sistema.
 * 
 * As senhas são armazenadas como um hash, utilizando o algorítimo 'sha256', que
 * é o algorítimo indicado para essas situações. Toda vez que a senha do usuário
 * for pesquisada no banco é necessário utilizar o método 'hash()' do PHP antes.
 * A senha deve ser concatenada com o valor da propriedade $salt' apenas para 
 * que a quebra da senha por força bruta se torne mais difícil.
 * 
 * O processo é seguro mas a consequência é que se o usuário perder a senha, não
 * será possível recuperá-la, será necessário criar uma senha nova, já que o 
 * processo de hash é irreversível.
 * 
 * Obs: o resultado do processo de hash é sempre uma string de 64 bytes, sendo
 * assim, o campo para armazenar a senha na base de dados deve ter esse tamanho.
 * 
 * 08/01/2017 adriano
 */

class Usuario_Model extends Model {
    
    /** String utilizada concatenada com a senha para a geração do hash,
     * tornando mais difícl quebrar a senha por força bruta.     
     */
    private $salt = "batatinhaquandonasceesparramapelochao";
    
    /** Verifica se existe um usuário com o nome de usuário e senha indicados em
     * '$usuario' e '$senha' respectivamente. O processo de hash da senha é 
     * realizado dentro deste método.*/
    public function usuarioExiste($usuario, $senha){
        
        //cria o hash da senha do usuário
        $hash_da_senha =  hash('sha256', $this->salt . $senha);
        
        $stmt = $this->db->prepare("SELECT * FROM usuario WHERE usuario = :usuario AND senha = :senha");
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':senha', $hash_da_senha);
        $stmt->execute();
        $contador = $stmt->rowCount();
        
        return ($contador > 0);
    }
    
}