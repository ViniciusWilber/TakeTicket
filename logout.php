<?php
session_start();    // Inicia a sessão
session_unset();    // Limpa todas as variáveis da sessão
session_destroy();  // Destroi a sessão
header('Location: index.php');  // Redireciona para a página inicial
?>
