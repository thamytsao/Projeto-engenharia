<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tela de Consulta</title>

    <style>
        form{
            position: absolute;
        }
        table{
            position: absolute;
            top:30%;
            left:30%;
        }
    </style>
    <?php
        if(isset($_POST['consultar'])){
            include_once('busca.php');
            if(empty($_POST['consulta-matricula']) && empty($_POST['consulta-turma'])){
                echo'<script>alert(" Informe a turma e/ou a matrícula do aluno");</script>'; 
            }else{
                if(empty($_POST['consulta-matricula'])){
                    $entrada = $_POST['consulta-turma'];  

                    echo "<table border=1>";
                    echo "<tr>";
                    echo "<th>Turma</th>";
                    echo "<th>Matrícula</th>";
                    echo "<th>Nome</th>";
                    echo "<th>Mês</th>";
                    echo "<th>Status</th>";
                    echo "<th>Semana 1</th>";
                    echo "<th>Semana 2</th>";
                    echo "<th>Semana 3</th>";
                    echo "<th>Semana 4</th>";
                    echo "</tr>";

                    $result = mysqli_query($conexao,"select idTurmaT, aluno, nome,dataPl, status, semana1,semana2,semana3,semana4
                    from turma_aluno
                    left join turma on turma_aluno.idTurmaT = turma.idTurma
                    left join aluno on turma_aluno.aluno = aluno.matricula where idTurmaT='$entrada'");
                    if($result == null){
                        echo'<script>alert(" Registro não encontrado");</script>';
                    }else{
                        while($registro = mysqli_fetch_array($result)){
                            $turma = $aluno = $registro['idTurmaT'];
                            $aluno = $registro['aluno'];
                            $nome = $registro['nome'];
                            $mes = $registro['dataPl'];
                            $status = $registro['status'];
                            $semana1 = $registro['semana1'];
                            $semana2 = $registro['semana2'];
                            $semana3 = $registro['semana3'];
                            $semana4 = $registro['semana4'];
                            

                            echo "<tr>";
                            echo "<td>".$turma."</td>";
                            echo "<td>".$aluno."</td>";
                            echo "<td>".$nome."</td>";
                            echo "<td>".$mes."</td>";
                            echo "<td>".$status."</td>";
                            echo "<td>".$semana1."</td>";
                            echo "<td>".$semana2."</td>";
                            echo "<td>".$semana3."</td>";
                            echo "<td>".$semana4."</td>";
                            echo "</tr>";
                        }
                    }
                    echo "</table>";
                }elseif(empty($_POST['consulta-turma'])){
                    $entrada = $_POST['consulta-matricula'];

                    echo "<table border=1>";
                    echo "<tr>";
                    echo "<th>Turma</th>";
                    echo "<th>Matrícula</th>";
                    echo "<th>Nome</th>";
                    echo "<th>Mês</th>";
                    echo "<th>Status</th>";
                    echo "<th>Semana 1</th>";
                    echo "<th>Semana 2</th>";
                    echo "<th>Semana 3</th>";
                    echo "<th>Semana 4</th>";
                    echo "</tr>";
            
                    $result = mysqli_query($conexao,"select idTurmaT, aluno, nome,dataPl, status, semana1,semana2,semana3,semana4
                    from turma_aluno
                    left join turma on turma_aluno.idTurmaT = turma.idTurma
                    left join aluno on turma_aluno.aluno = aluno.matricula where aluno='$entrada'");
            
                    if($result == null){
                        echo'<script>alert(" Registro não encontrado");</script>';
                    }else{
                        while($registro = mysqli_fetch_array($result)){
                            $turma = $aluno = $registro['idTurmaT'];
                            $aluno = $registro['aluno'];
                            $nome = $registro['nome'];
                            $mes = $registro['dataPl'];
                            $status = $registro['status'];
                            $semana1 = $registro['semana1'];
                            $semana2 = $registro['semana2'];
                            $semana3 = $registro['semana3'];
                            $semana4 = $registro['semana4'];
                            

                            echo "<tr>";
                            echo "<td>".$turma."</td>";
                            echo "<td>".$aluno."</td>";
                            echo "<td>".$nome."</td>";
                            echo "<td>".$mes."</td>";
                            echo "<td>".$status."</td>";
                            echo "<td>".$semana1."</td>";
                            echo "<td>".$semana2."</td>";
                            echo "<td>".$semana3."</td>";
                            echo "<td>".$semana4."</td>";
                            echo "</tr>";
                        }
                    }
                    echo "</table>";
                }else{
                    $entrada = $_POST['consulta-matricula'];

                    echo "<table border=1>";
                    echo "<tr>";
                    echo "<th>Turma</th>";
                    echo "<th>Matrícula</th>";
                    echo "<th>Nome</th>";
                    echo "<th>Mês</th>";
                    echo "<th>Status</th>";
                    echo "<th>Semana 1</th>";
                    echo "<th>Semana 2</th>";
                    echo "<th>Semana 3</th>";
                    echo "<th>Semana 4</th>";
                    echo "</tr>";
            
                    $result = mysqli_query($conexao,"select idTurmaT, aluno, nome,dataPl, status, semana1,semana2,semana3,semana4
                    from turma_aluno
                    left join turma on turma_aluno.idTurmaT = turma.idTurma
                    left join aluno on turma_aluno.aluno = aluno.matricula where aluno='$entrada'");
            
                    if($result == null){
                        echo'<script>alert(" Registro não encontrado");</script>';
                    }else{
                        while($registro = mysqli_fetch_array($result)){
                            $turma = $aluno = $registro['idTurmaT'];
                            $aluno = $registro['aluno'];
                            $nome = $registro['nome'];
                            $mes = $registro['dataPl'];
                            $status = $registro['status'];
                            $semana1 = $registro['semana1'];
                            $semana2 = $registro['semana2'];
                            $semana3 = $registro['semana3'];
                            $semana4 = $registro['semana4'];
                            

                            echo "<tr>";
                            echo "<td>".$turma."</td>";
                            echo "<td>".$aluno."</td>";
                            echo "<td>".$nome."</td>";
                            echo "<td>".$mes."</td>";
                            echo "<td>".$status."</td>";
                            echo "<td>".$semana1."</td>";
                            echo "<td>".$semana2."</td>";
                            echo "<td>".$semana3."</td>";
                            echo "<td>".$semana4."</td>";
                            echo "</tr>";
                        }
                    }
                    echo "</table>";
                }
        }
    }elseif(isset($_POST['altera-aluno'])){
        include_once('busca.php');

        if(empty($_POST['informa-matricula'])){
            echo'<script>alert("Digite a matrícula do aluno que deseja atualizar o status.");</script>';   
        }else{
            if(empty($_POST['altera-status'])){
                echo'<script>alert("Digite o campo corretamente.");</script>';  
            }else{
                    $entrada = $_POST['informa-matricula'];
                    $entrada2 = $_POST['altera-status'];
                    $result1 = mysqli_query($conexao,"select * from aluno where matricula='$entrada'");
                    $registro = mysqli_fetch_array($result1);
                    if($registro == null){
                        echo'<script>alert("Registro não encontrado");</script>';
                    }else{  
                        $result2 = mysqli_query($conexao,"update aluno set status ='$entrada2' where matricula='$entrada'");
                }
            }
        }   
    }
        
    ?>
</head>
<body>
        <div>
            <form action="nivel2.php" method="POST">
                <fieldset>
                    <legend>Consultar Aluno</legend>
                    <div>
                        <label for="consulta-turma">Informe a Turma:</label>
                        <input type="text" name="consulta-turma" class="entrada-user">
                    
                    </div> 
                    <div>
                        <label for="consulta-matricula">Informe a Matrícula:</label>
                        <input type="text" name="consulta-matricula" class="entrada-user"> 
                    </div> 
                    <button type="submit" name="consultar" class="btn-entrada">Consultar</button>
                </fieldset>
                <fieldset>
                    <legend>Atualizar Status do Aluno</legend>
                    <div>
                        <label for="informa-matricula">Informe a Matrícula:</label>
                        <input type="text" name="informa-matricula" class="entrada-user"> 
                    </div>
                    <div>
                        <label for="altera-status">Novo Status:</label>
                        <input type="text" name="altera-status" class="entrada-user"> 
                    </div>
                    <button type="submit" name="altera-aluno"class="btn-entrada">Atualizar</button>
                    
                </fieldset>
            </form>
        </div>
        
</body>
</html>