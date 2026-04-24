## Why

El componente `DoctorServices.vue` es actualmente un mockup estático que no permite la captura real de datos. Para que el agente de IA (n8n) pueda operar correctamente y el sistema guarde la configuración en Laravel, es necesario que este componente sea funcional, permitiendo la gestión dinámica de servicios médicos con todos sus atributos técnicos y de negocio.

## What Changes

- Transformación de `DoctorServices.vue` de un componente estático a uno dinámico basado en `v-model`.
- **Mapeo Integral de Campos**: Implementación de todos los campos, lógica de negocio y estructura de datos basada directamente en el archivo de referencia `~/mockup/partials/doctor/services.php`. El componente Vue debe ser un espejo funcional de este archivo PHP.
- Implementación de una lista reactiva de servicios que permite agregar, editar y eliminar elementos.
- Integración de campos detallados por servicio: categorías, toggles de estado (bloqueado/agendable), descripciones, y listas dinámicas de requisitos (ayuno, documentos, medicamentos, etc.) según se define en el mockup.
- Soporte para lógica de precios (fijo vs. cotización) y duraciones, replicando el comportamiento del original.
- Aplicación de estilos Tailwind CSS coherentes con la paleta de colores del proyecto (slate/blue-900), eliminando dependencias de clases Bootstrap pero preservando la disposición funcional del mockup.
- Implementación de un sistema de acordeón para la edición de servicios individuales.

## Capabilities

### New Capabilities
- `doctor-services-management`: Gestión integral del catálogo de servicios del médico, incluyendo requisitos de preparación, configuración de precios y parámetros para el bot de IA.

### Modified Capabilities
- Ninguna.

## Impact

- **Frontend**: Rediseño completo de `resources/js/Components/Doctor/DoctorServices.vue`.
- **Data Flow**: El objeto `model` emitido contendrá la colección completa de servicios, sincronizada bidireccionalmente.
- **User Experience**: Mejora en la captura de datos críticos para la automatización de citas vía WhatsApp.
