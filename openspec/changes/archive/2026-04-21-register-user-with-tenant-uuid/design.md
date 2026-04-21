## Contexto

La aplicación se está moviendo a una arquitectura multi-tenant donde cada usuario debe pertenecer a un tenant identificado por un `tenant_uuid`. El proceso de registro actualmente carece de la lógica para capturar y almacenar este UUID, lo que causa violaciones de restricciones de base de datos (restricción `NOT NULL` en la columna `tenant_uuid`).

## Metas / No-Metas

**Metas:**
- Aplicar la validación de `tenant_uuid` durante el registro de usuarios.
- Persistir el `tenant_uuid` desde el formulario de registro hacia la tabla `users`.
- Permitir la asignación masiva de `tenant_uuid` en el modelo `User`.

**No-Metas:**
- Modificar el frontend de registro (se asume que ya envía el campo).
- Cambiar la lógica de generación de invitaciones.

## Decisiones

### Decisión 1: Validación en el Controlador
Utilizaremos la validación integrada de Laravel en `RegisteredUserController@store`.
- **Justificación**: Mantiene la lógica de validación cerca del punto de entrada y asegura la integridad de los datos.
- **Reglas**: `required|uuid|exists:tenant_invitations,tenant_uuid`.

### Decisión 2: Configuración de Asignación Masiva
Agregar `tenant_uuid` al array `$fillable` en el modelo `User`.
- **Justificación**: Necesario para que `User::create` pueda poblar el campo.

### Decisión 3: Actualizar Lógica de Creación de Usuario
Pasar explícitamente `'tenant_uuid' => $request->tenant_uuid` a la llamada `User::create` en `RegisteredUserController`.
- **Justificación**: Mapeo directo desde los datos validados de la solicitud.

## Riesgos / Compensaciones

- [Riesgo] → Si el frontend no está enviando el `tenant_uuid`, el registro fallará con un error de validación.
- [Mitigación] → Asegurar que el enlace de invitación incluya el `tenant_uuid` como un parámetro de consulta y que el formulario de registro lo incluya como un campo oculto. (Nota: el método `create()` en el controlador también debería actualizarse para pasar esto a la vista, aunque no se solicitó explícitamente).
