<?php
require 'db.php';

// Consulta para obtener un post específico
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
  header('Location: index.php');
  exit;
}

$stmt = $pdo->prepare('SELECT * FROM posts WHERE id = ?');
$stmt->execute([$id]);
$post = $stmt->fetch();

if (!$post) {
  header('Location: index.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($post['titulo']); ?> - Mi Blog</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Mi Blog</h1>
  </header>
  
  <main>
    <article>
      <h2><?= htmlspecialchars($post['titulo']); ?></h2>
      <time><?= date('d/m/Y', strtotime($post['fecha'])); ?></time>
      <div><?= nl2br(htmlspecialchars($post['contenido'])); ?></div>
    </article>
    <a href="index.php">Volver al inicio</a>
  </main>
  
  <footer>
    <p>&copy; 2025 Mi Blog</p>
  </footer>
</body>
</html>