<?php
    // Inclui a conexão com o banco
    include "conexao.php";

    // Recebe os dados do formulário via POST
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $horario = $_POST["horario"];
    $hora = $_POST["hora"];
    $endereco = $_POST["endereco"];
    $promotor_id = $_POST["promotor_id"];
    $valor = $_POST["valor"];
    // Prepara a consulta SQL
    $sql = "INSERT INTO evento (
 
        nome,
        descricao,
        horario,
        hora,
        endereco,
        promotor_id,
        valor
    ) VALUES (
        :nome,
        :descricao,
        :horario,
        :hora,
        :endereco,
        :promotor_id,
        :valor
    )";

    // Executa a inserção no banco de dados
 
        $pdo = new PDO('mysql:host=localhost;dbname=TakeTicket', 'root', '');
        $stmt = $pdo->prepare($sql);

        // Atribui os valores às variáveis na consulta
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':horario', $horario);
        $stmt->bindParam(':hora', $hora);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':promotor_id', $promotor_id);
        $stmt->bindParam(':valor', $valor);

        // Executa a inserção
        if ($stmt->execute()) {
            echo "Dados inseridos com sucesso!";
        } else {
            echo "Erro ao inserir os dados.";
        }
?>