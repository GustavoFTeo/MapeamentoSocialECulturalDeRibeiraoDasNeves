<?php
session_start();

$usuario_id = $_SESSION['usuario']['id'] ?? null;
$projeto_id = $_GET['projeto_id'] ?? null;

if (!$usuario_id || !$projeto_id) {
    header("Location: projetos.php");
    exit;
}

$arquivo = "documentos/curtidas.txt";

// Criar arquivo se não existir
if (!file_exists($arquivo)) {
    file_put_contents($arquivo, "");
}

$linhas = file($arquivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$novas_linhas = [];
$ja_curtido = false;

foreach ($linhas as $linha) {
    list($u_raw, $p_raw) = explode("|", $linha);

    $u_id = str_replace("usuario_id:", "", $u_raw);
    $p_id = str_replace("projeto_id:", "", $p_raw);

    if ($u_id == $usuario_id && $p_id == $projeto_id) {
        // remover curtida
        $ja_curtido = true;
        continue;
    }

    $novas_linhas[] = $linha;
}

// adicionar curtida caso ainda não exista
if (!$ja_curtido) {
    $novas_linhas[] = "usuario_id:$usuario_id|projeto_id:$projeto_id";
}

file_put_contents($arquivo, implode("\n", $novas_linhas));

header("Location: projetos.php");
exit;
?>
