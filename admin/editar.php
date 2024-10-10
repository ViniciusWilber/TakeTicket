<?php
    // Inclui a conexão com o banco

        $pdo = new PDO('mysql:host=localhost;dbname=TakeTicket', 'root', '');
   
    // Recebe os dados do formulário via POST
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $horario = $_POST["horario"];
    $hora = $_POST["hora"];
    $endereco = $_POST["endereco"];
    $valor = $_POST["valor"];
    $cidade = $_POST["cidade"];
    $logradouro = $_POST["logradouro"];
    $CEP = $_POST["CEP"];
    $bairro = $_POST["bairro"];
    $numero = $_POST["numero"];
    $estado = $_POST["estado"];
    $complemento = $_POST["complemento"];

    // Prepara a consulta SQL com placeholders
    $sql = "UPDATE evento SET 
        nome = :nome,
        descricao = :descricao,
        horario = :horario,
        hora = :hora,
        valor = :valor,
        cidade = :cidade,
        logradouro = :logradouro,
        CEP = :CEP,
        bairro = :bairro,
        numero = :numero,
        estado = :estado,
        complemento = :complemento
    WHERE id = :id";

    // Prepara a consulta
    $stmt = $pdo->prepare($sql);

    // Atribui os valores às variáveis na consulta
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':horario', $horario);
    $stmt->bindParam(':hora', $hora);
    $stmt->bindParam(':valor', $valor);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':logradouro', $logradouro);
    $stmt->bindParam(':CEP', $CEP);
    $stmt->bindParam(':bairro', $bairro);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':complemento', $complemento);
    $stmt->bindParam(':id', $id);

    // Executa a inserção
    if ($stmt->execute()) {
        echo "Dados alterados com sucesso!";
    } else {
        echo "Erro ao atualizar os dados.";
    }
?>