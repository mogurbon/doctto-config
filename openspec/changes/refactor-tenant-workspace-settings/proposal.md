# Propuesta: Refactorización de Arquitectura Tenant y Workspace Settings

## Por qué
La arquitectura multi-tenant actual requiere una transición de identificadores simples a identificadores únicos universales (UUID) para mejorar la seguridad y la escalabilidad. Además, el sistema de invitaciones carece de campos esenciales (email, rol, tokens de expiración) necesarios para un flujo de onboarding profesional. Finalmente, es crítico centralizar la configuración operativa y de facturación de cada consultorio en una tabla dedicada (`workspace_settings`) para soportar la lógica de negocio de "DOCTTO".

## Qué cambios
- **Migración de Datos (INT/String a UUID)**: Transición controlada de la columna `tenant_id` a `tenant_uuid` en las tablas `users` y `tenant_invitations`.
- **Mejoras en Invitaciones**: Ampliación de la tabla `tenant_invitations` para incluir control de roles, emails de destino, tokens únicos y fechas de expiración.
- **Nueva Entidad de Configuración**: Implementación de la tabla `workspace_settings` con soporte para reglas de agenda (JSONB) y datos de facturación, vinculada 1:1 con el Tenant.
- **Actualización de Modelos**: Refactorización de `User.php` y `TenantInvitation.php`, y creación del modelo `WorkspaceSetting.php`.
