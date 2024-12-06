<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
            $id = $_GET['id'] ?? 0;
            if ($id == 0)  {
                header('location: ./');
            }
            // $id_unico = uniqid('', true);
           $ch = curl_init('https://api.mercadopago.com/v1/payments'.$id);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //    curl_setopt($ch, CURLOPT_POST, true);
           curl_setopt($ch, CURLOPT_HTTPHEADER, [
           'Content-Type: application/json',
        //    'X-Idempotency-Key: ' . $id_unico,
         'Authorization: Bearer ' . $KEY
]);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $resposta = curl_exec($ch);
        $dados = json_decode($resposta, true);
        curl_close($ch);
 
         if($dados) {
          echo '<h3>Detalhes do pedido</h3>';
          echo '<p> ID: '.$dados['id'].'</p>';
          echo '<p> Status: '.$dados['status'].'</p>';
          echo '<p> Descrição: '.$dados['description'].'</p>';
          echo '<p> Valor pago: '.$dados['transaction_amount'].'</p>';
}        else {
          json_encode(['status' => 'error', 'message' => 'Error ao processar pagto']);
}
            ?>
</body>
</html>