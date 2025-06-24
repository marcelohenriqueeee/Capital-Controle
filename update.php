<?php

if (!empty($_GET['ID'])) {

    include 'conexao.php';

    $ID = $_GET ['ID'];

    $sql_select = "SELECT * FROM tb_registros WHERE ID = $ID";

    $result = $conn -> query($sql_select);

    if ($result -> num_rows > 0) {
        
        while ($registro = mysqli_fetch_assoc($result)) {

            $decricao = $registro['DESCRICAO'];
            $valor = $registro['VALOR'];
            $data = $registro['DAT'];
            $tipo = $registro['TIPO'];
        }

    } else {
        header('Location: index.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR REGISTRO</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>

    <nav id="nav-bar">
        <div id="cabecalho">
            <a href="index.php">
                <img src="image/logo.png" width="180" alt="144">
            </a>
        </div>
    </nav>

    <div id="div-form-edit">

        <form id="form-edit-registros" action="update-save.php" method="post">

            <div class="edit-div-desc">
                <label for="desc">Descrição: </label>
                <input type="text" name="decricao" value="<?php echo $decricao ?>">
            </div>

            <div class="edit-div-valor">
                <label for="valor">Valor: </label>
                <input type="text" name="valor" value="<?php echo $valor ?>">
            </div>

            <div class="edit-div-data">
                        <label for="data">Data: </label>
                        <input type="date" class="input-data" name="data" value="<?php echo $data ?>">
                    </div>

            <div class="edit-div-tipo">
                <label for="tipo">Tipo: </label>
                <select name="tipo" value="<?php echo $tipo ?>">
                    <option>Entrada</option>
                    <option>Saida</option>
                    <option>Investimentos</option>
                    <option>Pendente</option>
                </select>
            </div>

            <div>
                <input type="hidden" name="id" value="<?php echo $ID ?>">
                <button type="submit" class="btn-update" name="btn-update" id="btn-update">Salvar</button>
            </div>

        </form>

    </div>
    
</body>
</html>