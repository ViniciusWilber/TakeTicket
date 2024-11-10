<?php
session_start();
include_once "conexao.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $erro = "";
    $nome = $_POST['nome'];
    $padraoSenha = '~^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*\(\)\_\+\[\]\{\}\|\:\"\<\>\.\,\/\?\-]).{8,}$~';
    if(empty($nome) || strlen($nome) < 3) {
        $erro .= "digite um nome <br>";
    }
    
    $email = $_POST['email'];
    if(empty($email)){
        $erro .="digite um email <br>";
    }else{
        $selectEmail = $conexao->prepare("SELECT email FROM usuario WHERE email = :email");
        $selectEmail->bindParam('email', $email);
        $selectEmail->execute();
        //$verificaEmail = $selectEmail->fetch(PDO::FETCH_ASSOC);
        if($selectEmail->rowCount()){
            $erro .= "Email já cadastrado!<br>";
        }
    }

    $senha = $_POST['senha'];

    if (!preg_match($padraoSenha, $senha)){
    $erro .= "Digite no minimo 8 caracteres <br>Com pelo menos uma letra maiuscula <br>Um caracter especial <br> E pelo menos um número";
    }else {
        $senhaCripto = password_hash($senha, PASSWORD_DEFAULT);
    }
    echo $erro;
    if($erro == ""){
        $novo = [
            'nome' => $nome,
            'email' => $email,
            'senha' => $senhaCripto
        ];
     
        $insert = $conexao->prepare("INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)");
        // $insert->bindParam(':nome', $nome);
        // $insert->bindParam(':email', $email);
        // $insert->bindParam(':cpf', $cpf);
        // $insert->bindParam(':senha', $senha);
        if($insert->execute($novo)) {
            // header('location: cadastro.php?status=ok');

            $_SESSION['senha'] = $senha;
            $_SESSION['email'] = $email;
            $_SESSION['id_usuario'] = $conexao->lastInsertId();
            echo "cadastrado com sucesso";
        } else {
            // header('location: cadastro.php?status=error');
            $erro = "<div>
            <p> erro</p>
            </div>";
        }
    }
}