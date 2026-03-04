<?php
$dataFile = __DIR__ . '/data/products.json';
$uploadsDir = __DIR__ . '/uploads';

if (!file_exists($uploadsDir)) {
    mkdir($uploadsDir, 0755, true);
}
if (!file_exists($dataFile)) {
    file_put_contents($dataFile, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

$products = json_decode(file_get_contents($dataFile), true);
if (!is_array($products)) {
    $products = [];
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $category = trim($_POST['category'] ?? 'General');
    $description = trim($_POST['description'] ?? '');
    $price = (float) ($_POST['price'] ?? 0);
    $stock = (int) ($_POST['stock'] ?? 0);
    $imagePath = trim($_POST['existing_image'] ?? '');

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $tmp = $_FILES['image']['tmp_name'];
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($ext, $allowed, true)) {
            $filename = uniqid('prod_', true) . '.' . $ext;
            $destination = $uploadsDir . '/' . $filename;
            if (move_uploaded_file($tmp, $destination)) {
                $imagePath = 'uploads/' . $filename;
            }
        }
    }

    if ($name !== '') {
        $id = uniqid('tm_', true);
        $products[] = [
            'id' => $id,
            'name' => $name,
            'category' => $category !== '' ? $category : 'General',
            'description' => $description,
            'price' => $price,
            'stock' => max(0, $stock),
            'image' => $imagePath,
        ];

        file_put_contents($dataFile, json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        $message = 'Producto cargado correctamente.';
    } else {
        $message = 'El nombre del producto es obligatorio.';
    }
}

if (isset($_GET['update_stock'], $_GET['id'])) {
    $id = $_GET['id'];
    $newStock = max(0, (int) $_GET['update_stock']);

    foreach ($products as &$product) {
        if (($product['id'] ?? '') === $id) {
            $product['stock'] = $newStock;
        }
    }
    unset($product);

    file_put_contents($dataFile, json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    header('Location: admin.php');
    exit;
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin TecnoMed</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <header class="topbar">
    <h1>Panel admin de TecnoMed</h1>
    <a class="admin-link" href="index.html">Ver catálogo</a>
  </header>

  <main class="container split">
    <section>
      <h2>Nuevo producto</h2>
      <?php if ($message !== ''): ?>
        <p class="msg"><?= htmlspecialchars($message) ?></p>
      <?php endif; ?>

      <form method="POST" enctype="multipart/form-data" class="form-grid">
        <label>Nombre
          <input type="text" name="name" required />
        </label>
        <label>Categoría
          <input type="text" name="category" placeholder="Ej: Monitores" />
        </label>
        <label>Descripción
          <textarea name="description" rows="3"></textarea>
        </label>
        <label>Precio
          <input type="number" step="0.01" min="0" name="price" required />
        </label>
        <label>Stock inicial
          <input type="number" min="0" name="stock" value="0" required />
        </label>
        <label>Imagen
          <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp" />
        </label>
        <input type="hidden" name="existing_image" value="" />
        <button type="submit">Guardar producto</button>
      </form>
    </section>

    <section>
      <h2>Stock actual</h2>
      <div class="stock-list">
        <?php foreach ($products as $product): ?>
          <article class="stock-item">
            <div>
              <strong><?= htmlspecialchars($product['name']) ?></strong>
              <p><?= htmlspecialchars($product['category']) ?> | Stock: <?= (int) $product['stock'] ?></p>
            </div>
            <form method="GET" class="inline-form">
              <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>" />
              <input type="number" name="update_stock" min="0" value="<?= (int) $product['stock'] ?>" required />
              <button type="submit">Actualizar</button>
            </form>
          </article>
        <?php endforeach; ?>
      </div>
    </section>
  </main>
</body>
</html>
