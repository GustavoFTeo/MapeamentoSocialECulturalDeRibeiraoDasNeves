<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $contato = $_POST["contato"];
        $senha = $_POST["senha"];

        $arquivo = "usuarios.txt";
        $conteudo = "usuario:$usuario|contato:$contato|senha:$senha\n";

        file_put_contents($arquivo, $conteudo, FILE_APPEND);
        header("Location: index.php");
    }
    else {
        echo "Acesso inválido.";
    }
?>