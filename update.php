<?php 
require 'config.php';
require_once 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);
$usuario = $usuarioDao->findAll();

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$idade = filter_input(INPUT_POST, 'idade');
$cidade = filter_input(INPUT_POST, 'cidade');
$estado = filter_input(INPUT_POST, 'estado');
$empresa = filter_input(INPUT_POST, 'empresa');


$array = [
    'equals' => ''
];

if($id && $name && $idade && $cidade && $estado && $empresa) {
    $newUser = new Usuario();
    $newUser->id = $id;
    $newUser->nome = $name;
    $newUser->idade = $idade;
    $newUser->cidade = $cidade;
    $newUser->estado = $estado;
    $newUser->empresa = $empresa;

    $usuarioDao->update($newUser);
}

echo json_encode($array);
