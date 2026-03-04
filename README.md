# TecnoMed

Sitio base para **catálogo de categorías y productos** con una parte pública en HTML y dos opciones de administración:

- **`admin.html`**: panel en HTML + JavaScript (sin depender de PHP, guarda en `localStorage`).
- **`admin.php`**: panel en PHP (guarda en `data/products.json` y sube imágenes a `uploads/`).

## Estructura

- `index.html`: página principal del catálogo.
- `admin.html`: panel de administración sin backend (localStorage).
- `admin.php`: panel de administración con PHP.
- `data/products.json`: datos demo iniciales / almacenamiento JSON para `admin.php`.
- `uploads/`: imágenes subidas desde `admin.php`.
- `styles.css`: estilos compartidos.
- `INFINITYFREE_SETUP.md`: guía detallada para publicar en InfinityFree.

## Cómo usar en local

Puedes usar cualquiera de estas rutas:

- `http://localhost:8000/index.html`
- `http://localhost:8000/admin.html` (sin PHP)
- `http://localhost:8000/admin.php` (con PHP)

Para servir el proyecto localmente:

```bash
php -S 0.0.0.0:8000
```

## Diferencia entre admin.html y admin.php

### `admin.html`
- Guarda productos en `localStorage` del navegador.
- No requiere backend.
- Útil si no puedes gestionar PHP.

### `admin.php`
- Guarda productos en `data/products.json` en el servidor.
- Permite subir imágenes a `uploads/`.
- Útil para administración compartida/multi-dispositivo.

## Deploy en InfinityFree (recomendado)

1. Sube el proyecto dentro de `htdocs/`.
2. Si usarás panel sin backend, entra a:
   - `https://tu-dominio/`
   - `https://tu-dominio/admin.html`
3. Si usarás PHP, además verifica:
   - `data/products.json` con permisos de escritura
   - carpeta `uploads/` con permisos de escritura
   - acceso a `https://tu-dominio/admin.php`

Ejemplo para este proyecto: `https://tecnomed.infinityfreeapp.com/`.

> Si después quieres administración multiusuario real y robusta, conviene migrar a PHP + MySQL.
