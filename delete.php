<?php

if (!empty($_GET['ID'])) {

    include 'conexao.php';

    $ID = $_GET ['ID'];

    $sql_select = "SELECT * FROM tb_registros WHERE ID = $ID";

    $result = $conn -> query($sql_select);

    if ($result -> num_rows > 0) {
        
        $sql_delete = "DELETE FROM tb_registros WHERE ID = $ID";
        $result = $conn -> query($sql_delete);
    }
}

header('Location: index.php');

?>