## ADDED Requirements

### Requirement: Validación Estricta de Datos
El sistema DEBE utilizar clases Form Request de Laravel para validar todos los datos entrantes desde el frontend. La persistencia solo SHALL ocurrir si la validación es exitosa.

#### Scenario: Validación Exitosa
- **WHEN** el frontend envía un payload que cumple con todas las reglas definidas en el Form Request.
- **THEN** el sistema procede a la fase de persistencia utilizando únicamente los datos validados.

#### Scenario: Validación Fallida
- **WHEN** el frontend envía un payload que viola una o más reglas de validación.
- **THEN** el sistema SHALL retornar una respuesta de error 422 (Inertia Validation Errors) y no persistirá ningún dato.

### Requirement: Persistencia Directa vía Eloquent
El controlador DEBE utilizar el modelo Eloquent correspondiente para guardar los datos mediante asignación masiva (Mass Assignment) utilizando el método `create` o `update` con el resultado de `$request->validated()`.

#### Scenario: Creación Exitosa de Registro
- **WHEN** el controlador recibe datos validados y ejecuta el método de creación del modelo.
- **THEN** se crea un nuevo registro en la base de datos y se redirige al usuario con un mensaje de éxito.

### Requirement: Feedback de Usuario Mediante Redirección
Tras completar la persistencia, el sistema SHALL redirigir al usuario utilizando los métodos de redirección de Laravel/Inertia, incluyendo mensajes de sesión para éxito o error.

#### Scenario: Redirección con Éxito
- **WHEN** la operación de persistencia finaliza correctamente.
- **THEN** el sistema redirige a la ruta especificada (o `back()`) inyectando un mensaje de éxito en la sesión.
