<?php

/* 
 * O arquivo .htaccess possui uma regra que redireciona todas as requisições
 * para está página, aqui é instanciada a classe App, que é a raiz do sistema,
 * a partir desse objeto é instanciado o controller correto conforme a indicado
 * na URL da requisição. Conforme a regra abaixo:
 * /agendamento/{nome do controller}/{nome do método do controller}/
 * 
 * Exemplo: A URL '/agendamento/home/index/' vai invocar 'Home::index()'.
 * 
 * 01/08/2017 adriano
 * 
 */

require_once("core/app.class.php");

$app = new App();
