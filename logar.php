<?php
include_once "conexao.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $status = $_POST['status'];
    if($status > 0) {

    if($email == $login_admin) {
        if("senha" == $senha){

            header('location: ./');

        } else {
            header('location: ./?erro=erro');
        }//caso a senha esteja errada
    } else{
        header ('location: ./?erro=erro');
    }//caso o usúario não esteja correto
} else{
    //Verificação USUÁRIO
    if($email == $login_user) {
        if($senha == $senha_user){
            //verificar se existe uma sessão, se não existir ele inicia uma sessão
            session_start();
            //global SESSION grava dados da pessoa logada
            $_SESSION['email'] = $login_user;
            $_SESSION['nome'] = $nome_user;
            $_SESSION['status'] = 1;
            //redirecionar a página para o local indicado, no caso root (raiz) index.php
            header('location: ./');

        } else {
            header('location: ./?erro=erro');
        }//caso a senha esteja errada
    } else{
        header ('location: ./?erro=erro');
    }//caso o usúario não esteja correto
}
}
?>