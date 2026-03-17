# Contexto del Proyecto: Configuración Inicial DOCTTO

## 1. Propósito General
Este proyecto es el panel de configuración inicial para "DOCTTO", una plataforma de agentes de inteligencia artificial conversacional que gestiona la agenda médica de consultorios operando exclusivamente vía WhatsApp. El objetivo es eliminar las barreras administrativas automatizando la gestión de citas sin requerir conocimientos técnicos del médico.

## 2. Stack Tecnológico
- Backend: Laravel (ejecutándose en Docker/Sail en entorno Linux Mint).
- Frontend: Inertia.js con componentes de Vue.
- Automatización y Lógica de IA: n8n.

## 3. Arquitectura del Formulario (Flujo Core)
El componente principal en el que estamos trabajando es el formulario de alta/configuración del agente médico. El flujo estricto es el siguiente:
1. El usuario ingresa datos iniciales en el frontend (Vue).
2. Vue dispara un evento asíncrono hacia un Webhook expuesto por un agente en n8n.
3. El agente de n8n procesa la información y devuelve un payload JSON con sugerencias para la configuración del consultorio.
4. Vue recibe el payload y "autocompleta" dinámicamente los campos restantes del formulario para que el usuario los revise.
5. Al hacer submit, Inertia envía el formulario completo al controlador de Laravel para guardar la configuración final en la base de datos.

## 4. Reglas de Negocio a Considerar en la Interfaz
La configuración del agente requiere capturar parámetros críticos para su funcionamiento:
- Sincronización automática con Google Calendar.
- Reglas de agendamiento: Aplicación de bloques de tiempo según la duración del procedimiento médico y respeto de "buffers" (tiempos muertos) entre citas.
- Verificación de requisitos de preparación previa para los pacientes.
- Definición de roles (Owner/Admin) para el Backoffice.

## 5. Instrucciones para la Generación de Código
Cuando se te solicite código para este proyecto:
- Si es Frontend: Asume siempre Vue 3 (Composition API) con Inertia. Incluye la lógica de Axios para consumir el webhook de n8n manejando estados de carga (loading states) mientras n8n responde.
- Si es Backend: Usa controladores de Laravel estándar que devuelvan respuestas con `Inertia::render()`.
- Estilos: Utiliza Tailwind CSS.