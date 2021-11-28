<?php
require 'config.php';
require_once 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$id = filter_input(INPUT_POST, 'id');
if($id) {
    $info = $usuarioDao->findById($id);
}
?>
<div>
    <div class="div">
        <h2>Editar Usuário</h2>
        <button onclick="fechar()" id="close"><span>&#x2715;</span>
        </button>
    </div>
</div>
<div class="container">
    <form method="POST" class="form-label">
        
        <label>
            Nome:<br/>
            <input class="form-control" aria-label="default input example" type="text" name="name" value="<?=$info->nome;?>">
        </label><br/><br/>

        <label>
            Idade:<br/>
            <input class="form-control" aria-label="default input example" type="text" name="idade" value="<?=$info->idade;?>">
        </label><br/><br/>

        <label>
            Cidade:<br/>
            <input class="form-control" aria-label="default input example" type="text" name="cidade" value="<?=$info->cidade;?>">
        </label><br/><br/>

        <label>
            Estado:<br/>
            <input class="form-control" aria-label="default input example" type="text" name="estado" value="<?=$info->estado;?>">
        </label><br/><br/>

        <label> 
            Empresa:<br/>
            <input class="form-control" aria-label="default input example" type="text" name="empresa" value="<?=$info->empresa;?>">
        </label><br/><br/>

        <input type="hidden" name="id" value="<?=$info->id;?>">

        
        <button class="btn btn-outline-primary btn-sm">Salvar</button>
        <button type="button" onclick="fechar()" class="btn btn-outline-danger btn-sm">Cancelar</button>
    </form>
</div>