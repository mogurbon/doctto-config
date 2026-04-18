## Why

El modelo de "Invitaciones de Enlace Abierto" para DOCTTO permite que un orquestador externo envíe únicamente un `tenant_uuid` válido. Sin embargo, la implementación actual en `InvitationController@store` y el esquema de la base de datos exigen un `email` y un `role` de forma obligatoria. Esto provoca errores de violación de restricción "NOT NULL" en SQL y rompe el flujo donde el usuario debe definir su correo recién en la pantalla de registro.

## What Changes

- **Base de Datos**: Nueva migración para hacer que la columna `email` en la tabla `tenant_invitations` sea `nullable`.
- **Controlador**: Refactorización de `InvitationController@store` para eliminar la validación y asignación de `email` y `role`.
- **Validación**: La única regla necesaria en el controlador será la validación del `tenant_uuid` como requerido y único (si corresponde).

## Capabilities

### New Capabilities
- `open-link-invitations`: Permite la creación de invitaciones vinculadas a un tenant sin requerir el correo electrónico o rol del invitado por adelantado.

### Modified Capabilities
<!-- Sin capacidades existentes para modificar. -->

## Impact

- **API**: El endpoint de creación de invitaciones dejará de requerir `email` y `role`.
- **Base de Datos**: Esquema de la tabla `tenant_invitations` modificado.
- **Controladores**: `InvitationController` simplificado.
