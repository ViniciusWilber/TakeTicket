<?php
session_start();
include_once "conexao.php";

$id_usuario = $_SESSION['id_usuario'];
$id_evento = $_GET["id"];

$msg = '';

$select = $conexao->prepare('SELECT * FROM favoritos WHERE evento_id = :evento && usuario_id = :usuario');
$select->bindParam("usuario", $id_usuario);
$select->bindParam("evento", $id_evento);
$select->execute();

if ($ver = $select->fetch(PDO::FETCH_ASSOC)) {
    $st = 0;
    if($ver['status'] == 1) {
        $st = 0;
        $msg = "Favoritado";
    } else {
        $st = 1;
        $msg = "Desfavoritado";
    }
    $sql = "UPDATE favoritos SET status = :st WHERE usuario_id = :usuario";
    $insert = $conexao->prepare($sql);
    $insert->bindParam("usuario", $id_usuario);
    $insert->bindParam("st", $st);
} else {
    $sql = "INSERT INTO favoritos (usuario_id, evento_id) VALUE (:usuario, :evento)";
    $insert = $conexao->prepare($sql);
    $insert->bindParam("usuario", $id_usuario);
    $insert->bindParam("evento", $id_evento);
    $msg= "Favoritado";
}
if ($insert->execute()) {
    echo $msg;
} else {
    echo "nao  favoritou";
}
