<?php
session_start();
include_once "conexao.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $msg = "Login incorreto.";
    $email = $_POST['email'] ?? ''; // Usando null coalescing operator para evitar undefined index
    $senha = $_POST['senha'] ?? '';

    // Verifica se o email foi informado
    if (empty($email)) {
        echo "Digite um email <br>";
    } else {
        // Verifica se o email existe
        $selectEmail = $conexao->prepare("SELECT * FROM usuario WHERE email = :email");
        $selectEmail->bindParam(':email', $email);
        $selectEmail->bindParam(':id', $id);
        $selectEmail->bindParam(':nome', $nome);
        $selectEmail->execute();

        if ($selectEmail->rowCount() == 0) {
            echo "Email não encontrado <br>";
        } else {
            // Verifica se a senha foi informada
            if (empty($senha)) {
                echo "Digite uma senha <br>";
            } else {
                // Pega o hash de senha do usuário
                $usuario = $selectEmail->fetch(PDO::FETCH_ASSOC);

                // Verifica se a senha informada corresponde ao hash no banco
                if (password_verify($senha, $usuario['senha'])) {

                    $_SESSION["email"] = $email;
                    $_SESSION["nome"] = $usuario["nome"]; // Corrigido aqui
                    echo "Login correto.";
                } else {
                    echo "Login incorreto.";
                }
            }
        }
    }
}
?>
