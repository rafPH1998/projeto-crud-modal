<?php require 'partials/header.php'; ?>

<div class="table">
    <h2>Tabela de Usuários cadastrados</h2>
</div>
<div class="main" class="container">
    <main>

        <div class="area-buttons">
            <a id="btn" href="javascript:;" onclick="add()" class="btn btn-success">Adicionar usuário</a>
            <div class="center">
                <form>
                    <input type="text" name="s" id="campo-search" placeholder="Digite o nome do usuário">
                    <button class="btn btn-success">Procurar</button>
                </form>
            </div>
        </div>
        <table id="table" width="1000px">
            <tr>
                <th>COD</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Idade</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Empresa</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($usuario as $usuarios) : ?>
                <tr>
                    <td><?= $usuarios->id; ?></td>
                    <td><?= $usuarios->nome; ?></td>
                    <td><?= $usuarios->email; ?></td>
                    <td><?= $usuarios->idade; ?></td>
                    <td><?= $usuarios->cidade; ?></td>
                    <td><?= $usuarios->estado; ?></td>
                    <td><?= $usuarios->empresa; ?></td>
                    <td>
                        <a href="javascript:;" onclick="editar('<?= $usuarios->id; ?>')" class="btn btn-primary">Editar</a>
                        <a href="javascript:;" onclick="excluir('<?= $usuarios->id; ?>')" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </main>

    <div id="modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">...</div>
            </div>
        </div>
    </div>
</div>


<?php require 'partials/footer.php';
