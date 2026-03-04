# TecnoMed

Sitio base para **catálogo de categorías y productos** con una parte pública en HTML y un panel de administración en **HTML + JavaScript**.

## Estructura

- `index.html`: página principal del catálogo.
- `admin.html`: panel de administración sin backend (usa `localStorage`).
- `data/products.json`: datos demo iniciales (respaldo inicial).
- `styles.css`: estilos compartidos.
- `INFINITYFREE_SETUP.md`: guía detallada para publicar en InfinityFree.

## Cómo usar en local

Puedes usar cualquiera de estas rutas:

- `http://localhost:8000/index.html`
- `http://localhost:8000/admin.html`

Para servir el proyecto localmente:

```bash
php -S 0.0.0.0:8000
```

## Cómo funciona la administración

- `admin.html` guarda productos en `localStorage` del navegador.
- `index.html` lee primero `localStorage`; si no hay datos, usa `data/products.json` como base.
- Desde `admin.html` puedes exportar JSON como respaldo.

## Deploy en InfinityFree (recomendado)

1. Sube el proyecto dentro de `htdocs/`.
2. Ingresa a:
   - `https://tu-dominio/`
   - `https://tu-dominio/admin.html`

Ejemplo para este proyecto: `https://tecnomed.infinityfreeapp.com/`.

> Si en el futuro necesitas administración compartida entre usuarios/dispositivos, necesitarás backend + base de datos.
