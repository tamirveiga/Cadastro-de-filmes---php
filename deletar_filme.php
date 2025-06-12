<?php require_once 'lock.php';

if (!isset($_GET['id_filme'])) {
    header('location:restrita.php?codigo=1');
    exit;
}

$id_filme = (int)$_GET['id_filme'];
$id_usuario = $_SESSION['id'];

require_once 'conexao.php';

$conn = conectar_banco();

$sql = "DELETE FROM tb_filmes WHERE id_filme = $id_filme AND usuario_id = $id_usuario";

mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn) <= 0) {
    header('location:restrita.php?codigo=5');
    exit;
}

header('location:restrita.php');

?>