<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $arquivo = 'documentos\usuarios.txt';
    $linhas = file($arquivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    $usuario = $_POST["usuario"] ?? null;
    $senha = $_POST["senha"] ?? null;

    $usuario_encontrado = null;

    foreach ($linhas as $linha) {
        $partes = explode('|', $linha);
        $dados = [];
        
        foreach ($partes as $p) {
            list($chave, $valor) = explode(':', $p);
            $dados[$chave] = $valor;
        }
        
        if ($dados['usuario'] === $usuario && $dados['senha'] === $senha) {
            $usuario_encontrado = $dados;
            break;
        }
    }

    if ($usuario_encontrado) {
        $_SESSION['usuario'] = $usuario_encontrado;
        header('Location: index.php');
        exit;
        
    } else {
        echo "<script>
                alert('Usuário ou senha incorretos!');
              </script>";
        header('Location: index.php');
        exit;
    }
}
?>
