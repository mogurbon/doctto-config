# Tareas: Refactorización de Arquitectura Tenant y Workspace Settings

## Fase 1: Base de Datos y Migraciones

- [x] Crear migración para agregar `tenant_uuid` (UUID, nullable) a las tablas `users` y `tenant_invitations`.
- [x] Crear migración para la nueva tabla `workspace_settings` (vinculada a `tenant_uuid`).
- [x] Crear migración para modificar la tabla `tenant_invitations` agregando los campos `email`, `role`, `token` y `expires_at`.
- [x] Crear un comando de Artisan para migrar los datos existentes: mapear cada `tenant_id` a un nuevo `tenant_uuid` utilizando `Str::uuid()` nativo de Laravel, envolviendo la lógica en una transacción de base de datos (`DB::transaction()`) para asegurar un rollback seguro en caso de fallo.
- [x] Crear migración final para establecer `tenant_uuid` como obligatorio (NOT NULL) y eliminar la columna antigua `tenant_id`.

## Fase 2: Modelos y Lógica de Negocio

- [x] Crear el modelo `app/Models/WorkspaceSetting.php` implementando el trait `HasUuids` y definiendo los `casts()` para los campos JSONB.
- [x] Actualizar el modelo `app/Models/User.php` para integrar el manejo de `tenant_uuid`.
- [x] Actualizar el modelo `app/Models/TenantInvitation.php` incluyendo los nuevos campos, el trait `HasUuids` y la lógica de validación de tokens y expiración.
- [x] Crear la factory `database/factories/WorkspaceSettingFactory.php` para pruebas.
- [x] Crear el observer `app/Observers/TenantObserver.php` con el método `created` para instanciar automáticamente `WorkspaceSetting` con sus valores por defecto.
- [x] Registrar el `TenantObserver` utilizando el atributo `#[ObservedBy(\App\Observers\TenantObserver::class)]` directamente en el modelo `app/Models/Tenant.php` (estilo Laravel 12).

## Fase 3: Pruebas y Validación

- [x] Crear tests de integración en `tests/Feature/InvitationTest.php` para validar el flujo de invitación con los nuevos campos y tokens.
- [x] Crear tests unitarios para verificar la correcta persistencia y casteo de los campos JSONB en `app/Models/WorkspaceSetting.php`.
- [x] Validar mediante un script de prueba que la migración de datos de INT/String a UUID mantiene la integridad referencial de los usuarios.
