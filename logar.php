<?php
include_once "conexao.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $msg = "Login incorreto.";
    $email = $_POST['email'];
    $senha = $_POST['senha']; 

    if (empty($email)) {
        echo "Digite um email <br>";
    } else {
        // Verifica se o email existe
        $selectEmail = $conexao->prepare("SELECT email, senha FROM usuario WHERE email = :email");
        $selectEmail->bindParam(':email', $email);
        $selectEmail->execute();

        if ($selectEmail->rowCount() == 0) {
            echo "Email não encontrado <br>";
        } else {
            if (empty($senha)) {
                echo "Digite uma senha <br>";
            } else {
                // Pega o hash de senha do usuário
                $usuario = $selectEmail->fetch(PDO::FETCH_ASSOC);

                // Verifica se a senha informada corresponde ao hash no banco
                if (password_verify($senha, $usuario['senha'])) {
                    header('index.php');
                    exit; // Parar o script após o redirecionamento
                } else {
                    echo $msg;
                }
            }
        }
    }
}
?>