## 1. Configuración de Tema y Tipografía

- [ ] 1.1 Incluir fuente `Inter` o `Geist` en la hoja de estilos principal (`resources/css/app.css` o equivalente).
- [ ] 1.2 Configurar `tailwind.config.js` para usar la nueva tipografía como sans-serif principal y verificar la familia de colores (especial atención al primario `#0ea5e9`).

## 2. Creación de Componentes Base UI (Estilo Stripe/Clínico)

- [ ] 2.1 Crear/Refactorizar componente contenedor (`ClinicalCard.vue` o similar) con fondo blanco, bordes `border-gray-200`, y sombra suave `shadow-sm`.
- [ ] 2.2 Crear/Refactorizar componente de input de texto (`ClinicalInput.vue` u otro) usando padding generoso, bordes limpios y un efecto focus `ring-1 ring-cyan-500`.
- [ ] 2.3 Crear/Refactorizar componente de selector/dropdown alineado al mismo diseño.

## 3. Refactorización del Layout del Formulario Principal

- [ ] 3.1 Actualizar el fondo de la pantalla madre a `slate-50`.
- [ ] 3.2 Distribuir los campos de configuración en tres segmentos visualmente definidos utilizando las tarjetas base: 1. Paciente, 2. Consulta, 3. Agente.
- [ ] 3.3 Ajustar los `v-model` o event emissions para garantizar que el formulario siga recogiendo y almacenando estado sin cambiar la lógica original.

## 4. Implementación de los Estados de Carga (Webhook n8n)

- [ ] 4.1 Implementar un esqueleto de carga (skeleton loader) o atenuador (opacity-50 + spinner) para los componentes autocompletables.
- [ ] 4.2 Enlazar el estado de carga (`isLoading` o similar) con la función asíncrona que dispara el evento a n8n.
- [ ] 4.3 Verificar que el flujo visual sea completamente suave: clic -> estado de carga -> autocompletado -> formulario habilitado para revisión.
