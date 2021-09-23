<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css">
    <title>Tela de Cadastro</title>
    <?php
        if(isset($_POST['cadastrar'])){
           // print_r($_POST['nome']);
           // print_r('<br>');
           // print_r($_POST['cpf']);
           // print_r('<br>');
           // print_r($_POST['email']);
           // print_r('<br>');
           // print_r($_POST['telefone']);
           // print_r('<br>');
           // print_r($_POST['bairro']);
           // print_r('<br>');
           // print_r($_POST['rua']);
           // print_r('<br>');
           // print_r($_POST['numero']);
           // print_r('<br>');
           // print_r($_POST['complemento']);

        include_once('busca.php');

        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $matricula = $_POST['matricula'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $bairro = $_POST['bairro'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];
        $complemento = $_POST['complemento'];

        $result1 = mysqli_query($conexao,"INSERT INTO contato(email,telefone)VALUES('$email','$telefone')");
        $result2 = mysqli_query($conexao,"INSERT INTO endereco(bairro,rua,numero,complemento)VALUES('$bairro','$rua','$numero','$complemento')");
        
        $idContato = mysqli_query($conexao,"select idContato from contato where email = '$email' and telefone = '$telefone'");
        $idEndereco =  mysqli_query($conexao,"select idEndereco from endereco e where bairro='$bairro' and rua ='$rua' and numero = '$numero'");
        
        
        $registroCont =  mysqli_fetch_array($idContato);
        $registroEnder = mysqli_fetch_array($idEndereco);

        $contato = $registroCont['idContato'];
        $endereco = $registroEnder['idEndereco'];

        print_r($contato);
        print_r($endereco);
        

        $result3 = mysqli_query($conexao,"INSERT INTO responsavel(CPF,responsavel,idContato,idEndereco,matricula)VALUES('$cpf','$nome','$contato','$endereco','$matricula')");

        }elseif(isset($_POST['go-menu'])){
            header('location: nivel1.php');
            exit();
        }
        
    ?>
    <style>
   #menu-opcoes{
    font-family: Arial, Helvetica, sans-serif;
    color: white;
    position: absolute;
    top:95.3%;
    left: 45%;
    text-decoration: none;
    }
    #menu-opcoes:hover{
    color: rgb(5, 45, 155);
    text-decoration:underline;
    }
    .btn-menu{
            
            left:40%;
            background-image: linear-gradient(45deg,rgb(228, 241, 241),rgb(22, 87, 172));
            width: 100%;
            border:none;
            padding: 15px;
            color:white;
            font-size: 15px;
            border-radius: 10px;
            cursor:pointer;
            top:94%;
        }
    </style>
</head>
<body>
   <div class="box">
        <form action="cadastro.php" method="POST">
            <fieldset>
                <legend class="form-titulo"><b>Fomulário de Responsável</b></legend>
                <br></br>
                <div class="entrada-box">
                    <input type="text" name="nome" id="nome" class="entrada-user" required>
                    <label for="nome" class="label-entrada">Nome completo</label>
                </div>
                <br></br>
                <div class="entrada-box">
                    <input type="text" name="cpf" id="cpf" class="entrada-user" required>
                    <label for="cpf" class="label-entrada">CPF</label>
                </div>
                <br></br>
                <div class="entrada-box">
                    <input type="text" name="matricula" id="matricula" class="entrada-user" required>
                    <label for="matricula" class="label-entrada">Matricula</label>
                </div>
                <br></br>
                <fieldset>
                <legend><b>Contato</b></legend>
                <br></br>
                <div class="entrada-box">
                    <input type="text" name="email" id="email" class="entrada-user" required>
                    <label for="email" class="label-entrada">Email</label>
                </div>
                <br></br>
                <div class="entrada-box">
                    <input type="tel" name="telefone" id="telefone" class="entrada-user" required>
                    <label for="telefone" class="label-entrada">Telefone</label>
                </div>
                </fieldset>
                <br></br>
                <fieldset>
                <legend><b>Endereço</b></legend>
                <br></br>
                <div class="entrada-box">
                    <input type="text" name="bairro" id="bairro" class="entrada-user" required>
                    <label for="bairro" class="label-entrada">Bairro</label>
                </div>
                <br></br>
                <div class="entrada-box">
                    <input type="text" name="rua" id="rua" class="entrada-user" required>
                    <label for="rua" class="label-entrada">Rua</label>
                </div>
                <br></br>
                <div class="entrada-box">
                    <input type="text" name="numero" id="numero" class="entrada-user" required>
                    <label for="numero" class="label-entrada">Número</label>
                </div>
                <br></br>
                <div class="entrada-box">
                    <input type="text" name="complemento" id="complemento" class="entrada-user" required>
                    <label for="complemento" class="label-entrada">Complemento</label>
                </div>
                </fieldset>
                <br></br>
                <input type="submit" name="cadastrar" class="cadastrar">
                <br></br>
                <a href="nivel1.php" id="menu-opcoes">Voltar</a> 
            </fieldset>
        </form>
        
   </div>
</body>
</html>
