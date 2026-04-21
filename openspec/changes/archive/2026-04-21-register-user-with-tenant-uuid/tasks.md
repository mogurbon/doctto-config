## 1. Actualizaciones del Modelo

- [x] 1.1 Agregar `tenant_uuid` al `$fillable` en `app/Models/User.php`

## 2. Actualizaciones del Controlador

- [x] 2.1 Actualizar el método `store` en `app/Http/Controllers/Auth/RegisteredUserController.php` para validar `tenant_uuid` asegurando que el email coincida con la invitación
- [x] 2.2 Actualizar el método `store` en `app/Http/Controllers/Auth/RegisteredUserController.php` para pasar `tenant_uuid` a `User::create`
- [x] 2.3 Actualizar el método `create` en `RegisteredUserController.php` para pasar `tenant_uuid` y `email` desde la solicitud a la vista de Inertia (`resources/js/Pages/Auth/Register.vue`)

## 3. Verificación

- [x] 3.1 Verificar que el proceso de registro funciona correctamente con un `tenant_uuid` válido y el email correcto
- [x] 3.2 Verificar que la validación falla cuando el email no coincide con el de la invitación
- [x] 3.3 Verificar que la validación falla cuando falta el `tenant_uuid` o es inválido
