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
    $cidade = $_POST["cidade"];
    $logradouro = $_POST["logradouro"];
    $CEP = $_POST["CEP"];
    $bairro = $_POST["bairro"];
    $numero = $_POST["numero"];
    $estado = $_POST["estado"];
    $complemento = $_POST["complemento"];
    // Prepara a consulta SQL
    $sql = "INSERT INTO evento (
 
        nome,
        descricao,
        horario,
        hora,
        promotor_id,
        valor,
        cidade,
        logradouro,
        CEP,
        bairro,
        numero,
        estado,
        complemento
    ) VALUES (
        :nome,
        :descricao,
        :horario,
        :hora,
        :promotor_id,
        :valor,
        :cidade,
        :logradouro,
        :CEP,
        :bairro,
        :numero,
        :estado,
        :complemento
    )";

    // Executa a inserção no banco de dados
 
        $pdo = new PDO('mysql:host=localhost;dbname=TakeTicket', 'root', '');
        $stmt = $pdo->prepare($sql);

        // Atribui os valores às variáveis na consulta
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':horario', $horario);
        $stmt->bindParam(':hora', $hora);
        $stmt->bindParam(':promotor_id', $promotor_id);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':logradouro', $logradouro);
        $stmt->bindParam(':CEP', $CEP);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':estado', $estado);  // Corrigido para $estado
        $stmt->bindParam(':complemento', $complemento);  // Corrigido para $complemento

        // Executa a inserção
        if ($stmt->execute()) {
            echo "Dados inseridos com sucesso!";
        } else {
            echo "Erro ao inserir os dados.";
        }
?>