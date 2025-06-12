<?php require_once 'lock.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sua Lista de Filmes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #fefefe;
    }
    .navbar {
      margin-bottom: 2rem;
    }
    .card {
      background-color: #eaf6ff;
    }
  </style>
</head>
<body class="container py-4">

  <nav class="navbar navbar-expand-lg navbar-light bg-light rounded shadow-sm px-3">
    <a class="navbar-brand fw-bold" href="#">🎞️ Lista de Filmes</a>
    <div class="ms-auto">
      <a class="btn btn-outline-primary me-2" href="index.php">Home</a>
      <a class="btn btn-outline-secondary me-2" href="restrita.php">Página Restrita</a>
      <a class="btn btn-danger" href="logout.php">Sair</a>
    </div>
  </nav>

  <h2 class="mb-4">Bem-vindo, <span class="text-primary"><?= $_SESSION['usuario']; ?></span>!</h2>

  <div class="card p-4 mb-4 shadow-sm">
    <form action="cadastrar_filme.php" method="post" class="row g-3">
      <div class="col-md-8">
        <label for="filme" class="form-label">Nome do filme:</label>
        <input type="text" name="filme" id="filme" class="form-control" placeholder="Digite o nome do filme" required>
      </div>
      <div class="col-md-4 d-flex align-items-end">
        <button type="submit" class="btn btn-success w-100">Adicionar Filme</button>
      </div>
    </form>
  </div>

  <?php
    require_once 'conexao.php';
    $conn = conectar_banco();
    $id = $_SESSION['id'];

    $sql = "SELECT id_filme, filme FROM tb_filmes WHERE usuario_id = $id";
    $resultado = mysqli_query($conn, $sql);
    $linhas = mysqli_affected_rows($conn);

    if ($linhas < 0) {
        exit("<div class='alert alert-danger'>Erro ao buscar seus filmes. Tente novamente mais tarde.</div>");
    }

    if ($linhas == 0) {
        exit("<div class='alert alert-info'>Você ainda não adicionou nenhum filme à sua lista.</div>");
    }
  ?>

  <div class="table-responsive">
    <table class="table table-hover align-middle shadow-sm">
      <thead class="table-primary">
        <tr>
          <th>🎬 Filme</th>
          <th class="text-end">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($filme_atual = mysqli_fetch_assoc($resultado)) : ?>
          <tr>
            <td><?= htmlspecialchars($filme_atual['filme']); ?></td>
            <td class="text-end">
              <a class="btn btn-sm btn-danger" href="deletar_filme.php?id_filme=<?= $filme_atual['id_filme']; ?>">Remover</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

</body>
</html>