<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <title><?=TITLE?></title>
        <link href="<?=SITE_DIRERCTORY?>public/jquery/jquery-ui.css" rel="stylesheet">
        <link href="<?=SITE_DIRERCTORY?>public/css/padrao.css" rel="stylesheet">
<?php 
    foreach ($scripts as $script) { 
        if (substr($script, strlen($script)-4, 4) == ".css") {
?>
        <link href="<?=SITE_DIRERCTORY?>public/css/<?=$script?>" rel="stylesheet">
<?php   } 
    } 
?>      
        <script src="<?=SITE_DIRERCTORY?>public/jquery/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="<?=SITE_DIRERCTORY?>public/jquery/jquery-ui.js" type="text/javascript" ></script>
        <script src="<?=SITE_DIRERCTORY?>public/js/padrao.js" type="text/javascript" ></script>
<?php 
    foreach ($scripts as $script) { 
        if (substr($script, strlen($script)-3, 3) == ".js") {
?>
        <script src="<?=SITE_DIRERCTORY?>public/js/<?=$script?>" type="text/javascript"></script>
<?php   }
    } 
?>
    </head>
    <body>
        <div id="box">
            <div id="header">
                Header
                <?php if (Session::getInstance()->exists(USER_LOGGED)){?>
                <a href="<?=SITE_DIRERCTORY?>login/logout" >Sair</a>
                <?php } ?>
            </div>
            <div id="body">
        