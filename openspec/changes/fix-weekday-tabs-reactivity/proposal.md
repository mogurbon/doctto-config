## Why
Actualmente, las pestañas de los días de la semana en la configuración de la sección médica (`DoctorSection.vue`) no tienen reactividad. La interfaz las renderiza como botones estáticos sin `@click` o clases reactivas. Esto impide a los usuarios cambiar entre los días de la semana de manera visual y lógica, afectando la experiencia de configuración de horarios en el CRM.

## What Changes
- Refactorizar el estado local de `DoctorSection.vue` para utilizar explícitamente una referencia reactiva del Composition API de Vue 3 (`ref`).
- Modificar el `<template>` para incluir los eventos `@click` que actualicen esta variable y asegurar que las clases CSS reflejen el estado activo de la pestaña seleccionada.