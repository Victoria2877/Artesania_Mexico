<?php
require 'db.php';

// Consulta simple para obtener todos los productos
$stmt = $pdo->query('SELECT * FROM productos ORDER BY nombre');
$productos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catálogo de Productos</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Catálogo de Productos</h1>
  </header>
  
  <main>
    <div class="productos">
      <?php if (!empty($productos)): ?>
        <?php foreach ($productos as $producto): ?>
          <div class="producto">
            <h2><?= htmlspecialchars($producto['nombre']); ?></h2>
            <p><?= htmlspecialchars($producto['descripcion']); ?></p>
            <p class="precio">€<?= number_format($producto['precio'], 2); ?></p>
            <a href="producto.php?id=<?= $producto['id']; ?>">Ver detalles</a>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No hay productos disponibles.</p>
      <?php endif; ?>
    </div>
  </main>
  
  <footer>
    <p>&copy; 2025 Mi Catálogo</p>
  </footer>
</body>
</html>