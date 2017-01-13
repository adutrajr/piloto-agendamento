
<form method="post" action="<?=BASE_URL?>login/logon">
    <h1>Login</h1>
    <p>
        <label for=usuario"">Usuário</label>
        <input name="usuario" type="text" value=""/>
    </p>
    <p>
        <label for="senha">Senha</label>
        <input name="senha" type="password" value=""/>
    </p>
    <p><input class="botao" type="submit" value="Enviar" /></p>
</form>
<?php if(isset($params['mensagem'])) { ?>
<p class="mensagem"><?=$params['mensagem']?></p>
<?php } ?>