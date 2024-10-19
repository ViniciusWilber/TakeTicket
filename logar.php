<?php
include_once "conexao.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha']; 

    if (empty($email)) {
        echo "digite um email";
    } else {
        // Verifica se o email existe
        $selectEmail = $conexao->prepare("SELECT email, senha FROM usuario WHERE email = :email");
        $selectEmail->bindParam(':email', $email);
        $selectEmail->execute();

        if ($selectEmail->rowCount() == 0) {
            echo "Senha incorreta.";
        } else {
            if (empty($senha)) {
                header('Location: login.php?errosenha=Digite uma senha.');
            } else {
                // Pega o hash de senha do usuário
                $usuario = $selectEmail->fetch(PDO::FETCH_ASSOC);

                // Verifica se a senha informada corresponde ao hash no banco
                if (password_verify($senha, $usuario['senha'])) {
                    header('Location: index.php');
                    exit; // Parar o script após o redirecionamento
                } else {
                    echo $msg;
                }
            }
        }
    }
}
?>