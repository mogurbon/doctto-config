## 1. Preparación del Backend

- [ ] 1.1 Crear la clase Form Request `StoreWorkspaceSettingRequest` con reglas de validación para `agenda_rules`, `billing_info` y `onboarding_completed`.
- [ ] 1.2 Definir la ruta `POST` en `routes/web.php` para el guardado de la configuración, protegida por middleware de autenticación.

## 2. Implementación del Flujo de Persistencia

- [ ] 2.1 Implementar el método `store` (o `update`) en `AgentConfigController` que reciba el `StoreWorkspaceSettingRequest`.
- [ ] 2.2 Ejecutar la persistencia directa utilizando `WorkspaceSetting::updateOrCreate` basado en el `tenant_uuid` del usuario autenticado.
- [ ] 2.3 Retornar una redirección de Inertia con un mensaje flash de éxito.

## 3. Verificación y Pruebas

- [ ] 3.1 Crear un test de integración (Feature Test) que simule el envío del formulario y verifique la persistencia en la base de datos.
- [ ] 3.2 Validar que los errores de validación sean devueltos correctamente en formato Inertia (422).
