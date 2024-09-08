<?php
include_once "conexao.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $msg = "Login incorreto.";
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senhaCripto = password_hash($senha, PASSWORD_DEFAULT);

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
                // Pega o usuário encontrado
                $usuario = $selectEmail->fetch(PDO::FETCH_ASSOC);

                // Verifica se a senha informada corresponde ao hash
                if (password_verify($senha, $senhaCripto)){
                    header('Location: index.php');
                } else {
                    echo $msg;
                }
            }
        }
    }
}
?>