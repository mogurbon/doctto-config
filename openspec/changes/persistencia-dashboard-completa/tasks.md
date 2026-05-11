## 1. Backend: Rutas y Validación

- [x] 1.1 Definir la ruta `POST /dashboard` en `routes/web.php` apuntando a `AgentConfigController@store`.
- [x] 1.2 Crear el Form Request `app/Http/Requests/SaveAgentConfigRequest.php` con las reglas de validación para la estructura anidada (doctor, location, services, etc.).

## 2. Backend: Controlador y Persistencia

- [x] 2.1 Implementar el método `store` en `AgentConfigController` inyectando el nuevo Form Request.
- [x] 2.2 Implementar la lógica de persistencia dentro de un bloque `DB::transaction`.
- [x] 2.3 Actualizar el nombre del usuario autenticado (`User`) basado en `doctor.profile.name`.
- [x] 2.4 Implementar la lógica de sincronización de servicios: eliminar servicios existentes del tenant y crear los nuevos del payload.
- [x] 2.5 Actualizar el modelo `WorkspaceSetting` del tenant mapeando los campos de horarios, reglas y facturación a las columnas JSONB.

## 3. Frontend: Integración y Feedback

- [x] 3.1 Verificar en `Dashboard.vue` que el método `submitForm` esté configurado correctamente para usar `form.post(route('dashboard'))`.
- [x] 3.2 Asegurar que los componentes hijos de `DoctorSection` (como `ServicesSection` y `AvailabilitySection`) estén enviando sus datos correctamente mediante `v-model`.
- [x] 3.3 Implementar el manejo de la respuesta exitosa en el frontend, mostrando una notificación de éxito al usuario.

## 4. Verificación y Calidad

- [x] 4.1 Crear un test de Feature en Pest (`tests/Feature/DashboardPersistenceTest.php`) para validar el guardado correcto de todos los modelos.
- [x] 4.2 Ejecutar `vendor/bin/sail bin pint --dirty --format agent` para asegurar el estilo de código PHP.
