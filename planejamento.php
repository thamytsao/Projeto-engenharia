<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tela de Planejamento</title>

    <style>
        form{
            position: absolute;
        }
        table{
            position: absolute;
            top:30%;
            left:30%;
        }
        .btn-menu{
            position: relative;
            left:40%;
        }
    </style>
    <?php
        if(isset($_POST['consultar'])){
            include_once('busca.php');
            if(empty($_POST['consulta-turma'])){
                echo'<script>alert(" Informe a turma.");</script>'; 
            }else{
                    $entrada = $_POST['consulta-turma'];  

                    echo "<table border=1>";
                    echo "<tr>";
                    echo "<th>Turma</th>";
                    echo "<th>Mês</th>";
                    echo "<th>Semana 1</th>";
                    echo "<th>Semana 2</th>";
                    echo "<th>Semana 3</th>";
                    echo "<th>Semana 4</th>";
                    echo "</tr>";

                    $result = mysqli_query($conexao,"select idTurma,dataPl,semana1,semana2,semana3,semana4
                    from turma where idTurma='$entrada'");
                    if($result == null){
                        echo'<script>alert(" Registro não encontrado");</script>';
                    }else{
                        while($registro = mysqli_fetch_array($result)){
                            $turma = $registro['idTurma'];
                            $mes = $registro['dataPl'];
                            $semana1 = $registro['semana1'];
                            $semana2 = $registro['semana2'];
                            $semana3 = $registro['semana3'];
                            $semana4 = $registro['semana4'];
                            

                            echo "<tr>";
                            echo "<td>".$turma."</td>";     
                            echo "<td>".$mes."</td>"; 
                            echo "<td>".$semana1."</td>";
                            echo "<td>".$semana2."</td>";
                            echo "<td>".$semana3."</td>";
                            echo "<td>".$semana4."</td>";
                            echo "</tr>";
                        }
                    }
                    echo "</table>";                      
        }
    }elseif(isset($_POST['altera-planejamento'])){
        include_once('busca.php');
        if(empty($_POST['informa-turma'])){
            echo'<script>alert(" Informe a turma.");</script>';   
        }else{
            if(empty($_POST['altera-s1']) && empty($_POST['altera-s2']) && empty($_POST['altera-s3']) && empty($_POST['altera-s4'])){
                echo'<script>alert("Digite o campo corretamente.");</script>';  
            }else{
                $turma= $_POST['informa-turma'];
                $result = mysqli_query($conexao,"select idTurma,dataPl,semana1,semana2,semana3,semana4
                from turma where idTurma='$turma'");
                $registro = mysqli_fetch_array($result); 
                if($registro == null){
                    echo'<script>alert("Registro não encontrado")</script>';
            }else{
                if(empty($_POST['altera-s2']) && empty($_POST['altera-s3']) && empty($_POST['altera-s4'])){
                    $entrada1= $_POST['altera-s1'];
                    $data = $_POST['informa-data'];
                    $result1= mysqli_query($conexao,"update turma set dataPl ='$data', semana1='$entrada1' where idTurma='$turma';");

                }elseif(empty($_POST['altera-s1']) && empty($_POST['altera-s3']) && empty($_POST['altera-s4'])){
                    $entrada1= $_POST['altera-s2'];
                    $data = $_POST['informa-data'];
                    $result1= mysqli_query($conexao,"update turma set dataPl ='$data', semana2='$entrada1' where idTurma='$turma';");
                }elseif(empty($_POST['altera-s1']) && empty($_POST['altera-s2']) && empty($_POST['altera-s4'])){
                    $entrada1= $_POST['altera-s3'];
                    $data = $_POST['informa-data'];
                    $result1= mysqli_query($conexao,"update turma set dataPl ='$data', semana3='$entrada1' where idTurma='$turma';");
                }elseif(empty($_POST['altera-s1']) && empty($_POST['altera-s2']) && empty($_POST['altera-s3'])){
                    $entrada1= $_POST['altera-s4'];
                    $data = $_POST['informa-data'];
                    $result1= mysqli_query($conexao,"update turma set dataPl ='$data', semana4='$entrada1' where idTurma='$turma';");
                }elseif( empty($_POST['altera-s3']) && empty($_POST['altera-s4'])){
                    $entrada1= $_POST['altera-s1'];
                    $entrada2= $_POST['altera-s2'];
                    $data = $_POST['informa-data'];
                    $result1= mysqli_query($conexao,"update turma set dataPl ='$data', semana1='$entrada1',semana2='$entrada2' where idTurma='$turma';");
                }elseif( empty($_POST['altera-s2']) && empty($_POST['altera-s4'])){
                    $entrada1= $_POST['altera-s1'];
                    $entrada2= $_POST['altera-s3'];
                    $data = $_POST['informa-data'];
                    $result1= mysqli_query($conexao,"update turma set dataPl ='$data', semana1='$entrada1',semana3='$entrada2' where idTurma='$turma';");
                }elseif( empty($_POST['altera-s2']) && empty($_POST['altera-s3'])){
                    $entrada1= $_POST['altera-s1'];
                    $entrada2= $_POST['altera-s4'];
                    $data = $_POST['informa-data'];
                    $result1= mysqli_query($conexao,"update turma set dataPl ='$data', semana1='$entrada1',semana4='$entrada2' where idTurma='$turma';");
                }elseif( empty($_POST['altera-s1']) && empty($_POST['altera-s4'])){
                    $entrada1= $_POST['altera-s3'];
                    $entrada2= $_POST['altera-s2'];
                    $data = $_POST['informa-data'];
                    $result1= mysqli_query($conexao,"update turma set dataPl ='$data', semana3='$entrada1',semana2='$entrada2' where idTurma='$turma';");
                }elseif( empty($_POST['altera-s1']) && empty($_POST['altera-s3'])){
                    $entrada1= $_POST['altera-s4'];
                    $entrada2= $_POST['altera-s2'];
                    $data = $_POST['informa-data'];
                    $result1= mysqli_query($conexao,"update turma set dataPl ='$data', semana4='$entrada1',semana2='$entrada2' where idTurma='$turma';");
                }elseif( empty($_POST['altera-s1']) && empty($_POST['altera-s2'])){
                    $entrada1= $_POST['altera-s3'];
                    $entrada2= $_POST['altera-s4'];
                    $data = $_POST['informa-data'];
                    $result1= mysqli_query($conexao,"update turma set dataPl ='$data', semana3='$entrada1',semana4='$entrada2' where idTurma='$turma';");
                }else{
                    $entrada1= $_POST['altera-s1'];
                    $entrada2= $_POST['altera-s2'];
                    $entrada3= $_POST['altera-s3'];
                    $entrada4= $_POST['altera-s4'];
                    $data = $_POST['informa-data'];
                    $result1= mysqli_query($conexao,"update turma set dataPl ='$data',semana1='$entrada1',semana2='$entrada2', semana3='$entrada3',semana4='$entrada4' where idTurma='$turma';");
                }
            }
        }
    }   
}elseif(isset($_POST['go-menu'])){
    header('location: nivel1.php');
    exit();
}
        
    ?>
</head>
<body>
        <div>
            <form action="planejamento.php" method="POST">
                <fieldset>
                    <legend>Verificar planejamento</legend>
                    <div>
                        <label for="consulta-turma">Informe a Turma:</label>
                        <input type="text" name="consulta-turma" class="entrada-user">
                    </div> 
                    <button type="submit" name="consultar" class="btn-entrada">Consultar</button>
                </fieldset>
                <fieldset>
                    <legend>Editar Planejamento</legend>
                    <div>
                        <label for="informa-turma">Informe a Turma:</label>
                        <input type="text" name="informa-turma" class="entrada-user"> 
                    </div>
                    <div>
                        <label for="informa-data">Data do Planejamento:</label>
                        <input type="date" name="informa-data" class="entrada-user"> 
                    </div>
                    <div>
                        <label for="altera-s1">Semana 1:</label>
                        <input type="text" name="altera-s1" class="entrada-user"> 
                    </div>
                    <div>
                        <label for="altera-s2">Semana 2:</label>
                        <input type="text" name="altera-s2" class="entrada-user"> 
                    </div>
                    <div>
                        <label for="altera-s3">Semana 3:</label>
                        <input type="text" name="altera-s3" class="entrada-user"> 
                    </div>
                    <div>
                        <label for="altera-s4">Semana 4:</label>
                        <input type="text" name="altera-s4" class="entrada-user"> 
                    </div>
                    <button type="submit" name="altera-planejamento"class="btn-entrada">Atualizar</button>
                </fieldset>
                <button type="submit" name="go-menu" class="btn-menu">Voltar</button>
            </form>
        </div>
        
</body>
</html>