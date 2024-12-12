<?php
include "../conexao.php";

// Verifica se as imagens foram enviadas corretamente
if (isset($_FILES["imagens"]) && count($_FILES["imagens"]["name"]) > 0) {
    $diretorioDestino = "./img/";

    // Verifica se a pasta existe, caso contrário, cria
    if (!is_dir($diretorioDestino)) {
        mkdir($diretorioDestino, 0777, true);  // Permissões de escrita
    }

    $imagens = [];  // Array para armazenar os caminhos das imagens

    // Loop para processar as imagens
    foreach ($_FILES["imagens"]["name"] as $index => $nomeImagem) {
        // Caminho completo onde a imagem será salva
        $caminhoImagem = $diretorioDestino . $nomeImagem;

        // Verifica se o arquivo foi enviado corretamente
        if ($_FILES["imagens"]["error"][$index] == 0) {
            // Tenta mover o arquivo para o diretório de destino
            if (move_uploaded_file($_FILES["imagens"]["tmp_name"][$index], $caminhoImagem)) {
                // Adiciona o caminho da imagem no array
                $imagens[] = $caminhoImagem;
            } else {
                echo "Erro ao mover o arquivo: " . $nomeImagem . "<br>";
            }
        } else {
            echo "Erro ao enviar o arquivo: " . $nomeImagem . "<br>";
        }
    }
} else {
    $imagens = [];  // Se nenhuma imagem foi enviada ou houve erro
}

// Recebe os dados do formulário via POST
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$data_inicio = $_POST["data_inicio"];
$hora_inicio = $_POST["hora_inicio"];
$hora_fim = $_POST["hora_fim"];
$data_fim = $_POST["data_fim"];
$promotor_id = $_POST["id_promotor"];  // Recebe o ID do promotor do formulário
$valor = $_POST["valor"];
$cidade = $_POST["cidade"];
$logradouro = $_POST["logradouro"];
$CEP = $_POST["CEP"];
$bairro = $_POST["bairro"];
$numero = $_POST["numero"];
$estado = $_POST["estado"];
$complemento = $_POST["complemento"];
$referencia = $_POST["referencia"];
$nome_categoria = $_POST["nome_categoria"];

// Verifica se o ID do evento foi passado
if (!isset($_POST['id']) || empty($_POST['id'])) {
    echo "Erro: ID do evento não fornecido.";
    exit;
}

$id_evento = $_POST['id'];
var_dump($id_evento);  // Verifica o ID do evento recebido

// Prepara a consulta SQL
$sql = "UPDATE evento SET
        nome = :nome,
        descricao = :descricao,
        data_inicio = :data_inicio,
        hora_inicio = :hora_inicio,
        hora_fim = :hora_fim,
        data_fim = :data_fim,
        id_promotor = :id_promotor,
        valor = :valor,
        cidade = :cidade,
        logradouro = :logradouro,
        CEP = :CEP,
        bairro = :bairro,
        numero = :numero,
        estado = :estado,
        complemento = :complemento,
        imagens = :imagens,
        referencia = :referencia,
        nome_categoria = :nome_categoria
    WHERE id = :id";

// Executa a atualização no banco de dados
try {
    $pdo = new PDO('mysql:host=localhost;dbname=TakeTicket', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare($sql);

    // Atribui os valores às variáveis na consulta
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':data_inicio', $data_inicio);
    $stmt->bindParam(':hora_inicio', $hora_inicio);
    $stmt->bindParam(':hora_fim', $hora_fim);
    $stmt->bindParam(':data_fim', $data_fim);
    $stmt->bindParam(':id_promotor', $promotor_id);
    $stmt->bindParam(':valor', $valor);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':logradouro', $logradouro);
    $stmt->bindParam(':CEP', $CEP);
    $stmt->bindParam(':bairro', $bairro);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':complemento', $complemento);
    $stmt->bindParam(':referencia', $referencia);
    $stmt->bindParam(':nome_categoria', $nome_categoria);

    // Como você tem várias imagens, converte para uma string JSON
    $imagensJson = json_encode($imagens);  // Converte o array de imagens para JSON
    var_dump($imagensJson);  // Verifica o JSON gerado
    $stmt->bindParam(':imagens', $imagensJson);

    // Adiciona o ID do evento na consulta
    $stmt->bindParam(':id', $id_evento, PDO::PARAM_INT);

    // Debug: Exibe os parâmetros da consulta para verificação
    echo "SQL: " . $sql . "<br>";
    echo "Imagens JSON: " . $imagensJson . "<br>";

    // Executa a atualização
    if ($stmt->execute()) {
        header("Location: ../index.php");  // Redirecionar após sucesso
        exit;
    } else {
        // Captura o erro detalhado da execução da query
        $errorInfo = $stmt->errorInfo();
        echo "Erro ao atualizar os dados. Erro SQL: " . $errorInfo[2];
    }

} catch (PDOException $e) {
    // Captura erro de PDO e exibe
    echo "Erro: " . $e->getMessage();
}
?>
