# Configuración de TecnoMed en InfinityFree (paso a paso)

Guía pensada para tu cuenta (`tecnomed.infinityfreeapp.com`) y el panel que muestras en la captura.

## 1) Abrir el administrador de archivos

1. En InfinityFree, entra a **Overview**.
2. Haz clic en **File Manager** (botón superior naranja).
3. Si te pide confirmar acceso, acepta para abrir el file manager de hosting.

## 2) Subir el proyecto en la carpeta correcta

InfinityFree publica el sitio desde la carpeta `htdocs` del dominio.

1. Dentro del file manager abre:
   - `tecnomed.infinityfreeapp.com/htdocs/`
2. Sube estos archivos y carpetas dentro de `htdocs`:
   - `index.html`
   - `admin.php`
   - `styles.css`
   - carpeta `data/` (con `products.json` dentro)
   - carpeta `uploads/`

> Importante: si los subes fuera de `htdocs`, la web no se verá.

## 3) Inicializar archivos para escritura (stock y productos)

El panel `admin.php` guarda productos en `data/products.json` y sube imágenes en `uploads/`.

Verifica que existan:

- `htdocs/data/products.json`
- `htdocs/uploads/`

Si no existen, créalos manualmente desde File Manager:

- Carpeta: `data`
- Archivo: `products.json` con contenido inicial:

```json
[]
```

- Carpeta: `uploads`

## 4) Probar el sitio publicado

1. Abre: `https://tecnomed.infinityfreeapp.com/`
2. Debes ver el catálogo de TecnoMed.
3. Abre: `https://tecnomed.infinityfreeapp.com/admin.php`
4. Carga un producto de prueba.
5. Regresa al inicio y confirma que aparece en el catálogo.

## 5) Solución de problemas comunes

### Error 403/404
- Revisa que los archivos estén en `htdocs` (no en raíz de cuenta).

### No guarda productos
- Verifica que exista `data/products.json`.
- Abre `products.json` y confirma que sea JSON válido (`[]` al inicio).

### No sube imágenes
- Verifica que exista `uploads/` en `htdocs`.
- Prueba con imágenes `.jpg`, `.jpeg`, `.png` o `.webp`.

### Se ve una página de ejemplo de InfinityFree
- Elimina `index2.html` o archivos de plantilla por defecto en `htdocs`.

## 6) Recomendación de seguridad (siguiente paso)

Actualmente `admin.php` es público. Como mejora inmediata:

- protege `admin.php` con contraseña (login simple en PHP o protección por `.htaccess`),
- o cambia temporalmente el nombre a una ruta no obvia mientras terminas el sitio.
