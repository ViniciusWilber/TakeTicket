<?php
include_once "conexao.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $erro = "";
    
    $email = $_POST['email'];
    if(empty($email)){
        $erro .="digite um email <br>";
    }
    $senha = $_POST['senha'];
    $hashArmazenado = ;
    if(empty($senha) OR strlen($senha) < 8 ){
        $erro .="digite uma senha com pelo menos 8 caracteres<br>";
    } else {
        $senhaCripto = password_hash($senha, PASSWORD_DEFAULT);
    }
    echo $erro;
    if($erro == ""){
        $novo = [
            'email' => $email,
            'senha' => $senha
        ];
     
        $insert = $conexao->prepare("INSERT INTO usuario (email, senha) VALUES (:email, :senha)");
        // $insert->bindParam(':nome', $nome);
        // $insert->bindParam(':email', $email);
        // $insert->bindParam(':cpf', $cpf);
        // $insert->bindParam(':senha', $senha);
        if($insert->execute($novo)) {
            header('location: cadastro.php?status=ok');
           echo "cadastrado com sucesso";
        } else {
            header('location: cadastro.php?status=error');
            echo "Falha ao cadastrar";
        }
    }
}