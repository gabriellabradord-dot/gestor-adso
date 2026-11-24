# Guion de exposición — Gestor ADSO

> Esta es una guía anterior al arreglo de la ruta de edición. Para el estado actual usa `guion_exposicion.txt`; la captura del error 500 y su corrección se deben presentar como evidencia histórica.

**Tesis para abrir (dila tal cual):**

> «Construí un CRUD de aprendices validado y protegido con Laravel. Hoy puedo recorrerlo completo con evidencia real del proyecto, incluido un error que encontré y que todavía está pendiente de corregir.»

**Duración objetivo:** 9 minutos de exposición + 2 de demo + preguntas.
**Máximo de diapositivas:** 18. **Formato:** 16:9.

---

## Antes de empezar (5 minutos)

1. Abre **`index.html`** con doble clic. Usa **`index-motion.html`** si quieres las transiciones con fundido.
2. Pulsa **F11** para pantalla completa.
3. Prueba `→` una vez: debe pasar a `02 / 18` sin errores.
4. Ten abierto **`gestor-adso.pdf`** como respaldo. Si el proyector falla, expones desde el PDF.
5. Ten este `GUION.md` impreso o en el celular.
6. Desactiva notificaciones y cierra pestañas ajenas.

**Controles:** `→`, `↓`, espacio o `AvPág` = siguiente · `←`, `↑` o `RePág` = anterior · `Home` / `End` = primera / última.

---

## Qué decir, diapositiva por diapositiva

| #   | Tiempo | Frase ancla                                                                                                                | Qué señalar en pantalla                                                                                               |
| --- | ------ | -------------------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------------- |
| 01  | 0:20   | «Este es el proyecto: Gestor ADSO, un CRUD de aprendices en Laravel.»                                                      | Título, ficha 3412760 e instructor. No leas los datos del pie.                                                        |
| 02  | 0:15   | «Cuatro bloques: contexto, arquitectura, acceso y estado.»                                                                 | Solo enuncia los cuatro movimientos. No te detengas.                                                                  |
| 03  | 0:25   | «Antes de la semana 4 los aprendices eran datos simulados, las reglas estaban dispersas y las rutas no exigían cuenta.»    | Las tres líneas escalonadas. Es el problema, no la solución.                                                          |
| 04  | 0:30   | «El objetivo fue un CRUD validado: alta, listado, edición y baja, con búsqueda y acceso verificado.»                       | El parcial `scope`. Di «roles: por confirmar» con naturalidad, no lo omitas.                                          |
| 05  | 0:25   | «Stack real, sacado de composer.lock y del entorno: PHP 8.2, Laravel 12.69.3, MariaDB 13.0.2 y Breeze 2.4.2.»              | Las tres escalas tipográficas. No enumeres Vite/Tailwind salvo que te pregunten.                                      |
| 06  | 0:35   | «Cada petición atraviesa una sola capa responsable: ruta, middleware, request, controlador, modelo, base y vista.»         | Recorre el diagrama con el dedo de izquierda a derecha y luego abajo.                                                 |
| 07  | 0:25   | «Dos tablas verificadas: aprendices y users. ficha_id existe, pero no declara llave foránea.»                              | El bloque `aprendices`. Marca `[POR CONFIRMAR]` como algo pendiente, no como error.                                   |
| 08  | 0:35   | «El listado filtra con when(), pagina de diez en diez y conserva la búsqueda con withQueryString().»                       | La captura con `?q=Alexis`: un resultado, filtro activo y paginación.                                                 |
| 09  | 0:35   | «Alta y edición comparten el parcial \_form; old() conserva lo escrito y el model binding resuelve el ID.»                 | FIG. 09A (alta en vivo) y 09B (edición histórica). Aclara que 09B viene de la guía.                                   |
| 10  | 0:40   | «Aquí está la validación real: el documento duplicado devuelve 'El documento ya existe'. El borrado pide confirmación.»    | Lee el mensaje de error en voz alta. Es la prueba de que no es inventado.                                             |
| 11  | 0:25   | «El grupo de rutas aplica auth y verified. authorize() hoy devuelve true: aún no hay roles.»                               | El bloque `authorize() → true` y el login real a la derecha.                                                          |
| 12  | 0:30   | «Flujo de alta: POST, validar, persistir, redirigir y avisar. Si falla, vuelve al formulario con old() y errores.»         | Las cinco etapas del diagrama.                                                                                        |
| 13  | 0:25   | «Seis medidas concretas: CSRF, method spoofing, unique con ignore, fillable, password hasheado y middleware.»              | Recorre la matriz de seis celdas. No inventes permisos.                                                               |
| 14  | 0:45   | «Encontré un bug real: la ruta espera {aprendice} y la vista pasa $aprendiz. Editar devuelve 500. Lo dejé como evidencia.» | FIG. 14. Lee el mensaje `Missing required parameter`. Di la corrección: `->parameters(['aprendices' => 'aprendiz'])`. |
| 15  | 0:30   | «Estado medible: 25 pruebas y 62 aserciones en verde, 50 aprendices, 7 rutas y 5 migraciones.»                             | Los cuatro números. Aclara si te preguntan: son pruebas de Breeze/perfil; las de la guía son manuales.                |
| 16  | 0:40   | «Esta es la pantalla principal con los 50 registros, búsqueda, paginación y acciones.»                                     | La captura en vivo. Si haces demo en vivo, hazla aquí.                                                                |
| 17  | 0:30   | «Cinco pasos: alinear el parámetro, declarar la FK, definir roles, traducir Breeze y revisar show().»                      | El primer paso en dorado: es el bug de la diapositiva 14.                                                             |
| 18  | 0:15   | «Queda un CRUD real, validado y protegido, con deuda técnica conocida y documentada. Gracias.»                             | No leas la diapositiva. Mira al público.                                                                              |

