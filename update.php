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
    <title>Editar Registro</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
     <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="image/favicon.ico">
    
</head>
<body>

    <nav id="nav-bar">
        <div id="cabecalho">
            <a href="index.php">
                <img src="image/logo.png" width="180" alt="144">
            </a>
        </div>
    </nav> <br>

    <hr> 

    <div id="div-form-edit">

        <form id="form-edit-registros" action="update-save.php" method="post">

            <div class="edit-div-desc">
                <label class="T-edit" for="desc">Descrição </label> <br>
                <input type="text" name="decricao" class="input" value="<?php echo $decricao ?>">
            </div>

            <div class="edit-div-valor">
                <label class="T-edit" for="valor">Valor</label> <br>
                <input type="text" name="valor" class="input" value="<?php echo $valor ?>">
            </div>

            <div class="edit-div-data">
                        <label class="T-edit" for="data">Data</label> <br>
                        <input type="date" class="input" name="data" value="<?php echo $data ?>">
                    </div>

            <div class="edit-div-tipo">
                <label  class="T-edit"for="tipo">Tipo</label> <br>
                <select class="input"  name="tipo"  value="<?php echo $tipo ?>">
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