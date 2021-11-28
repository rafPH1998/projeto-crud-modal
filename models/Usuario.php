<?php
class Usuario {
    public $id;
    public $nome;
    public $email;
    public $idade;
    public $cidade;
    public $estado;
    public $empresa;
}

interface UsuarioDAO {
    public function findAll();
    public function update(Usuario $u);
    public function delete($id);
    public function findById($id);
    public function insert(Usuario $u);
    public function findByEmail($email);
    public function findByName($name);
}