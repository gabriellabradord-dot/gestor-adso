# Gestor ADSO — Presentación editorial

> Estado actual: la incidencia de edición descrita más abajo ya está corregida. La captura del HTTP 500 y las métricas de 25 pruebas/62 aserciones son históricas; la suite actual tiene 26 pruebas y 64 aserciones. Para exponer, usa `guion_exposicion.txt`.

Deck de 18 diapositivas en 16:9. Composiciones asimétricas, grid de 12 columnas, marcas de corte, folios, filas tipográficas a distintas escalas y figuras rotadas. Paleta cerrada de cinco colores y contenido verificado contra el código, la base de datos y los PDF de `taca/`.

## Archivos

| Archivo             | Uso                                                                                                                                                             |
| ------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `index.html`        | Deck autónomo. Navegación con flechas, espacio, `Home`/`End` y botones. Sin internet.                                                                           |
| `index-motion.html` | El mismo deck con transiciones CSS: fundido, desplazamiento vertical suave, revelado escalonado y entrada de figuras. Sin 3D. Respeta `prefers-reduced-motion`. |
| `gestor-adso.pdf`   | 18 páginas, 960 × 540 pt (16:9), generado desde `index.html`. Texto vectorial.                                                                                  |
| `gestor-adso.pptx`  | 18 diapositivas 16:9. Cada diapositiva usa la página del PDF como fondo para conservar el diseño.                                                               |
| `exportar-pdf.py`   | Regenera el PDF desde `index.html` con Playwright.                                                                                                              |
| `assets/capturas/`  | 12 capturas reales: 6 en vivo y 6 extraídas de los PDF de `taca/`.                                                                                              |
| `assets/diagramas/` | `arquitectura.svg`, `modelo-datos.svg`, `flujo-critico.svg`, `trama.svg`.                                                                                       |
| `assets/iconos/`    | Monograma GA y tres iconos de trazo propio.                                                                                                                     |
| `assets/fuentes/`   | Cormorant Garamond, Inter y JetBrains Mono alojadas localmente.                                                                                                 |

## Cómo abrirlo

Abre `index.html` o `index-motion.html` en Chrome, Edge, Firefox o Chromium. No necesitas servidor ni conexión: las fuentes, imágenes y SVG son locales.

- `→`, `↓`, espacio o `AvPág`: siguiente diapositiva.
- `←`, `↑` o `RePág`: anterior.
- `Home` / `End`: primera / última.

## Cómo exportar a PDF

El CSS ya define `@page { size: 13.333in 7.5in; margin: 0 }`.

**Opción A — navegador:** abre `index.html`, pulsa `Ctrl+P`, elige «Guardar como PDF», tamaño horizontal personalizado 13,333 × 7,5 in, márgenes «Ninguno» y activa «Gráficos de fondo».

**Opción B — Playwright:**

```bash
python exportar-pdf.py
```

El script imprime las 18 diapositivas, una por página, con `print_background=True`.

## Cómo se generó el PPTX

LibreOffice está instalado vía Flatpak (`org.libreoffice.LibreOffice`). Su conversión directa de PDF a PPTX produjo un archivo vacío (2,6 KB, sin diapositivas), así que se renderizaron las 18 páginas del PDF a PNG a 144 dpi y se ensamblaron con `python-pptx` en 13,333 × 7,5 in. El resultado se validó reabriéndolo en LibreOffice: 18 diapositivas, 16:9. El texto del PPTX no es editable; el PDF conserva el texto vectorial.

## Auditoría de capturas

Las capturas se audiaron una por una con OCR antes de incluirlas. Se descartaron tres piezas que no coincidían con su leyenda:

- La captura anterior de «editar» era en realidad un **HTTP 500**, no el formulario. Se sustituyó por `06-editar-historico-taca2.png`, extraída de `taca/taca2.pdf`, que sí muestra el formulario con datos precargados.
- La captura anterior de «validación» no mostraba errores. Se recapturó un envío con un documento duplicado; ahora `07-errores-validacion-vivo.png` muestra «El documento ya existe.»
- `09-route-list-taca2.png` era código en VS Code, no la salida de `route:list`. Se sustituyó por `09-route-list-taca3.png`, extraída de `taca3-000.png`.

El error 500 **no se ocultó**: `12-error-parametro-vivo.png` se usa como FIG. 14 en la diapositiva de retos y como primer punto del roadmap.

### Defecto corregido (evidencia histórica)

Antes de corregirlo, `GET /aprendices/1/edit` respondía 500:

```
Illuminate\Routing\Exceptions\UrlGenerationException
Missing required parameter for [Route: aprendices.update]
[URI: aprendices/{aprendice}] [Missing parameter: aprendice]
resources/views/aprendices/edit.blade.php:17
<form action="{{ route('aprendices.update', $aprendiz) }}" method="POST">
```

La corrección aplicada en `routes/web.php` alinea el parámetro `{aprendiz}` con el controlador. La vista de edición pasa el modelo usando esa misma clave:

```php
Route::resource('aprendices', AprendizController::class)
    ->parameters(['aprendices' => 'aprendiz']);
```

