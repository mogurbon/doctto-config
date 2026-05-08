## ADDED Requirements

### Requirement: Flujo de Datos Bidireccional Íntegro
El Dashboard de configuración DEBE implementar un flujo de datos bidireccional (two-way binding) que garantice que cualquier entrada del usuario en los subcomponentes se sincronice instantáneamente con el estado del formulario principal (`Dashboard.vue`).

#### Scenario: Sincronización de inputs en subcomponentes
- **WHEN** el usuario escribe en un campo de texto, selecciona una opción o marca un checkbox en cualquier subcomponente de configuración
- **THEN** el valor correspondiente en el objeto del formulario raíz se actualiza automáticamente sin intervención manual.

### Requirement: Gestión de Formulario mediante Inertia
El sistema DEBE utilizar el helper `useForm` de Inertia.js para gestionar el ciclo de vida del formulario de configuración del agente, aprovechando sus capacidades nativas de envío asíncrono y manejo de estados.

#### Scenario: Envío exitoso del formulario
- **WHEN** el usuario envía el formulario completo
- **THEN** el sistema realiza una petición POST asíncrona a la ruta de almacenamiento y maneja la respuesta del servidor.

#### Scenario: Persistencia de errores de validación
- **WHEN** la validación en el servidor falla tras el envío
- **THEN** el objeto del formulario de Inertia expone los errores correspondientes permitiendo su visualización en los subcomponentes afectados.

### Requirement: Inicialización Completa del Esquema de Datos
El objeto del formulario DEBE inicializarse con todas las propiedades requeridas por el contrato de datos del backend para evitar errores de referencia en componentes anidados.

#### Scenario: Renderización de secciones profundas
- **WHEN** el componente `Dashboard.vue` se monta
- **THEN** todas las sub-propiedades del objeto del formulario (ej. `doctor.billing.email`) están definidas, evitando errores de "cannot read property of undefined".
