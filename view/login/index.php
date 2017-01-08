<form method="post" action="login">
    <label>Usuário</label><input name="user" type="text" value=""/>
    <label>Senha</label><input name="password" type="password" value=""/>
    <input type="submit" value="Enviar" />
    <?php if(isset($params['mensagem'])) { ?>
    <p><?=$params['mensagem']?></p>
    <?php } ?>
</form> 