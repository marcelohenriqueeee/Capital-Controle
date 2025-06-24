<?php

include 'conexao.php';

if (isset($_POST['btn-update'])) {
    
    $ID = $_POST['id']; 
    $descricao = $_POST['decricao'];
    $valor = $_POST['valor'];
    $data = $_POST['data'];
    $tipo = $_POST['tipo'];

    $sql_update = "UPDATE tb_registros SET DESCRICAO = '$descricao', VALOR = '$valor', DAT = '$data', TIPO = '$tipo' WHERE ID = '$ID' ";

    $result = $conn -> query($sql_update);

}

header('Location: index.php');



?>