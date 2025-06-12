<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro lista de filmes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f5f7fa;
    }
    .hero {
      background-color: #d0e9ff;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
    }
    .nav-link {
      color: #0d6efd;
    }
    .nav-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body class="container py-4">

  <div class="hero mb-4">
    <h1 class="display-5">🎬 Cadastro de Filmes</h1>
    <p class="lead">Bem-vindo ao seu organizador pessoal de filmes!</p>
    <p>Aqui você pode montar uma lista com seus filmes favoritos ou os que pretende assistir.</p>
  </div>

  <nav class="mb-4">
    <a class="nav-link d-inline" href="index.php">🏠 Home</a> |
    <a class="nav-link d-inline" href="restrita.php">🔐 Página Restrita</a>
  </nav>

  <?php
    require_once 'functions.php';
    validar_codigo();

    if (!empty($_SESSION)) {
        exit("<div class='alert alert-success'><strong>" . $_SESSION['usuario'] . "</strong>, acesse a área restrita para ver seus filmes!</div>");
    }
  ?>

  <div class="card p-4 shadow-sm">
    <h2 class="mb-3">Faça login para acessar sua lista:</h2>

    <form action="validar.php" method="post">
      <div class="mb-3">
        <label for="usuario" class="form-label">Usuário:</label>
        <input type="text" class="form-control" name="usuario" id="usuario" required>
      </div>
      <div class="mb-3">
        <label for="senha" class="form-label">Senha:</label>
        <input type="password" class="form-control" name="senha" id="senha" required>
      </div>
      <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
  </div>

</body>
</html>