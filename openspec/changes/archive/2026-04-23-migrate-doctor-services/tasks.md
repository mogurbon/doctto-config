## 1. Preparación y Script Setup

- [x] 1.1 Implementar la función `createEmptyService()` con todos los campos por defecto mapeados desde `services.php`.
- [x] 1.2 Definir la `ref` reactiva `expandedServiceIndex` para el control del acordeón.
- [x] 1.3 Implementar el hook `onMounted` para asegurar la inicialización de `model.value.services`.
- [x] 1.4 Crear los métodos auxiliares `addService()`, `removeService(index)`, `toggleExpand(index)`.
- [x] 1.5 Implementar guardas de seguridad en el template: usar `v-if="model.services"` (o similar) en el contenedor principal para prevenir errores de lectura en el montaje inicial antes de que `onMounted` asigne el array vacío.

## 2. Estructura Base del Template y Lista de Servicios

- [x] 2.1 Refactorizar el encabezado y el contenedor principal con estilos Tailwind (slate/blue-900).
- [x] 2.2 Implementar la lista de índice de servicios (vista resumida) que muestra nombre, duración y precio.
- [x] 2.3 Añadir el botón principal "Agregar servicio" vinculado a `addService()`.
- [x] 2.4 Implementar el estado vacío cuando no hay servicios capturados.

## 3. Formulario de Detalle del Servicio (Acordeón)

- [x] 3.1 Crear el contenedor del formulario de edición vinculado a `expandedServiceIndex`.
- [x] 3.2 Implementar la sección de Header del servicio: Nombre, Categoría y botón de Eliminar (con validación de `locked`).
- [x] 3.3 Implementar los toggles de configuración: "Bloqueado" y "Agendable por bot".
- [x] 3.4 Implementar los campos de texto descriptivos: "¿En qué consiste?" y "Notas / limitaciones".

## 4. Gestión de Listas Dinámicas y Requisitos

- [x] 4.1 Implementar la gestión de la lista "Incluye" (v-for con inputs e iconos de agregar/quitar).
- [x] 4.2 Implementar la gestión de la lista "Documentos necesarios".
- [x] 4.3 Implementar la gestión de la lista "Medicamentos a suspender".
- [x] 4.4 Implementar la sección de "Links útiles" con campos para etiqueta y URL.

## 5. Configuración Técnica y Precios

- [x] 5.1 Implementar el selector de "Duración aproximada" con límites y pasos de 5 min.
- [x] 5.2 Implementar la lógica condicional de Precio: selector de tipo y campo numérico o notas según corresponda.
- [x] 5.3 Implementar la sección de "Ayuno": toggle y campo de horas condicional.
- [x] 5.4 Implementar el campo de "Llegar antes" (minutos).

## 6. Validación Final y Estilos

- [x] 6.1 Realizar una limpieza final de cualquier clase de Bootstrap remanente.
- [x] 6.2 Verificar la reactividad bidireccional de todos los campos con el objeto `model`.
- [x] 6.3 Asegurar que el diseño sea responsivo y coherente con la paleta de colores.
