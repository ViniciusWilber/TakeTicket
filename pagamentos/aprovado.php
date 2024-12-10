<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Pagamento</h1>
            <h2>Dados da sua compra</h2>
            <?php
            $id = $_GET['id'] ?? 0;
            if($id == 0) {
                header('location: ./');
            }
            $KEY = "TEST-5232080259225545-042515-bfeaf6dff3b3fd59594bb4d9ffe6525f-22727655";
            //$id_unico = uniqid('', true);
            $ch = curl_init('https://api.mercadopago.com/v1/payments/'.$id);//payment_id
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                //'X-Idempotency-Key: ' . $id_unico,
                'Authorization: Bearer ' . $KEY
            ]);
            //curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            $resposta = curl_exec($ch);
            $dados = json_decode($resposta, true);
            curl_close($ch);
 
            if($dados) {
                echo '<h3>Detalhes do pedido</h3>';
                echo '<p>ID: '.$dados['id'].'</p>';
                echo '<p>Status: '.$dados['status'].'</p>';
                echo '<p>descrição: '.$dados['description'].'</p>';
                echo '<p>Valor pago: '.$dados['transaction_amount'].'</p>';
            } else {
                echo "Seu pedido não foi encontrado!";
            }
            ?>
</body>
</html>