<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST["usuario"];
    $contato = $_POST["contato"];
    $senha = $_POST["senha"];

    $arquivo = "documentos\usuarios.txt";

    // Se o arquivo existe e não está vazio, pega o último ID
    if (file_exists($arquivo) && filesize($arquivo) > 0) {
        $linhas = file($arquivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $ultimaLinha = end($linhas);

        // Extrai o ID da linha (exemplo: id:3|usuario:...)
        preg_match('/id:(\d+)/', $ultimaLinha, $match);
        $novoId = intval($match[1]) + 1;
    } else {
        // Primeiro registro
        $novoId = 1;
    }

    // Monta a linha com ID
    $conteudo = "id:$novoId|usuario:$usuario|contato:$contato|senha:$senha\n";

    // Salva no arquivo
    file_put_contents($arquivo, $conteudo, FILE_APPEND);

    header("Location: index.php");
}
else {
    echo "Acesso inválido.";
}
?>
