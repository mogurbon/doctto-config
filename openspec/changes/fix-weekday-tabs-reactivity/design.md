## Context

Actualmente, el panel del componente `DoctorSection.vue` maneja pestañas para diferentes configuraciones ("Perfil", "Contacto", "Horarios", etc.) empleando la variable reactiva `activeTab`. Dentro de la pestaña de "Horarios" (`activeTab === 'hours'`), existe una lista de botones estáticos que renderizan los días de la semana ("Lunes", "Martes", "Miércoles", "Jueves", "Viernes"). Estos elementos visuales no cuentan con un estado reactivo de Vue para marcar el día actualmente seleccionado o activo, comportándose simplemente como elementos decorativos.

## Goals / Non-Goals

**Goals:**
- Proporcionar reactividad a las pestañas de días de la semana utilizando la Composition API (`ref`).
- Aplicar eventos `@click` de Vue en los botones correspondientes a cada día.
- Implementar clases reactivas dinámicas (Tailwind CSS) para proporcionar feedback visual de cuál es el día seleccionado actualmente.

**Non-Goals:**
- No se alterará el modelo de datos backend asociado a los horarios (p. ej. cómo se persiste en la BD).
- No se modificará el enrutamiento principal de Inertia; la vista es un componente estático tipo panel sin sub-enrutamiento.

## Decisions

1. **Estado reactivo del día seleccionado**:
   - **Decisión**: Se utilizará `ref` en lugar de `reactive` para guardar un string (el identificador del día seleccionado). Por ejemplo: `const selectedDay = ref('lunes');`.
   - **Razón**: Almacenar un identificador simple como `"lunes"`, `"martes"` representa un primitivo, para lo cual `ref` es lo ideal en la Composition API.

2. **Manejo de Eventos y `@click`**:
   - **Decisión**: Se asignará un handler directo `@click="selectedDay = 'dia'"` en la estructura del `<nav>` del componente o emplear un bucle interactivo de datos como `const days = ['lunes', 'martes', ...]`. El `button` interceptará el clic local y no interferirá con Inertia porque no son componentes `Link` correspondientes al enrutador.
   - **Razón**: Mantener la interactividad en memoria local del componente de Vue evita la recarga innecesaria de la página o parpadeos.

3. **Estilizado (Tailwind CSS)**:
   - **Decisión**: Se implementarán clases condicionales con binding `:class`:
     `[selectedDay === 'lunes' ? 'border-cyan-500 text-cyan-600' : 'border-gray-200 text-gray-500']`
   - **Razón**: Permite la flexibilidad deseada asegurando que el diseño cumpla con los estándares visuales existentes donde el elemento activo posee colores en tonos `cyan-500` - `cyan-600`.

## Risks / Trade-offs

- **Sincronización del "bloque" según el día**:
  - Actualmente, el cuerpo que define la configuración del horario (Bloques, hora de inicio/fin, checkbox "¿Abre este día?") tampoco se adapta según el día marcado. Se debe prever que una vez que haya comportamiento en pestanas, el `form.rules` (u horario) cambie dinámicamente con esta selección.
  - _Mitigación_: Implementar de manera atómica primero la UI (como se pidió en esta etapa), y escalar para enlazar el modelo del día en tareas futuras de ser necesario.
