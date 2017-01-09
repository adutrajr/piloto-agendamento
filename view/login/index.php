<form method="post" action="<?=BASE_URL?>login/logon">
    <label>Usuário</label><input name="usuario" type="text" value=""/>
    <label>Senha</label><input name="senha" type="password" value=""/>
    <input type="submit" value="Enviar" />
    <?php if(isset($params['mensagem'])) { ?>
    <p><?=$params['mensagem']?></p>
    <?php } ?>
</form> 