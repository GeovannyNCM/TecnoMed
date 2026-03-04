# TecnoMed

Sitio base para **catálogo de categorías y productos** con una parte pública en HTML y un panel en PHP para cargar productos y manejar stock.

## Estructura

- `index.html`: página principal del catálogo.
- `admin.php`: panel de administración para alta de productos y actualización de stock.
- `data/products.json`: base de datos simple en archivo JSON.
- `uploads/`: imágenes subidas desde el panel.
- `styles.css`: estilos compartidos.

## Cómo usar en local

Como `admin.php` necesita servidor PHP, ejecuta:

```bash
php -S 0.0.0.0:8000
```

Luego abre:

- `http://localhost:8000/index.html`
- `http://localhost:8000/admin.php`

## Deploy en InfinityFree (recomendado)

1. Crea tu cuenta y dominio/subdominio en InfinityFree.
2. Entra a **File Manager** o conecta por FTP.
3. Sube todos estos archivos dentro de la carpeta `htdocs/`.
4. Verifica permisos de escritura para:
   - `data/products.json`
   - `uploads/`
5. Ingresa a `https://tu-dominio/admin.php` y carga productos.

> Si más adelante crece el catálogo, conviene migrar de JSON a MySQL.
