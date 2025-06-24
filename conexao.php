<?php

$locahost = 'localhost';
$username = 'root';
$password = 'sua_senha';
$dbname = 'open_finance';

$conn = new mysqli($locahost, $username, $password, $dbname);

/*if ($conn -> connect_error) {
    echo 'Erro' . $conn -> error;
} else {
    echo 'Certo';
}*/

?>