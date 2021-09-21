<?php
session_start();
//Verifica se a sessão do usuario eixste 
 if(!$_SESSION['usuario']){
        header('Location: Tela-de-login.php');
        exit();
}
?>