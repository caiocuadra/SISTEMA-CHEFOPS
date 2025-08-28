<?php

    session_start();
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'chefops');
    define('INCLUDE_PATH', $_SERVER['DOCUMENT_ROOT']."/AuxiliarGestorHamburgueria/");
    require_once 'Controller/conexao.php';
    date_default_timezone_set('America/Sao_Paulo');

    define("SISTEMA", "ChefOps");
    // Define as constantes de conexão com o banco de dados
    
    
?>