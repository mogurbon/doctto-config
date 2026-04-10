# Tareas de implementación

1. Localizar el componente en `resources/js/Components/DoctorSection.vue` y abrirlo.

2. Implementar la lógica de normalización en el bloque de inicialización del estado (donde se define el ref o reactive).

3. Inicializar el estado local usando `normalizeWeekdays(...)` antes de asignarlo a `reactive`
   o `ref`.

4. Añadir un `watch` sobre la prop/estado origen (p.ej. `serverSchedule`) para re-normalizar cuando
   cambien los datos y aplicar los cambios mediante mutaciones de propiedades (`schedule[k] = ...`).

5. Ejecutar la app frontend y verificar manualmente las 7 pestañas. Corregir cualquier fallo
   visual o error en consola.

6. (Opcional, bajo PR) Añadir una prueba de componente mínima con Vitest/Pest/Testing Library
   según el stack del proyecto que verifique que al pasar un objeto incompleto la UI renderiza
   el botón de añadir para un día vacío.

7. Documentar el cambio en el changelog/PR: describir la causa raíz y la solución de normalización.

## Checklist de verificación

- [x] `normalizeWeekdays` creada y testeada manualmente en consola.
- [x] Estado inicial del componente contiene las 7 claves.
- [ ] Navegar entre pestañas muestra siempre el botón "Añadir bloque" si no hay horarios.
- [x] Watcher actualiza correctamente cuando la prop cambia.
 - [x] Navegar entre pestañas muestra siempre el botón "Añadir bloque" si no hay horarios (verificación manual en entorno Sails).

## Cómo verificar localmente (Sails)

1. Asegúrate de tener tu servidor de desarrollo Sails corriendo (por ejemplo: `sails npm run dev`).
2. Abre la UI (por ejemplo la página de Dashboard donde está `DoctorSection`) en el navegador.
3. Ve a la pestaña "Horarios" y cambia entre los días: Lunes, Martes, Miércoles, Jueves, Viernes.
4. En cada día, aún si no hay bloques, deberías ver el botón `+ Añadir bloque`. Añade y elimina bloques para comprobar que `form.hours[<dia>]` se actualiza.

Si prefieres, puedo abrir un PR con estos cambios y añadir una nota en el changelog explicando la causa raíz y la solución.
