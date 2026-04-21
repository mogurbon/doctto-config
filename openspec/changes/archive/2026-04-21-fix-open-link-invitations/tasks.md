## 1. Modificaciones de Base de Datos

- [x] 1.1 Crear migración para hacer `nullable` las columnas `email`, `role`, `token` y `expires_at` en `tenant_invitations`.
- [x] 1.2 Ejecutar la migración (`vendor/bin/sail artisan migrate`).

## 2. Refactorización del Controlador

- [x] 2.1 Verificar y refactorizar `InvitationController@store` para asegurar que solo se valide y asigne el `tenant_uuid`.
- [x] 2.2 Eliminar cualquier referencia a `email` o `role` en la lógica de creación del controlador.

## 3. Pruebas y Validación

- [x] 3.1 Actualizar o crear un test funcional para verificar la creación de invitaciones con solo `tenant_uuid`.
- [x] 3.2 Verificar que no haya regresiones en los tests existentes de `TenantInvitation`.
- [x] 3.3 Eliminar el script de reproducción `reproduce_bug.php`.
