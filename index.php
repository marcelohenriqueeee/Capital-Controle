<?php

include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $data = $_POST['data'];
    $tipo = $_POST['tipo'];

    $sql = "INSERT INTO tb_registros (DESCRICAO, VALOR, DAT, TIPO ) VALUES ('$descricao', '$valor', '$data', '$tipo')";

    if ($conn -> query($sql)) {
        //echo 'Enviado';
    } else {
        //echo 'Erro ao enviar' . $conn -> error;
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capital Controle</title>
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
        </nav>

        <br>

        <hr>

        <div id="resumos">

            <div>
                <span class="entradas">

                    <t class="T-entradas">Entradas:</t>

                    <?php
                    
                    include 'conexao.php';

                    $sqlEntradas = "SELECT SUM(VALOR) AS TOTAL FROM tb_registros WHERE TIPO = 'Entrada' ";
                    $resultEntradas = $conn -> query($sqlEntradas);
                    $entradas = $resultEntradas -> fetch_assoc();
                    $totalEntradas = $entradas['TOTAL'] ?? 0;

                    echo 'R$ ' .number_format($totalEntradas,2, ',' , '.');
                  
                    ?>

                </span>
            </div>

            <div>
                <span class="saidas">

                    <t class="T-saidas">Saídas:</t>

                    <?php
                    
                    include 'conexao.php';

                    $sqlSaidas = "SELECT SUM(VALOR) AS TOTAL FROM tb_registros WHERE TIPO = 'Saida' ";
                    $resultSaidas = $conn -> query($sqlSaidas);
                    $saidas = $resultSaidas -> fetch_assoc();
                    $totalSaidas = $saidas['TOTAL'] ?? 0;

                    
                  

                    echo 'R$ ' .number_format(($totalSaidas),2, ',' , '.');
                    
                    ?>

                </span>
            </div>

             <div>
                <span class="investimentos">

                    <t class="T-investimentos">Investimentos:</t>

                    <?php
                    
                    include 'conexao.php';

                    $sqlinvestimentos = "SELECT SUM(VALOR) AS TOTAL FROM tb_registros WHERE TIPO = 'investimentos' ";
                    $resultinvestimentos = $conn -> query($sqlinvestimentos);
                    $investimentos = $resultinvestimentos -> fetch_assoc();
                    $totalinvestimentos = $investimentos['TOTAL'] ?? 0;

                    echo 'R$ ' .number_format($totalinvestimentos,2, ',' , '.');
                    
                    ?>

                </span>
            </div>

               <div>
                <span class="pendente">

                    <t class="T-pendente">Pendente:</t>

                    <?php
                    
                    include 'conexao.php';

                    $sqlpendente = "SELECT SUM(VALOR) AS TOTAL FROM tb_registros WHERE TIPO = 'Pendente' ";
                    $resultpendente = $conn -> query($sqlpendente);
                    $pendente = $resultpendente -> fetch_assoc();
                    $totalpendente = $pendente['TOTAL'] ?? 0;

                    echo 'R$ ' .number_format($totalpendente,2, ',' , '.');
                    
                    ?>

                </span>
            </div>

            <div>
                <span class="total">

                     <t class="T-total">Total:</t>

                    <?php
                    
                    include 'conexao.php';

                    $sqlEntradas = "SELECT SUM(VALOR) AS TOTAL FROM tb_registros WHERE TIPO = 'Entrada' ";
                    $resultEntradas = $conn -> query($sqlEntradas);
                    $entradas = $resultEntradas -> fetch_assoc();
                    $totalEntradas = $entradas['TOTAL'] ?? 0;

                    $sqlSaidas = "SELECT SUM(VALOR) AS TOTAL FROM tb_registros WHERE TIPO = 'Saida' ";
                    $resultSaidas = $conn -> query($sqlSaidas);
                    $saidas = $resultSaidas -> fetch_assoc();
                    $totalSaidas = $saidas['TOTAL'] ?? 0;

                    $sqlinvestimentos = "SELECT SUM(VALOR) AS TOTAL FROM tb_registros WHERE TIPO = 'investimentos' ";
                    $resultinvestimentos = $conn -> query($sqlinvestimentos);
                    $investimentos = $resultinvestimentos -> fetch_assoc();
                    $totalinvestimentos = $investimentos['TOTAL'] ?? 0;

                    echo 'R$ ' .number_format(($totalEntradas - $totalSaidas - $totalinvestimentos),2, ',' , '.');
                    
                    
                    ?>

                </span>

            </div>
            
        </div>

        <div class="clear"></div>

        <div id="new-registration">

            <form id="form-new-registration" action="index.php" method="post">

                <div class="div-desc">
                    <label for="desc">Descrição: </label>
                    <input type="text" class="input-desc" name="descricao">
                    
                </div>

                <div class="div-valor">
                    <label for="valor">Valor: </label>
                    <input type="text" class="inputs-valor" name="valor">
                  
                </div>

                <div class="div-data">
                    <label for="data">Data: </label>
                    <input type="date" class="input-data" name="data">
                    
                </div>

                <div class="div-tipo">
                    <label for="tipo">Tipo: </label>
                    <select name="tipo" class="input-tipo">

                        <option>Entrada</option>
                        <option>Saida</option>
                        <option>Investimentos</option>
                        <option>Pendente</option>

                    </select>
                </div>

                <div>
                    <button type="submit" class="btn-incluir" id="btn-incluir">Incluir</button>
                </div>

                <div class="clear"></div>

            </form>

        </div>

       <div class="table-mostrar-registros">

            <table class="table">

                    <thead>
                        <tr>
                            <th scope="col">Descrição</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Data</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Excluir</th>
                            <th scope="col">Editar</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                        <?php
                        
                        include 'conexao.php';

                        $sql = "SELECT * FROM tb_registros ORDER BY ID ASC";
                        $result = $conn -> query($sql);

                        if ($result -> num_rows > 0) {

                            while($registro = mysqli_fetch_assoc($result)) {

                                echo "<tr>";
                                    echo "<td>" .$registro['DESCRICAO']."</td>";
                                    echo "<td>" .'R$ '.$registro['VALOR']."</td>";

                                    $data = new DateTime($registro['DAT']);
                                    echo "<td>" . $data -> format('d/m/Y') . "</td>";


                                     if ($registro['TIPO'] === 'Entrada') {

                                        echo "<td>
                                        
                                                <a class='icon-positivo'> 
                                                
                                                     <img src='image/entrada.png' width='' height='25' alt='' />
                                                
                                                </a>
                                    
                                            </td>";
                                     }
                                     
                                     
                                     else if ($registro['TIPO'] === 'Investimentos') {

                                          echo "<td>
                                        
                                                <a class='icon-investimento'> 
                                                
                                                    <img src='image/investimento.png' width='' height='25' alt='' />
                                                
                                                </a>
                                
                                            </td>";
                                        
                                     }
                                     
                                      else if ($registro['TIPO'] === 'Pendente') {

                                          echo "<td>
                                        
                                                <a class='icon-pendente'> 
                                                
                                                    <img src='image/pendente.png' width='' height='25' alt='' />
                                                
                                                </a>
                                
                                            </td>";
                                        
                                     }
                                     
                                     else {

                                        echo "<td>
                                        
                                                <a class='icon-negativo'> 
                                                
                                                    <img src='image/saida.png' width='' height='25' alt='' />
                                                
                                                </a>
                                
                                            </td>";
                                        
                                     }

                                     echo "<td>
                                        
                                            <a class='icon-excluir' href='delete.php?ID=$registro[ID]'> 
                                            
                                                <img src='image/lixeira.png' width='' height='' alt='' />

                                            </a>
                         
                                        </td>";
                                        

                                     echo "<td>
                                    
                                            <a class='icon-editar' href='update.php?ID=$registro[ID]'> 
                                            
                                                <img src='image/editar.png' width='' height='' alt='' />
                                            
                                            </a>
                             
                                        </td>";


                                echo "</tr>";
                            } 

                        }

                        ?>
                        
                    </tbody>

            </table>

        </div>

</body>
</html>