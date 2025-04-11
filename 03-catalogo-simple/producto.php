<?php
require 'db.php';

// Consulta para obtener un producto específico
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
  header('Location: index.php');
  exit;
}

$stmt = $pdo->prepare('SELECT * FROM productos WHERE id = ?');
$stmt->execute([$id]);
$producto = $stmt->fetch();

if (!$producto) {
  header('Location: index.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($producto['nombre']); ?> - Catálogo</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Catálogo de Productos</h1>
  </header>
  
  <main>
    <div class="producto-detalle">
      <h2><?= htmlspecialchars($producto['nombre']); ?></h2>
      <p><?= nl2br(htmlspecialchars($producto['descripcion'])); ?></p>
      <p class="precio">€<?= number_format($producto['precio'], 2); ?></p>
      <button>Agregar al carrito</button>
    </div>
    <a href="index.php">Volver al catálogo</a>
  </main>
  
  <footer>
    <p>&copy; 2025 Mi Catálogo</p>
  </footer>
</body>
</html>