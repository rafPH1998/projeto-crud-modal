<?php
require 'config.php';
$name = filter_input(INPUT_GET, 'name');
$array = [];

if($name) {
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE nome LIKE :name");
    $sql->bindValue(':name', '%' . $name. '%');
    $sql->execute();

    if($sql->rowCount() > 0) {
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        $array = 
        '<table id="table" border="1" width="800px">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>Idade</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Empresa</th>
            </tr>
        ';
        foreach($data as $item) {
            $array .= '
            <tr>
                <td>'.$item['id'].'</td>
                <td>'.$item['nome'].'</td>
                <td>'.$item['email'].'</td>
                <td>'.$item['idade'].'</td>
                <td>'.$item['cidade'].'</td>
                <td>'.$item['estado'].'</td>
                <td>'.$item['empresa'].'</td>
            </tr>
            ';
        }

        $array .= '</table>';
    } else {
        $array = 'Nenhum registro encontrado!';
    }
}

header("Content-Type: application/json");
echo json_encode($array);
exit;

