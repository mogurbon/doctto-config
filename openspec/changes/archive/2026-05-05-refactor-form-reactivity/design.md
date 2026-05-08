## Contexto

El proyecto Doctto-staff cuenta con un Dashboard de configuración modular. Actualmente, el estado se maneja con un objeto `reactive` en `Dashboard.vue` que se inyecta o pasa a componentes hijos, pero la falta de directivas `v-model` y el uso inconsistente de la reactividad impiden que los cambios realizados por el usuario en los subcomponentes lleguen al estado principal. Esto resulta en el envío de formularios incompletos al servidor.

## Objetivos / No-Objetivos

**Objetivos:**
- Implementar un flujo de datos bidireccional (two-way binding) consistente desde los inputs nativos hasta el formulario raíz.
- Estandarizar el uso de `defineModel` en componentes de sección y subcomponentes.
- Utilizar `useForm` de Inertia.js para gestionar el ciclo de vida del formulario (envío, estados de carga, errores).

**No-Objetivos:**
- Realizar cambios en el backend (Controladores, Modelos, Migraciones).
- Modificar el diseño visual, clases de Tailwind o la disposición de los elementos.
- Refactorizar lógica que no esté relacionada con la recolección de datos del formulario.

## Decisiones

### 1. Uso de `defineModel()` para la comunicación entre componentes
Se ha decidido utilizar la macro `defineModel()` en todos los componentes hijos que necesiten sincronizar datos con el padre.
- **Razón**: Proporciona una sintaxis más concisa y legible que el patrón tradicional de `props` + `emit('update:modelValue')`, integrándose perfectamente con `v-model` en el componente padre.
- **Alternativa**: `provide/inject`. Se descartó porque oscurece el origen de los datos y dificulta el seguimiento del flujo en componentes altamente modulares.

### 2. Inicialización profunda del objeto en `useForm`
El objeto inicial pasado a `useForm` en `Dashboard.vue` incluirá todas las claves anidadas necesarias (`location.*`, `facilities.*`, `doctor.profile.*`, etc.).
- **Razón**: Vue requiere que las propiedades existan para que la reactividad sea rastreable. Inicializar estos objetos evita errores de tipo "undefined" al intentar hacer binding en niveles profundos.

### 3. Binding directo a inputs nativos
En los subcomponentes de último nivel (hojas), se vincularán los inputs directamente al modelo definido por `defineModel`.
- **Razón**: Asegura que cada pulsación de tecla o cambio de selección actualice instantáneamente el estado del formulario en `Dashboard.vue`.

## Riesgos / Trade-offs

- **[Riesgo]** Omisión de campos: Al haber muchos subcomponentes, existe el riesgo de olvidar vincular algún input específico.
  - **Mitigación**: Realizar una auditoría archivo por archivo de la carpeta `Components/` comparándola con los campos esperados por el controlador.
- **[Trade-off]** Tamaño del componente raíz: `Dashboard.vue` tendrá una definición de objeto inicial más extensa.
  - **Mitigación**: Se acepta este trade-off en favor de tener una fuente de verdad única y clara para todo el formulario de configuración.
