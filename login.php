<?php
session_start();
    include('busca.php');
//Ira verificar se as entradas são validas, ou seja, se não são nulas
    if( empty($_POST['usuario']) || empty($_POST['senha'])){
        header('location: tela-de-login.php');
        exit();
    }
//Ira buscar os valores que então como entrada la no form
    $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

//Query de busca no banco 
    $query = "select usuario from usuario where usuario = '$usuario' and senha = md5('$senha')";
    $tipo = "select tipo from usuario where usuario = '$usuario'";

// Realiza consulta e o numero de linhas é jogado na row
    $result = mysqli_query($conexao,$query);
    $row = mysqli_num_rows($result); 
// Realiza a busca do tipo da consulta 
    $result2 = mysqli_query($conexao,$tipo);
    $registro = mysqli_fetch_array($result2);
    $id = $registro['tipo'];

   // print_r($result2);
   // print_r($registro);
   // print_r($id);
   // exit;
  
    if($row==1 && $id==1){
        $_SESSION['usuario']= $usuario;
        header('Location: nivel1.php');
        exit();
    }elseif($row==1 && $id==2){
        $_SESSION['usuario']= $usuario;
        header('Location: nivel2.php');
        exit();
    }elseif($row==1 && $id==3){
        $_SESSION['usuario']= $usuario;
        header('Location: nivel3.php');
        exit();
    }
    else{
        header('Location: tela-de-login.php');
        exit();
    }
?>