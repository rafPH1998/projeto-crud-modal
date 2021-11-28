<?php
require 'config.php';
require_once 'dao/UsuarioDaoMysql.php';

$lista = new UsuarioDaoMysql($pdo);
$usuario = $lista->findAll();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Tabela de usuários</title>
</head>

<body>
   