# Configuración de TecnoMed en InfinityFree (sin PHP)

Guía para publicar tu sitio estático y administrar productos desde `admin.html`.

## 1) Abrir el administrador de archivos

1. En InfinityFree, entra a **Overview**.
2. Haz clic en **File Manager**.
3. Abre la carpeta de tu dominio: `tecnomed.infinityfreeapp.com/htdocs/`.

## 2) Subir archivos del proyecto

Sube en `htdocs`:

- `index.html`
- `admin.html`
- `styles.css`
- `data/products.json`

## 3) Probar el sitio

- Catálogo: `https://tecnomed.infinityfreeapp.com/`
- Administración: `https://tecnomed.infinityfreeapp.com/admin.html`

## 4) Cómo gestionar productos sin backend

1. Entra a `admin.html`.
2. Agrega/edita productos y stock.
3. Los datos se guardan en `localStorage` del navegador.
4. Usa **Exportar JSON** para descargar tu respaldo.

## 5) Problemas comunes

### No veo productos nuevos en otro dispositivo
`localStorage` es local de cada navegador/dispositivo. Debes importar/cargar datos manualmente o usar backend.

### Se pierde información al limpiar navegador
Restaura desde el JSON exportado.

### Quiero panel compartido por varios usuarios
Necesitas backend real (PHP + MySQL).
