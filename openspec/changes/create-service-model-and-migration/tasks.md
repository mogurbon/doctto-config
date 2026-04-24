## 1. Base de Datos y Migraciones

- [x] 1.1 Generar la migración para la tabla `services` usando `vendor/bin/sail artisan make:migration create_services_table`.
- [x] 1.2 Definir el esquema de la tabla `services` en el archivo de migración, incluyendo todos los campos especificados: UUIDs, strings, integers, booleanos, decimals y JSON.

## 2. Modelos

- [x] 2.1 Crear el modelo `app/Models/Service.php` usando `vendor/bin/sail artisan make:model Service`.
- [x] 2.2 Implementar el trait `HasUuids` en el modelo `Service`.
- [x] 2.3 Definir la propiedad `$fillable` con todos los atributos correspondientes.
- [x] 2.4 Implementar el método `casts()` para manejar las conversiones de tipos (boolean, decimal:2, array para JSON).
- [x] 2.5 Implementar lógica en el modelo (ej. usando el método booted o mutadores) para asegurar la exclusividad: si pricing_type es 'quote', el campo price debe ser forzado a null antes de guardar.

## 3. Verificación y Pruebas

- [x] 3.1 Ejecutar las migraciones usando `vendor/bin/sail artisan migrate`.
- [x] 3.2 Crear un test de Pest en `tests/Feature/ServiceTest.php` para verificar que un servicio puede ser creado y persistido correctamente con sus campos JSON.
- [x] 3.3 Ejecutar el test para validar la implementación.
- [x] 3.4 Agregar un test en `tests/Feature/ServiceTest.php` para validar la exclusividad del tipo de precio: si el `pricing_type` es 'quote', debe permitir guardar `quote_notes`, y si es 'fixed', debe requerir/permitir el `price`.
