<?PHP
    $host = "localhost";
    $banco = "taketicket";
    $user = "root";
    $senha = "";
    $conexao = new PDO("mysql:host=$host;dbname=$banco", $user, $senha);
    if(!$conexao){
        echo "Deu bom";
    }
