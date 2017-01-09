<?php

/* 
 * Neste arquivo são definidas as constantes utilizadas globalmente pelo sistema
 * 
 * 08/01/2017 adriano
 */

//Título do site, vai na tag <header> das páginas do template
define("TITLE","Template");

//URL base do site, usado para construir as URL de arquivos CSS, JS e imagens
define("BASE_URL","/agendamento/");

//Quando um usuário loga no sistema cria-se uma variável na sessão com esse nome
//para indicar que o usuário está logado
define("USER_LOGGED","user_logged");

//Parêmetros para conectar com o SGBD
define("DATABASE_TYPE","mysql");
define("DATABASE_HOST","localhost");
define("DATABASE_NAME","agendamento");
define("DATABASE_USER","root");
define("DATABASE_PASSWORD","123");