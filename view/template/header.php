<?php
/* 
 * Topo do template do sistema, o conteúdo deste arquivo é enviado ao navegador
 * antes de ser enviado o conteúdo o arquivo da view indicado no controller com
 * o método 'view()'.
 * 
 * * 01/08/2017 adriano
 */
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <title><?=TITLE?></title>
        <link href="<?=BASE_URL?>public/jquery/jquery-ui.css" rel="stylesheet">
        <link href="<?=BASE_URL?>public/css/padrao.css" rel="stylesheet">
<?php 
    foreach ($scripts as $script) { 
        if (substr($script, strlen($script)-4, 4) == ".css") {
?>
        <link href="<?=BASE_URL?>public/css/<?=$script?>" rel="stylesheet">
<?php   } 
    } 
?>      
        <script src="<?=BASE_URL?>public/jquery/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="<?=BASE_URL?>public/jquery/jquery-ui.js" type="text/javascript" ></script>
        <script src="<?=BASE_URL?>public/js/padrao.js" type="text/javascript" ></script>
<?php 
    foreach ($scripts as $script) { 
        if (substr($script, strlen($script)-3, 3) == ".js") {
?>
        <script src="<?=BASE_URL?>public/js/<?=$script?>" type="text/javascript"></script>
<?php   }
    } 
?>
    </head>
    <body>
        <div id="box">
            <div id="header">
                Header
                <?php if (Session::getInstance()->exists(USER_LOGGED)){?>
                <a href="<?=BASE_URL?>login/logout" >Sair</a>
                <?php } ?>
            </div>
            <div id="body">
        