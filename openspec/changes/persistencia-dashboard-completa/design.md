## Context

El componente `Dashboard.vue` centraliza la configuración del consultorio y del agente médico. Tras resolver los problemas de reactividad en el frontend, el componente ahora posee un objeto `form` de Inertia que contiene toda la información necesaria para el funcionamiento del agente. El objetivo de este diseño es establecer el puente de persistencia hacia Laravel.

## Goals / Non-Goals

**Goals:**
- Implementar la persistencia atómica del payload completo del Dashboard.
- Validar exhaustivamente la información recibida (perfil, servicios, horarios, reglas).
- Proporcionar feedback visual claro (errores de validación o éxito).
- Sincronizar los servicios del médico en la tabla `services`.
- Almacenar la configuración lógica en la tabla `workspace_settings`.

**Non-Goals:**
- No se implementará por ahora la subida de archivos (fotos de perfil o logo).
- No se manejará el flujo de n8n en esta etapa de persistencia directa.

## Decisions

1. **Ruta y Controlador:** Se utilizará `POST /dashboard` mapeado a `AgentConfigController@store`. Esto mantiene la cohesión con la ruta `GET` actual.
2. **Validación (Form Request):** Se creará `SaveAgentConfigRequest`. Dada la complejidad del payload, se utilizará validación de arreglos anidados (ej. `doctor.services.*.name`).
3. **Persistencia Atómica:** Se utilizará `DB::transaction` para asegurar que si falla el guardado de un servicio, no se guarden parcialmente los datos del perfil o configuración.
4. **Estrategia de Sincronización de Servicios:** 
   - Se optará por un enfoque de "sync": eliminar los servicios actuales del tenant y recrearlos a partir del payload para simplificar la lógica de actualización/borrado de ítems individuales en el frontend.
5. **Almacenamiento de Configuración (JSONB):**
   - El modelo `WorkspaceSetting` y `Service` pertenecen al tenant actual a través de la columna `tenant_uuid` presente en el usuario autenticado (`auth()->user()->tenant_uuid`).
   - **Estructura estricta para `agenda_rules`:**
     ```json
     {
       "availability": { "monday": [], "tuesday": [] },
       "rules": { "arrive_minutes_before": 15, "cancel_hours_notice": 24 },
       "policies": { "description": "..." }
     }
     ```
   - **Estructura estricta para `billing_info`:**
     ```json
     {
       "payment_methods": ["cash", "card"],
       "invoice_details": { "rfc": "...", "tax_regime": "..." }
     }
     ```
6. **Actualización de Perfil:** El campo `name` del médico actualizará directamente el modelo `User` del usuario autenticado.

## Risks / Trade-offs

- **[Riesgo] Payload Masivo:** Un payload muy grande puede causar timeouts o problemas de memoria en validaciones complejas. 
  - *Mitigación:* Se usarán reglas de validación optimizadas y se limitará el número máximo de servicios permitidos.
- **[Trade-off] Sincronización de Servicios (Delete/Insert):** Es más simple de implementar pero incrementa los IDs de los servicios en cada guardado.
  - *Decisión:* Es aceptable para esta etapa inicial de configuración donde los cambios no son frecuentes una vez establecidos.
