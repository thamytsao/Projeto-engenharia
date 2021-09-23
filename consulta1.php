<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Tela de Consulta</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right,rgb(250, 243, 243),rgb(22, 87, 172));
        }
        table{
            position: absolute;
            top:20%;
            left:25%;
            
        }
        form{
            position: absolute;
        }
        .btn-menu{
            position: relative;
            left:40%;
        }
    </style>

    <?php
        if(isset($_POST['consultar'])){
        include_once('busca.php');

        if(empty($_POST['consulta-matricula'])){

        echo "<table border=1>";
        echo "<tr>";
        echo "<th>CPF</th>";
        echo "<th>Responsável</th>";
        echo "<th>Email</th>";
        echo "<th>Telefone</th>";
        echo "<th>Bairro</th>";
        echo "<th>Rua</th>";
        echo "<th>Número</th>";
        echo "<th>Complemento</th>";
        echo "<th>Matrícula</th>";
        echo "<th>Aluno</th>";
        echo "<th>Status</th>";
        echo "</tr>";

        $result = mysqli_query($conexao,"select cpf, responsavel , email, telefone, bairro, rua, numero, complemento, aluno.matricula, nome, status
        from responsavel 
        left join contato on responsavel.idContato = contato.idContato
        left join endereco on responsavel.idEndereco = endereco.idEndereco
        left join aluno on responsavel.matricula = aluno.matricula");

        while($registro = mysqli_fetch_array($result)){
            $cpf = $registro['cpf'];
            $nome = $registro['responsavel'];
            $email = $registro['email'];
            $telefone = $registro['telefone'];
            $bairro = $registro['bairro'];
            $rua = $registro['rua'];
            $complemento=$registro['complemento'];
            $numero = $registro['numero'];
            $matricula = $registro['matricula'];
            $aluno = $registro['nome'];
            $status = $registro['status'];

            echo "<tr>";
            echo "<td>".$cpf."</td>";
            echo "<td>".$nome."</td>";
            echo "<td>".$email."</td>";
            echo "<td>".$telefone."</td>";
            echo "<td>".$bairro."</td>";
            echo "<td>".$rua."</td>";
            echo "<td>".$numero."</td>";
            echo "<td>".$complemento."</td>";
            echo "<td>".$matricula."</td>";
            echo "<td>".$aluno."</td>";
            echo "<td>".$status."</td>";
            echo "</tr>";
        }
        echo "</table>";
        }else{
            $entrada = $_POST['consulta-matricula'];

            echo "<table border=1>";
            echo "<tr>";
            echo "<th>CPF</th>";
            echo "<th>Responsável</th>";
            echo "<th>Email</th>";
            echo "<th>Telefone</th>";
            echo "<th>Bairro</th>";
            echo "<th>Rua</th>";
            echo "<th>Número</th>";
            echo "<th>Complemento</th>";
            echo "<th>Matrícula</th>";
            echo "<th>Aluno</th>";
            echo "<th>Status</th>";
            echo "</tr>";
    
            $result = mysqli_query($conexao,"select cpf, responsavel , email, telefone, bairro, rua, numero, complemento, aluno.matricula, nome, status
            from responsavel 
            left join contato on responsavel.idContato = contato.idContato
            left join endereco on responsavel.idEndereco = endereco.idEndereco
            left join aluno on responsavel.matricula = aluno.matricula where aluno.matricula = '$entrada'");
    
            while($registro = mysqli_fetch_array($result)){
                $cpf = $registro['cpf'];
                $nome = $registro['responsavel'];
                $email = $registro['email'];
                $telefone = $registro['telefone'];
                $bairro = $registro['bairro'];
                $rua = $registro['rua'];
                $complemento=$registro['complemento'];
                $numero = $registro['numero'];
                $matricula = $registro['matricula'];
                $aluno = $registro['nome'];
                $status = $registro['status'];
    
                echo "<tr>";
                echo "<td>".$cpf."</td>";
                echo "<td>".$nome."</td>";
                echo "<td>".$email."</td>";
                echo "<td>".$telefone."</td>";
                echo "<td>".$bairro."</td>";
                echo "<td>".$rua."</td>";
                echo "<td>".$numero."</td>";
                echo "<td>".$complemento."</td>";
                echo "<td>".$matricula."</td>";
                echo "<td>".$aluno."</td>";
                echo "<td>".$status."</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }elseif(isset($_POST['deletar'])){
         include_once('busca.php');
         if(empty($_POST['deleta-cpf'])){  
            echo'<script>alert("Digite o CPF do responsável");</script>';
           
         }else{
         $entrada = $_POST['deleta-cpf'];

         $result = mysqli_query($conexao,"select * from responsavel where cpf= '$entrada'");

         $registro = mysqli_fetch_array($result);
         if($registro == null){
            echo'<script>alert("Registro não encontrado");</script>';
        }else{

         $cpf = $registro['CPF'];
         $contato = $registro['idContato'];
         $endereco = $registro['idEndereco'];

         $result = mysqli_query($conexao,"delete from responsavel where cpf='$cpf'");
         $result = mysqli_query($conexao,"delete from contato where idContato='$contato'");
         $result = mysqli_query($conexao,"delete from endereco where idEndereco='$endereco'");
        }
     }
    }elseif(isset($_POST['altera-contato'])){
        include_once('busca.php');
        if(!empty($_POST['altera-dados'])){
            if(empty($_POST['altera-email']) && empty($_POST['altera-telefone'])){
                echo'<script>alert("Digite o(s) campos corretamente");</script>';  
            }else{
                    $entrada = $_POST['altera-dados'];
                    $result1 = mysqli_query($conexao,"select idContato from responsavel where cpf='$entrada'");
                    $registro = mysqli_fetch_array($result1);
                    if($registro == null){
                        echo'<script>alert("Registro não encontrado");</script>';
                    }else{
                        $idContato = $registro['idContato'];
                        if(empty($_POST['altera-email'])){
                            $telefone= $_POST['altera-telefone'];
                            $result2 = mysqli_query($conexao,"update contato set telefone ='$telefone' where idContato='$idContato';");
                            
                        }elseif(empty($_POST['altera-telefone'])){
                            $email= $_POST['altera-email'];
                            $result2 = mysqli_query($conexao,"update contato set email ='$email' where idContato='$idContato';");
                            
                        }else{
                            $telefone= $_POST['altera-telefone'];
                            $email= $_POST['altera-email'];
                            $result2 = mysqli_query($conexao,"update contato set telefone ='$telefone', email='$email' where idContato='$idContato';");
                            
                    }
                }
            }
        }else{
            echo'<script>alert("Digite o CPF do responsável que deseja atualizar os dados");</script>';   
        }
    }elseif(isset($_POST['altera-endereco'])){
        include_once('busca.php');
        if(!empty($_POST['altera-dados'])){
            if(empty($_POST['altera-bairro']) && empty($_POST['altera-rua']) && empty($_POST['altera-numero']) && empty($_POST['altera-complemento'])){
                echo'<script>alert("Digite o(s) campos corretamente");</script>';  
            }else{
                    $entrada = $_POST['altera-dados'];
                    $result1 = mysqli_query($conexao,"select idEndereco from responsavel where cpf='$entrada'");
                    $registro = mysqli_fetch_array($result1);
                    if($registro == null){
                        echo'<script>alert("Registro não encontrado");</script>';
                    }else{
                        $idEndereco = $registro['idEndereco'];
                        if(empty($_POST['altera-rua']) && empty($_POST['altera-numero']) && empty($_POST['altera-complemento'])){
                            $bairro= $_POST['altera-bairro'];
                            $result2 = mysqli_query($conexao,"update endereco set bairro ='$bairro' where idEndereco='$idEndereco';");
                            
                        }elseif(empty($_POST['altera-bairro']) && empty($_POST['altera-numero']) && empty($_POST['altera-complemento'])){
                            $rua= $_POST['altera-rua'];
                            $result2 = mysqli_query($conexao,"update endereco set rua ='$rua' where idEndereco='$idEndereco';");
                            
                        }elseif(empty($_POST['altera-bairro']) && empty($_POST['altera-rua']) && empty($_POST['altera-complemento'])){
                            $numero= $_POST['altera-numero'];
                            $result2 = mysqli_query($conexao,"update endereco set numero ='$numero' where idEndereco='$idEndereco';");
                            
                        }elseif(empty($_POST['altera-bairro']) && empty($_POST['altera-numero']) && empty($_POST['altera-rua'])){
                            $complemento= $_POST['altera-complemento'];
                            $result2 = mysqli_query($conexao,"update endereco set complemento ='$complemento' where idEndereco='$idEndereco';");
                            
                        }elseif(empty($_POST['altera-numero']) && empty($_POST['altera-complemento'])){
                            $rua= $_POST['altera-rua'];
                            $bairro= $_POST['altera-bairro'];
                            $result2 = mysqli_query($conexao,"update endereco set rua ='$rua', bairro ='$bairro' where idEndereco='$idEndereco';");
                            
                        }elseif(empty($_POST['altera-rua']) && empty($_POST['altera-complemento'])){
                            $numero= $_POST['altera-numero'];
                            $bairro= $_POST['altera-bairro'];
                            $result2 = mysqli_query($conexao,"update endereco set numero ='$numero', bairro ='$bairro' where idEndereco='$idEndereco';");
                            
                        }elseif(empty($_POST['altera-numero']) && empty($_POST['altera-rua'])){
                            $complemento= $_POST['altera-complemento'];
                            $bairro= $_POST['altera-bairro'];
                            $result2 = mysqli_query($conexao,"update endereco set complemento ='$complemento', bairro ='$bairro' where idEndereco='$idEndereco';");
                            
                        }elseif(empty($_POST['altera-bairro']) && empty($_POST['altera-complemento'])){
                            $rua= $_POST['altera-rua'];
                            $numero= $_POST['altera-numero'];
                            $result2 = mysqli_query($conexao,"update endereco set rua ='$rua', numero ='$numero' where idEndereco='$idEndereco';");
                            
                        }elseif(empty($_POST['altera-numero']) && empty($_POST['altera-bairro'])){
                            $rua= $_POST['altera-rua'];
                            $complemento= $_POST['altera-complemento'];
                            $result2 = mysqli_query($conexao,"update endereco set rua ='$rua', complemento ='$complemento' where idEndereco='$idEndereco';");
                            
                        }elseif(empty($_POST['altera-bairro']) && empty($_POST['altera-rua'])){
                            $numero= $_POST['altera-numero'];
                            $complemento= $_POST['altera-complemento'];
                            $result2 = mysqli_query($conexao,"update endereco set numero ='$numero', complemento ='$complemento' where idEndereco='$idEndereco';");
                            
                        }else{
                            $bairro= $_POST['altera-bairro'];
                            $rua= $_POST['altera-rua'];
                            $numero= $_POST['altera-numero'];
                            $complemento= $_POST['altera-complemento'];
                            $result2 = mysqli_query($conexao,"update endereco set numero ='$numero', complemento ='$complemento', rua ='$rua', bairro ='$bairro' where idEndereco='$idEndereco';");
                            
                    }
                }
            }
        }else{
            echo'<script>alert("Digite o CPF do responsável que deseja atualizar os dados");</script>';   
        }
    }elseif(isset($_POST['go-menu'])){
        header('location: nivel1.php');
        exit();
    }
    ?>
</head>
        <div>
            <form action="consulta1.php" method="POST">
                <fieldset>
                    <legend>Consultar responsável</legend>
                    <div>
                        <label for="consulta-matricula">Informe a Matrícula:</label>
                        <input type="text" name="consulta-matricula" class="entrada-user">
                    
                    </div>  
                    <button type="submit" name="consultar" class="btn-entrada">Consultar</button>
                </fieldset>
                <fieldset>
                <legend>Deletar responável</legend>
                    <div>
                        <label for="deleta-cpf">Informe o Responsável:</label>
                        <input type="text" name="deleta-cpf" class="entrada-user">
                    </div>
                    <button type="submit" name="deletar" class="btn-entrada">Deletar</button>
                </fieldset>
                <fieldset>
                    <legend>Atualizar dados</legend>
                    <div>
                        <label for="altera-dados">Informe o CPF:</label>
                        <input type="text" name="altera-dados" class="entrada-user"> 
                    </div>
                    <br>
                    <fieldset>
                        <legend>Contato</legend>
                    <div>
                        <label for="altera-email">Informe o Email:</label>
                        <input type="text" name="altera-email" class="entrada-user"> 
                    </div>
                    <div>
                        <label for="altera-telefone">Informe o Telefone:</label>
                        <input type="text" name="altera-telefone" class="entrada-user"> 
                    </div>
                    <button type="submit" name="altera-contato"class="btn-entrada">Atualizar</button>
                    </fieldset>
                    <br>
                    <fieldset>
                        <legend>Endreço</legend>
                    <div>
                        <label for="altera-bairro">Informe o Bairro:</label>
                        <input type="text" name="altera-bairro" class="entrada-user"> 
                    </div>
                    <div>
                        <label for="altera-rua">Informe o Rua:</label>
                        <input type="text" name="altera-rua" class="entrada-user"> 
                    </div>
                    <div>
                        <label for="altera-numero">Informe o numero:</label>
                        <input type="text" name="altera-numero" class="entrada-user"> 
                    </div>
                    <div>
                        <label for="altera-complemento">Informe o Complemento:</label>
                        <input type="text" name="altera-complemento" class="entrada-user"> 
                    </div>
                    <button type="submit" name="altera-endereco"class="btn-entrada">Atualizar</button>
                    </fieldset>
                   
                </fieldset>
                <button type="submit" name="go-menu" class="btn-menu">Voltar</button>
            </form>
        </div>
<body>
   
   
</body>
</html>