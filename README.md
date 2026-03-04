# TecnoMed

Sitio base para **catálogo de categorías y productos** con panel de administración en **HTML + JavaScript** (sin depender de PHP).

## Estructura

- `index.html`: página principal del catálogo.
- `admin.html`: panel de administración para alta de productos y actualización de stock (usa `localStorage`).
- `data/products.json`: datos demo iniciales.
- `styles.css`: estilos compartidos.
- `INFINITYFREE_SETUP.md`: guía detallada para publicar en InfinityFree.

## Cómo usar en local

Puedes abrir directamente `index.html` y `admin.html`.

Si quieres servirlos como web local:

```bash
php -S 0.0.0.0:8000
```

Luego abre:

- `http://localhost:8000/index.html`
- `http://localhost:8000/admin.html`

## ¿Cómo funciona sin PHP?

- `admin.html` guarda productos en `localStorage` del navegador.
- `index.html` primero intenta leer `localStorage` y, si no hay datos, usa `data/products.json` como respaldo.
- Desde `admin.html` puedes **exportar JSON** para tener copia de seguridad.

## Deploy en InfinityFree (recomendado)

1. Sube el proyecto dentro de `htdocs/`.
2. Entra a:
   - `https://tu-dominio/`
   - `https://tu-dominio/admin.html`

Ejemplo para este proyecto: `https://tecnomed.infinityfreeapp.com/`.

> Si después quieres administración multiusuario real, ahí sí conviene volver a PHP + MySQL.
