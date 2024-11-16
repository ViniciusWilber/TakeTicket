<?php
    include "conexao.php";

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
                }
            } else {

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
    $promotor_id = $_POST["promotor_id"];
    $valor = $_POST["valor"];
    $cidade = $_POST["cidade"];
    $logradouro = $_POST["logradouro"];
    $CEP = $_POST["CEP"];
    $bairro = $_POST["bairro"];
    $numero = $_POST["numero"];
    $estado = $_POST["estado"];
    $complemento = $_POST["complemento"];
    $referencia = $_POST["referencia"];

    // Depuração: Exibir os valores que serão inseridos

    // Prepara a consulta SQL
    $sql = "INSERT INTO evento (
        nome,
        descricao,
        data_inicio,
        hora_inicio,
        hora_fim,
        data_fim,
        promotor_id,
        valor,
        cidade,
        logradouro,
        CEP,
        bairro,
        numero,
        estado,
        complemento,
        imagens,
        referencia
    ) VALUES (
        :nome,
        :descricao,
        :data_inicio,
        :hora_inicio,
        :hora_fim,
        :data_fim,
        :promotor_id,
        :valor,
        :cidade,
        :logradouro,
        :CEP,
        :bairro,
        :numero,
        :estado,
        :complemento,
        :imagens,
        :referencia
    )";

    // Executa a inserção no banco de dados
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=TakeTicket', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare($sql);

        // Atribui os valores às variáveis na consulta
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':data_inicio', $data_inicio);
        $stmt->bindParam(':hora_inicio',$hora_inicio);
        $stmt->bindParam(':hora_fim',$hora_fim);
        $stmt->bindParam(':data_fim',$data_fim);
        $stmt->bindParam(':promotor_id', $promotor_id);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':logradouro', $logradouro);
        $stmt->bindParam(':CEP', $CEP);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':complemento', $complemento);
        $stmt->bindParam(':referencia', $referencia);

        // Como você tem várias imagens, converte para uma string JSON
        $imagensJson = json_encode($imagens);  // Converte o array de imagens para JSON
        $stmt->bindParam(':imagens', $imagensJson);

        // Executa a inserção
        if ($stmt->execute()) {
            echo "Dados inseridos com sucesso!";
header("Location: index.php");
exit;
        } else {
            echo "Erro ao inserir os dados. Erro SQL: " . implode(", ", $stmt->errorInfo());
        }
        
    } catch (PDOException $e) {
        // Captura erro de PDO e exibe
        echo "Erro: " . $e->getMessage();
    }
?>
