# Propuesta: Refactorización de InvitationController para usar tenant_uuid

## Por qué
Como parte de la transición de la arquitectura multi-tenant de identificadores de cadena/entero a UUIDs (UUID v7), es necesario actualizar el controlador encargado de gestionar las invitaciones. Actualmente, `InvitationController` utiliza la columna obsoleta `tenant_id`. La refactorización es crítica para mantener la coherencia con el nuevo esquema de base de datos y asegurar que las invitaciones se vinculen correctamente a los nuevos identificadores UUID.

## Qué cambios
- **Validación**: Actualizar la regla de validación en el método `store` para que acepte `tenant_uuid` como un UUID válido en lugar de una cadena genérica `tenant_id`.
- **Persistencia**: Modificar la lógica de creación en el modelo `TenantInvitation` para que asigne el valor al campo `tenant_uuid`.
- **Integridad**: Asegurar que la respuesta del controlador refleje los nuevos campos del modelo, manteniendo la compatibilidad con el flujo de generación de tokens y URLs (aunque la lógica interna de generación no cambie, los datos de entrada sí lo hacen).
