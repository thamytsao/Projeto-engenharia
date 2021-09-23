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
    </style>

    <?php
        if(isset($_POST['consultar'])){
            include_once('busca.php');
    
            if(empty($_POST['consulta-estoque'])){
    
            echo "<table border=1>";
            echo "<tr>";
            echo "<th>Código</th>";
            echo "<th>Descrição</th>";
            echo "<th>Quantidade</th>";
            echo "</tr>";
    
            $result = mysqli_query($conexao,"select * from estoque");
    
            while($registro = mysqli_fetch_array($result)){
                $codigo = $registro['codigo'];
                $descricao = $registro['descricao'];
                $quantidade = $registro['quantidade'];
                    
                echo "<tr>";
                echo "<td>".$codigo."</td>";
                echo "<td>".$descricao."</td>";
                echo "<td>".$quantidade."</td>";
                echo "</tr>";
            }
            echo "</table>";
            }else{
                $entrada = $_POST['consulta-estoque'];
    
                echo "<table border=1>";
            echo "<tr>";
            echo "<th>Código</th>";
            echo "<th>Descrição</th>";
            echo "<th>Quantidade</th>";
            echo "</tr>";
    
            $result = mysqli_query($conexao,"select * from estoque where codigo ='$entrada'");
    
            while($registro = mysqli_fetch_array($result)){
                $codigo = $registro['codigo'];
                $descricao = $registro['descricao'];
                $quantidade = $registro['quantidade'];
                    
                echo "<tr>";
                echo "<td>".$codigo."</td>";
                echo "<td>".$descricao."</td>";
                echo "<td>".$quantidade."</td>";
                echo "</tr>";
            }
            echo "</table>";
            }
        }elseif(isset($_POST['deletar'])){
            include_once('busca.php');
            if(empty($_POST['deleta-produto'])){  
               echo'<script>alert("Digite o código do produto");</script>';
              
            }else{
            $entrada = $_POST['deleta-produto'];
   
            $result = mysqli_query($conexao,"select * from estoque where codigo= '$entrada'");
            $registro = mysqli_fetch_array($result);
            if($registro == null){
               echo'<script>alert("Registro não encontrado");</script>';
           }else{
                $codigo = $registro['codigo'];
                $result = mysqli_query($conexao,"delete from estoque where codigo='$codigo'");

           }
        }
       }elseif(isset($_POST['altera-produto'])){
        include_once('busca.php');
        if(!empty($_POST['altera-estoque'])){
            if(empty($_POST['altera-descricao']) && empty($_POST['altera-quantidade'])){
                echo'<script>alert("Digite o(s) campos corretamente");</script>';  
            }else{
                    $entrada = $_POST['altera-estoque'];
                    $result1 = mysqli_query($conexao,"select * from estoque where codigo='$entrada'");
                    $registro = mysqli_fetch_array($result1);
                    if($registro == null){
                        echo'<script>alert("Registro não encontrado");</script>';
                    }else{
                        $codigo = $registro['codigo'];
                        if(empty($_POST['altera-quantidade'])){
                            $descricao= $_POST['altera-descricao'];
                            $result2 = mysqli_query($conexao,"update estoque set descricao ='$descricao' where codigo='$codigo';");
                            
                        }elseif(empty($_POST['altera-descricao'])){
                            $quantidade= $_POST['altera-quantidade'];
                            $result2 = mysqli_query($conexao,"update estoque set quantidade ='$quantidade' where codigo='$codigo'");
                            
                        }else{
                            $descricao= $_POST['altera-descricao'];
                            $quantidade= $_POST['altera-quantidade'];
                            $result2 = mysqli_query($conexao,"update estoque set descricao ='$descricao', quantidade ='$quantidade' where codigo='$codigo';");
                            
                    }
                }
            }
        }else{
            echo'<script>alert("Digite o código do produto que deseja atualizar os dados");</script>';   
        }
    }elseif(isset($_POST['adiciona-produto'])){
        include_once('busca.php');
        if(empty($_POST['adiciona-codigo']) || empty($_POST['adiciona-descricao'] || empty($_POST['adiciona-quantidade']))){
            echo'<script>alert("Digite o(s) campos corretamente");</script>'; 
        }else{
            $entrada1 = $_POST['adiciona-codigo'];
            $entrada2 = $_POST['adiciona-descricao'];
            $entrada3 = $_POST['adiciona-quantidade'];

            $result2 = mysqli_query($conexao,"INSERT INTO estoque(codigo,descricao,quantidade)VALUES('$entrada1','$entrada2','$entrada3')");
        }
    }
    
    ?>
</head>
        <div>
            <form action="estoque.php" method="POST">
                <fieldset>
                    <legend>Consultar Estoque</legend>
                    <div>
                        <label for="consulta-estoque">Informe o Código:</label>
                        <input type="text" name="consulta-estoque" class="entrada-user">
                    
                    </div>  
                    <button type="submit" name="consultar" class="btn-entrada">Consultar</button>
                </fieldset>
                <fieldset>
                <legend>Deletar Produto</legend>
                    <div>
                        <label for="deleta-produto">Informe o Código:</label>
                        <input type="text" name="deleta-produto" class="entrada-user">
                    </div>
                    <button type="submit" name="deletar" class="btn-entrada">Deletar</button>
                </fieldset>
                <fieldset>
                    <legend>Atualizar Estoque</legend>
                    <div>
                        <label for="altera-estoque">Informe o cógido:</label>
                        <input type="text" name="altera-estoque" class="entrada-user"> 
                    </div>
                    <div>
                        <label for="altera-descricao">Descrição:</label>
                        <input type="text" name="altera-descricao" class="entrada-user"> 
                    </div>
                    <div>
                        <label for="altera-quantidade">Quantidade:</label>
                        <input type="text" name="altera-quantidade" class="entrada-user"> 
                    </div>
                    <button type="submit" name="altera-produto"class="btn-entrada">Atualizar</button>
                    <br></br>
                    <fieldset>
                        <legend>Novo Produto</legend>
                    <div>
                        <label for="adiciona-codigo">Informe o código:</label>
                        <input type="text" name="adiciona-codigo" class="entrada-user"> 
                    </div>
                    <div>
                        <label for="adiciona-descricao">Informe a descrição:</label>
                        <input type="text" name="adiciona-descricao" class="entrada-user"> 
                    </div>
                    <div>
                        <label for="adiciona-quantidade">Informe a quantidade:</label>
                        <input type="text" name="adiciona-quantidade" class="entrada-user"> 
                    </div>
                    <button type="submit" name="adiciona-produto"class="btn-entrada">Adicionar</button>
                    </fieldset>
                </fieldset>
            </form>
        </div>
<body>
   
   
</body>
</html>