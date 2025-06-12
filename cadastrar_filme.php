<?php require_once 'lock.php';
require_once 'functions.php';

if (form_nao_enviado()) {
    header('location:restrita.php?codigo=1');
    exit;
}

if (filme_em_branco()) {
    header('location:restrita.php?codigo=2');
    exit;
}

$filme = $_POST['filme'];
$id = $_SESSION['id'];

require_once 'conexao.php';

$conn = conectar_banco();

$sql = "INSERT INTO tb_filmes (filme, usuario_id) VALUES (?, ?)";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt || !mysqli_stmt_bind_param($stmt, "si", $filme, $id) || !mysqli_stmt_execute($stmt)) {
    header('location:restrita.php?codigo=4');
    exit;
}

header('location:restrita.php');

?>