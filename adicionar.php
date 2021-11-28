<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Adicionar usuário</title>
</head>

<body>
    <div class="div">
        <h2>Adicionar Usuário</h2>
        <hr />
        <button onclick="fechar()" id="close"><span>&#x2715;</span>
        </button>
    </div>
    <div class="container">
        <form method="POST" class="form-label" id="b7validator">
            <label>
                Nome:<br />
                <input class="form-control" aria-label="default input example" type="text" name="name" data-rules="required|min=2">
            </label><br /><br />

            <label>
                Email:<br />
                <input class="form-control" aria-label="default input example" type="email" name="email" data-rules="required|email">
            </label><br /><br />

            <label>
                Idade:<br />
                <input class="form-control" aria-label="default input example" type="text" name="idade" data-rules="required">
            </label><br /><br />

            <label>
                Cidade:<br />
                <input class="form-control" aria-label="default input example" type="text" name="cidade" data-rules="required|min=2">
            </label><br /><br />

            <label>
                Estado:<br />
                <input class="form-control" aria-label="default input example" type="text" name="estado" data-rules="required|min=2">
            </label><br /><br />

            <label>
                Empresa:<br />
                <input class="form-control" aria-label="default input example" type="text" name="empresa" data-rules="required|min=2">
            </label><br /><br />

            <button class="btn btn-outline-success btn-sm">Adicionar</button>
            <button type="button" onclick="fechar()" class="btn btn-outline-danger btn-sm">Cancelar</button>
        </form>
    </div>


    <script src="assets/js/validate_form.js"></script>
</body>

</html>