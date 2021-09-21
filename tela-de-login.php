
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link defer rel="stylesheet" href="script.js">
    <title>Tela de Login</title>

</head>
<body>
   <main class="tela-login">
       <div class="login-container">
            <h1 class="login-title">Login</h1>
            <form action="login.php" method="POST" class="login-form">
                <input type='text'name="usuario" placeholder="Usuário" class="entrada">
                <span class="login-input-border"></span>
                <br></br>
                <input type="password" name="senha" placeholder="Senha" class="entrada">
                <span class="login-input-border"></span>
                <br></br>
                <button type="submit" class="botao-login">Enviar</button>
                <br></br>
                <a class="login-reset" href="#">Esqueci a senha</a>
            </form>
        </div>
   </main> 
</body>
</html>