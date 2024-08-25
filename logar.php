<?php
include_once "conexao.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $msg = "login incorreta.";
    $email = $_POST['email'];
    if(empty($email)){
        echo "digite um email <br>";
    }else{
        $selectEmail = $conexao->prepare("SELECT email FROM usuario WHERE email = :email");
        $selectEmail->bindParam('email', $email);
        $selectEmail->execute();
        //$verificaEmail = $selectEmail->fetch(PDO::FETCH_ASSOC);

    }
    $senha = $_POST['senha'];
    if(empty($senha)){
        echo "digite um senha <br>";
    }else{
        $selectSenha = $conexao->prepare("SELECT senha FROM usuario WHERE senha = :senha");
        $selectSenha->bindParam('senha', $senha);
        $selectSenha->execute();
        //$verificaEmail = $selectEmail->fetch(PDO::FETCH_ASSOC);






        if($selectSenha->rowCount() && $selectEmail->rowCount()){
            header('location: index.php');
        }else{
            echo $msg;
        }
    }}