**Cierre exacto sugerido:** «No les oculté el error: está en la diapositiva 14 y es el primer punto del roadmap. Eso es parte del trabajo.»

---

## Si te sobra o falta tiempo

**Versión corta (5 min):** no te detengas en 02, 05, 13 ni 18. Veles pasando. Centra el tiempo en 03, 06, 08, 10, 14, 15 y 16.

**Si te preguntan algo que no sabes:** di «eso queda marcado como POR CONFIRMAR en la diapositiva correspondiente» y sigue. Nunca improvises un dato.

---

## Demo en vivo (opcional, 2 minutos)

Hazla en la diapositiva 16. **Antes de hacerla, lee esta advertencia.**

> **No hagas clic en «Editar» en vivo.** La ruta actual devuelve HTTP 500 por el bug de la diapositiva 14. Si quieres mostrarlo, muestra la captura FIG. 14 y di que es el defecto pendiente.

### Opción A — usar tu cuenta real

```bash
cd /home/gabriel/Proyectos/PHP/gestor-adso
php artisan serve --host=127.0.0.1 --port=8000
```

Abre `http://127.0.0.1:8000/login`, entra con tu cuenta y muestra `/aprendices`. Recorrido: login → aprendices → buscas «Alexis» → vuelves al listado.

### Opción B — usuario temporal (si no quieres usar tu cuenta)

Crear:

```bash
cd /home/gabriel/Proyectos/PHP/gestor-adso
php artisan tinker --execute='$u=\App\Models\User::firstOrCreate(["email"=>"demo.expo@local.test"],["name"=>"Demo Expo","password"=>\Illuminate\Support\Facades\Hash::make("Demo2026!")]); $u->email_verified_at=now(); $u->save(); echo $u->id;'
```

Entrar con `demo.expo@local.test` / `Demo2026!`.

Borrar al terminar:

```bash
php artisan tinker --execute='echo \App\Models\User::where("email","demo.expo@local.test")->delete();'
```

Detener el servidor con **Ctrl+C** en la terminal donde está corriendo.

### Opción C — sin demo en vivo

Quédate en la diapositiva 16 y usa la captura. Es real y ya incluye los 50 registros. Es la opción más segura si el ambiente puede fallar.

---

## Preguntas probables y respuesta corta

**¿Por qué Laravel y no otra cosa?**
Porque es el framework del proyecto: da Eloquent, middleware, Form Requests y Breeze para autenticación sin reimplementarlos.

**¿Por qué MariaDB si el `.env.example` dice SQLite?**
`.env.example` es la plantilla genérica de Laravel. El entorno real usa `DB_CONNECTION=mysql` sobre MariaDB 13.0.2; lo comprobé con `select version()`.

**¿Los roles están implementados?**
No. `authorize()` devuelve `true`. Hay `auth` + `verified`, que es autenticación y verificación de correo, no autorización por rol. Está marcado como POR CONFIRMAR y en el roadmap.

**¿El error 500 ya está arreglado?**
No. Es un bug real del código actual. La corrección es `Route::resource(...)->parameters(['aprendices' => 'aprendiz']);` o renombrar la variable en la vista.

**¿Qué entidad es `Ficha`?**
`ficha_id` existe en la migración, pero no hay llave foránea ni modelo confirmado. Por eso dice POR CONFIRMAR.

**¿Las 25 pruebas cubren el CRUD?**
No. Son las pruebas incluidas por Breeze y perfil. Las 10 pruebas de la guía son manuales/funcionales. Decir esto evita un problema con el jurado.

**¿Por qué hay 7 rutas si la guía dice 6?**
`route:list` reporta 7 para el recurso `aprendices`. Además, `show()` aparece como ruta pero no está implementado en el controlador.

**¿Las capturas son reales?**
Sí. Seis en vivo y seis extraídas de los PDF de la guía. Cada una lleva pie de foto y la tabla completa está en `README.md`.

**¿El PPTX es editable?**
No: cada diapositiva es la página del PDF como imagen. El PDF conserva el texto vectorial y es el archivo recomendado para exponer.

---

## Checklist final (marca antes de salir)

- [ ] Abrí `index.html` y `→` pasa a `02 / 18`.
- [ ] F11 funciona y se ve pantalla completa.
- [ ] Tengo `gestor-adso.pdf` abierto como respaldo.
- [ ] Tengo este guion a mano.
- [ ] Decidí si hago demo en vivo (opción A, B o C).
- [ ] Si hago demo, sé que **no debo hacer clic en «Editar»**.
- [ ] Si creo usuario temporal, sé el comando para borrarlo.
- [ ] Sé decir la frase del bug de la diapositiva 14 sin leerla.
- [ ] Sé la respuesta corta a «¿los roles están implementados?».
