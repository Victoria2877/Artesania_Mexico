<?php
require 'db.php';

// Consulta simple para obtener todos los posts
$stmt = $pdo->query('SELECT * FROM posts ORDER BY fecha DESC');
$posts = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi Blog</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Mi Blog</h1>
  </header>
  
  <main>
    <?php if (!empty($posts)): ?>
      <?php foreach ($posts as $post): ?>
        <article>
          <h2><?= htmlspecialchars($post['titulo']); ?></h2>
          <time><?= date('d/m/Y', strtotime($post['fecha'])); ?></time>
          <p><?= substr(htmlspecialchars($post['contenido']), 0, 150); ?>...</p>
          <a href="post.php?id=<?= $post['id']; ?>">Leer más</a>
        </article>
      <?php endforeach; ?>
    <?php else: ?>
      <p>No hay posts disponibles.</p>
    <?php endif; ?>
  </main>
  
  <footer>
    <p>&copy; 2025 Mi Blog</p>
  </footer>
</body>
</html>