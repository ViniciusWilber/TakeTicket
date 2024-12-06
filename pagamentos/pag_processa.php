<?php
$json = file_get_contents('php://input');
$data = json_decode($json, true);
$token = $data['token'];
$issuer = $data['issuer_id']; //banco emitiu o cartão
$payment_method_id = $data['paymnt_method_id'];
$transacrion_amounr = $data['transation_amount'];
$instalments = $data['installments'];
$description = $data['description'];
$payer_email = $data['payer']['email'];
$identification_type = $data['identification']['type'];
$identification_number = $data['identification'];

$dados = [
    '$transacrion_amount' => $transacrion_amounr,
    'token' => $token,
    'installents' => $description,
    'issuer_id' => $issuer,
    'payer' => [
        'email' => $payer_email,
        'indentification' => [
            'type' => $identification_type,
            'number' => $identification_number
        ]
    ]
];

$KEY = "TEST-1498989923657863-070317-4fcc5d26a2d176d7bfe5e186736aba9d-22727655";
$id_unico = uniqid('', true);
    $ch = curl_init('https://api.mercadopago.com/v1/payments');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'X-Idempotency-Key: '.$id_unico,
        'Authorization: Bearer '.$KEY
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
