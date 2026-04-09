## Why

Actualmente, las pestañas de los días de la semana en la configuración de la sección médica (`DoctorSection.vue`) no tienen reactividad. La interfaz las renderiza como botones estáticos sin `@click` o clases reactivas que muestren el día activo. Esto impide a los usuarios cambiar entre los días de la semana de manera visual y lógica.

## What Changes

- Añadir un estado reactivo (`selectedDay` o similar) para controlar el día activo seleccionado.
- Implementar eventos `@click` en los botones de los días para actualizar el estado sin recargar la página.
- Aplicar clases condicionales de Tailwind CSS para reflejar dinámicamente si la pestaña es el día activo o inactivo (por ejemplo, mostrando el borde azul para el elemento activo y borde gris para los inactivos).

## Capabilities

### New Capabilities
None - This is a bugfix.

### Modified Capabilities
- `doctor-hours-configuration`: Modificar el comportamiento de la UI de horarios del médico asegurando la navegación interactiva y reactiva de los días de la semana en el panel.

## Impact

Este cambio afecta exclusivamente a `resources/js/Components/DoctorSection.vue` en la parte de la vista Frontend. La persistencia en Backend de los horarios permanece inalterada a menos que estos datos no se estuviesen leyendo, lo cual será cubierto en la implementación.