## Fuentes verificadas

- `composer.json`: PHP `^8.2`, Laravel `^12.0`, Breeze `^2.4`, PHPUnit `^11.5`.
- `composer.lock`: Laravel **12.69.3**, Breeze **2.4.2**, PHPUnit **11.5.57**.
- `package.json`: Vite `^7`, Tailwind `^3.1` y `@tailwindcss/vite` `^4`.
- `.env`: `DB_CONNECTION=mysql`, base `gestor_adso`; `select version()` → **MariaDB 13.0.2**, 50 aprendices y 1 usuario. `.env.example` trae SQLite genérico y no refleja el entorno real.
- `php artisan migrate:status`: 5 migraciones ejecutadas.
- `php artisan route:list`: **7 rutas** para `aprendices` (la documentación habla de 6).
- `php artisan test`: **26 pruebas, 64 aserciones**, todas en verde.
- `app/Http/Requests/StoreUpdateAprendizRequest.php`: reglas, mensajes en español e `ignore($id)`.
- `routes/web.php`: middleware `['auth', 'verified']` y redirecciones.
- `taca/`: guía DOCX de la Semana 4, cuatro PDF de evidencia y el deck previo en `.md/.html/.pdf`.

### Datos marcados como [POR CONFIRMAR]

- Roles y permisos: `authorize()` devuelve `true`; no hay gestión de roles.
- Entidad `Ficha`: `ficha_id` existe sin llave foránea declarada.
- `aprendices.show`: aparece en `route:list`, pero `AprendizController` no implementa `show()`.
- Las 10 pruebas de la guía son funcionales y manuales; las 25 automatizadas son las de Breeze/perfil.
- El `README.md` del proyecto es el texto inicial de Laravel y no documenta Gestor ADSO.

## Capturas

Todas son reales y llevan pie de foto en la diapositiva donde aparecen.

| Archivo                              | Origen                         | Qué se ve                                                     |
| ------------------------------------ | ------------------------------ | ------------------------------------------------------------- |
| `01-login-vivo.png`                  | Laravel en vivo                | `/login`, español, Breeze personalizado. Diapositiva 11.      |
| `02-registro-vivo.png`               | Laravel en vivo                | `/register`. Archivo de respaldo.                             |
| `03-panel-aprendices-vivo.png`       | Laravel en vivo                | `/aprendices`, 50 registros y acciones. Diapositiva 16.       |
| `04-formulario-crear-vivo.png`       | Laravel en vivo                | `/aprendices/create`, modelo vacío. Diapositiva 09A.          |
| `05-busqueda-vivo.png`               | Laravel en vivo                | `/aprendices?q=Alexis`, filtro y paginación. Diapositiva 08.  |
| `06-editar-historico-taca2.png`      | `taca/taca2.pdf` (`taca2-001`) | Formulario de edición con datos precargados. Diapositiva 09B. |
| `07-errores-validacion-vivo.png`     | Laravel en vivo                | `El documento ya existe.` Diapositiva 10A.                    |
| `08-confirmar-eliminacion-taca2.png` | `taca/taca2.pdf` (`taca2-006`) | Diálogo `confirm()` previo a DELETE. Diapositiva 10B.         |
| `09-route-list-taca3.png`            | `taca/taca3.pdf` (`taca3-000`) | Salida real de `php artisan route:list`.                      |
| `10-form-request-taca2.png`          | `taca/taca2.pdf` (`taca2-009`) | Clase `StoreUpdateAprendizRequest`.                           |
| `11-base-datos-taca3.png`            | `taca/taca3.pdf` (`taca3-002`) | Base `gestor_adso` y tabla `aprendices`.                      |
| `12-error-parametro-vivo.png`        | Laravel en vivo                | HTTP 500 por `{aprendice}` vs `$aprendiz`. Diapositiva 14.    |

El diálogo de confirmación no se pudo congelar con el navegador headless; se usa la captura real de `taca2.pdf`, identificada en su pie de foto. Para las capturas en vivo se creó un usuario temporal, se usó y se eliminó. La base quedó con 1 usuario, como al inicio.

## Verificación de diseño

- 5 colores exactos: `#0A0A0A`, `#141414`, `#C9A227`, `#E8C766`, `#F5F1E8`.
- 18 diapositivas; máximo 35 palabras por diapositiva, comprobado por script (máximo real: 35).
- Máximo 6 viñetas de hasta 8 palabras; comprobado por script (0 exceden).
- Grid de 12 columnas, filetes dorados de 1 px, folios `NN / 18` y marcas de corte.
- Composiciones deliberadamente distintas: portada con monograma a gran escala, índice tipográfico, hallazgos escalonados, especimen de versiones, diagramas, figuras rotadas, matriz de seguridad, métricas dispersas y cierre centrado.
- Sin degradados, blobs, partículas, sparkles, fotos de stock ni animaciones 3D.
- Todas las imágenes cargan y ningún elemento de texto sale del lienzo; verificado midiendo `getBoundingClientRect()` en las 18 diapositivas.
