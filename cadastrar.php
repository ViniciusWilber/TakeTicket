<?php
    // Inclui a conexão com o banco
    include "conexao.php";

    // Recebe os dados do formulário via POST
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $horario = $_POST["horario"];
    $hora = $_POST["hora"];
    $endereco = $_POST["endereco"];
    $promotor_id = $_POST["promotor_id"];

    // Verifica se todos os campos foram preenchidos000
        // Prepara a consulta SQL
        $sql = "INSERT INTO evento (
            id,
            nome,
            descricao,
            horario,
            hora,
            endereco,
            promotor_id,
        ) VALUES (
            :id,
            :nome,
            :descricao,
            :horario,
            :hora,
            :endereco,
            :promotor_id
        )";

        // Executa a inserção no banco de dados
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=TakeTicket', 'root', '');
            $stmt = $pdo->prepare($sql);

            // Atribui os valores às variáveis na consulta
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':promotor_id', $promotor_id);
            $stmt->bindParam(':nome_evento', $nome_evento);
            $stmt->bindParam(':data_inicio', $data_inicio);
            $stmt->bindParam(':hora_inicio', $hora_inicio);
            $stmt->bindParam(':data_final', $data_final);
            $stmt->bindParam(':hora_final', $hora_final);

            // Executa a inserção
            if ($stmt->execute()) {
                echo "Dados inseridos com sucesso!";
            } else {
                echo "Erro ao inserir os dados.";
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
?>