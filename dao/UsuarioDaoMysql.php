<?php
require 'models/Usuario.php';

class UsuarioDaoMysql implements UsuarioDAO {

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function findAll() {
        $array = [];
        
        $sql = $this->pdo->query("SELECT * FROM usuarios");
        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach($data as $item) {
                $u = new Usuario();
                $u->id = $item['id'];
                $u->nome = $item['nome'];
                $u->email = $item['email'];
                $u->idade = $item['idade'];
                $u->cidade = $item['cidade'];
                $u->estado = $item['estado'];
                $u->empresa = $item['empresa'];

                $array[] = $u;
            }
        }

        return $array;
    }

    public function findByEmail($email) {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();
        if($sql->rowCount() > 0) {
            $item = $sql->fetch();
            $u = new Usuario();

            $u->id = $item['id'];
            $u->nome = $item['nome'];
            $u->email = $item['email'];
            $u->idade = $item['idade'];
            $u->cidade = $item['cidade'];
            $u->estado = $item['estado'];
            $u->empresa = $item['empresa'];


            return $u;
        } else {
            return false;
        }
    }

    public function update(Usuario $u) {
        $sql = $this->pdo->prepare("UPDATE usuarios SET
        nome = :name, 
        idade = :idade, 
        cidade = :cidade, 
        estado = :estado, 
        empresa = :empresa WHERE id = :id");
        $sql->bindValue(':name', $u->nome);
        $sql->bindValue(':idade', $u->idade);
        $sql->bindValue(':id', $u->id);
        $sql->bindValue(':cidade', $u->cidade);
        $sql->bindValue(':estado', $u->estado);
        $sql->bindValue(':empresa', $u->empresa);
        $sql->execute();

        return true;
    }

    public function insert(Usuario $u) {
        $sql = $this->pdo->prepare("INSERT INTO usuarios
        (nome, email, idade, cidade, estado, empresa) VALUES 
        (:name, :email, :idade, :cidade, :estado, :empresa)");
        $sql->bindValue(':name', $u->nome);
        $sql->bindValue(':email', $u->email);
        $sql->bindValue(':idade', $u->idade);
        $sql->bindValue(':cidade', $u->cidade);
        $sql->bindValue(':estado', $u->estado);
        $sql->bindValue(':empresa', $u->empresa);
        $sql->execute();
    }

    public function findById($id) {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0) {
            $item = $sql->fetch();
            $u = new Usuario();

            $u->id = $item['id'];
            $u->nome = $item['nome'];
            $u->email = $item['email'];
            $u->idade = $item['idade'];
            $u->cidade = $item['cidade'];
            $u->estado = $item['estado'];
            $u->empresa = $item['empresa'];

            return $u;
        } else {
            return false;
        }
    }

    public function delete($id) {
        $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function findByName($name) {
        $array = [];

        if(!empty($name)) {
            $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE nome LIKE :name");
            $sql->bindValue(':name', '%'.$name.'%');
            $sql->execute();
            
            if($sql->rowCount() > 0) {
                $data = $sql->fetchAll(PDO::FETCH_ASSOC);

                foreach($data as $item) {
                    $u = new Usuario();
                    $u->id = $item['id'];
                    $u->nome = $item['nome'];
                    $u->email = $item['email'];
                    $u->idade = $item['idade'];
                    $u->cidade = $item['cidade'];
                    $u->estado = $item['estado'];
                    $u->empresa = $item['empresa'];

                    $array[] = $u;
                }

            }
        }

        return $array;
    }



}
