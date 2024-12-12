<?php
$json = file_get_contents('php://input');
$data = json_decode($json, true);
$token = $data['token']; //gerado com dados do cartão
$issuer = $data['issuer_id']; //banco emitiu o cartão
$payment_method_id = $data['payment_method_id']; //tipo de pagamento Ex. 'visa'
$transaction_amount = $data['transaction_amount']; //valor total pagto
$installments = $data['installments']; //quantas parcelas
$description = $data['description']; //descriçao do pagto
$payer_email = $data['payer']['email']; //emial do pagador
$identification_type = $data['payer']['identification']['type']; //tipo de documento
$identification_number = $data['payer']['identification']['number']; //numero do documento
 
$dados = [
    'transaction_amount' => $transaction_amount,
    'token'              => $token,
    'description'        => $description,
    'installments'       => $installments,
    'issuer_id'          => $issuer,
    'payer'              => [
        'email' => $payer_email,
        'identification' => [
            'type'   => $identification_type,
            'number' => $identification_number
        ]
    ]
];
//echo json_encode($data);
//echo '<hr>';
//echo json_encode($dados);

//KEY public: TEST-0aa04b1c-87eb-47cc-b6be-82f180539c72
//KEY secret: TEST-5232080259225545-042515-bfeaf6dff3b3fd59594bb4d9ffe6525f-22727655
$KEY = "TEST-5232080259225545-042515-bfeaf6dff3b3fd59594bb4d9ffe6525f-22727655";
$id_unico = uniqid('', true);
$ch = curl_init('https://api.mercadopago.com/v1/payments');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'X-Idempotency-Key: ' . $id_unico,
    'Authorization: Bearer ' . $KEY
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
$resposta = curl_exec($ch);
$dados = json_decode($resposta, true);
curl_close($ch);
 
if($dados) {
    echo json_encode($dados);
} else {
    json_encode(['status' => 'error', 'message' => 'Erro ao processar pagto']);
}