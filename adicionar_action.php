<?php
require 'config.php';
require_once 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$idade = filter_input(INPUT_POST, 'idade');
$cidade = filter_input(INPUT_POST, 'cidade');
$estado = filter_input(INPUT_POST, 'estado');
$empresa = filter_input(INPUT_POST, 'empresa');

$array = [
    'status' => '',
    'equals' => ''
];

if($name && $email && $idade && $cidade && $estado && $empresa) {
    if($usuarioDao->findByEmail($email) === false) {
        
        $newUser = new Usuario();
        $newUser->nome = $name;
        $newUser->email = $email;
        $newUser->idade = $idade;
        $newUser->cidade = $cidade;
        $newUser->estado = $estado;
        $newUser->empresa = $empresa;

        $usuarioDao->insert($newUser);
    } else {
        $array['equals'] = 'of';
    }

} else {
    $array['status'] = 'of';
}

echo json_encode($array);

