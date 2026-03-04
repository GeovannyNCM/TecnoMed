# TecnoMed

Sitio base para **catálogo de categorías y productos** con una parte pública en HTML y un panel en PHP para cargar productos y manejar stock.

## Estructura

- `index.html`: página principal del catálogo.
- `admin.php`: panel de administración para alta de productos y actualización de stock.
- `data/products.json`: base de datos simple en archivo JSON.
- `uploads/`: imágenes subidas desde el panel.
- `styles.css`: estilos compartidos.
- `INFINITYFREE_SETUP.md`: guía detallada para publicar en InfinityFree.

## Cómo usar en local

Como `admin.php` necesita servidor PHP, ejecuta:

```bash
php -S 0.0.0.0:8000
```

Luego abre:

- `http://localhost:8000/index.html`
- `http://localhost:8000/admin.php`

## Deploy en InfinityFree (resumen)

1. Entra a **File Manager** desde el panel de InfinityFree.
2. Sube el proyecto completo dentro de `htdocs/`.
3. Verifica que existan:
   - `htdocs/data/products.json`
   - `htdocs/uploads/`
4. Prueba:
   - `https://tecnomed.infinityfreeapp.com/`
   - `https://tecnomed.infinityfreeapp.com/admin.php`

Para el paso a paso completo, revisa: **`INFINITYFREE_SETUP.md`**.

> Si más adelante crece el catálogo, conviene migrar de JSON a MySQL.
