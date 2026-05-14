## Context

El formulario de configuración del médico en el dashboard está dividido en pestañas gestionadas por el componente `DoctorSection.vue`. Actualmente, estas pestañas se renderizan utilizando `v-if`, lo que provoca que los componentes hijos (como `DoctorServices.vue`) se destruyan y remonten al cambiar de pestaña. A pesar de que se utiliza `defineModel` para sincronizar los datos con el estado global (`useForm` en `Dashboard.vue`), se ha detectado pérdida de persistencia en el frontend, especialmente con estructuras complejas como el arreglo de servicios.

## Goals / Non-Goals

**Goals:**
- Garantizar que los datos introducidos en cualquier pestaña del médico no se pierdan al navegar entre ellas.
- Mantener la integridad del estado del formulario hasta que el usuario decida guardar los cambios.

**Non-Goals:**
- Cambiar la estructura de datos del backend o las migraciones.
- Rediseñar la lógica de negocio de validación de servicios.
- Implementar lógica de validación en tiempo real mientras las pestañas están ocultas.

## Decisions

### 1. Cambio de `v-if` a `v-show` en `DoctorSection.vue`
Se sustituirá el renderizado condicional destructivo (`v-if`) por uno basado en visibilidad (`v-show`). Esto mantendrá las instancias de los componentes vivas en memoria y en el DOM, preservando su estado local (como el índice del servicio expandido) y asegurando que las actualizaciones reactivas al modelo global se mantengan vinculadas sin interrupciones por ciclos de vida de desmontaje.

#### Impacto en Ciclos de Vida y Datos Precargados
Con el cambio a `v-show`, el hook `onMounted` en `DoctorServices.vue` y el resto de pestañas solo se ejecutará **una vez** al cargar `DoctorSection.vue`. Los datos precargados deben mantenerse intactos en memoria al alternar pestañas. Si en el futuro se requiere reaccionar a la visibilidad, se usará un `watch` sobre el estado activo de la pestaña, pero por ahora no es necesario.

### 2. Manejo de Layout y CSS
Para ocultar las pestañas inactivas se utilizará exclusivamente la clase utilitaria `.hidden` (`display: none`) de TailwindCSS. Esto garantiza que no existan interferencias con layouts de tipo Flexbox o Grid en el componente contenedor, ya que los elementos ocultos no ocupan espacio ni afectan al flujo del documento.

### 3. Sincronización de Datos
Los componentes hijos deben seguir utilizando `defineModel` para vincularse bidireccionalmente con el objeto `form` de Inertia definido en el padre, asegurando que ocultar el componente mediante CSS no interfiera con la reactividad global de `useForm`.

## Risks / Trade-offs

- **[Riesgo] Rendimiento del DOM** → Al tener todas las pestañas renderizadas simultáneamente (aunque ocultas), el número de nodos en el DOM aumenta. 
  - *Mitigación*: El formulario del médico es de tamaño moderado; el impacto en el rendimiento es despreciable comparado con el beneficio de la persistencia de datos y la fluidez de navegación.
