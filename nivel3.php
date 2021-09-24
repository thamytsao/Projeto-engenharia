<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tela de  Consulta</title>

    <style>
        form{
            position: absolute;
        }
    </style>
    <?php
        if(isset($_POST['consultar'])){
        include_once('busca.php');
        if(empty($_POST['informa-matricula']) && empty($_POST['informa-cpf'])){
            echo'<script>alert(" Informe o CPF e/ou a matrícula do aluno");</script>'; 
        }else{
            if(empty($_POST['informa-matricula'])){
                $entrada = $_POST['informa-cpf'];  

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
                $entrada = $_POST['informa-matricula'];

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
                $entrada = $_POST['informa-matricula'];

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
    }
?>
</head>
<body>
        <div>
            <form action="nivel3.php" method="POST">
                <fieldset>
                    <legend>Consultar Aluno</legend>
                    <div>
                        <label for="informa-cpf">Informe o CPF:</label>
                        <input type="text" name="informa-cpf" class="entrada-user"> 
                    </div> 
                    <div>
                        <label for="informa-matricula">Informe a Matrícula:</label>
                        <input type="text" name="informa-matricula" class="entrada-user"> 
                    </div> 
                    <button type="submit" name="consultar" class="btn-entrada">Consultar</button>
                </fieldset>
            </form>
        </div>
</body>
</html>