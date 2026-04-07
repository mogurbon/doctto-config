<script setup>
import { ref } from 'vue';

const props = defineProps({
    modelValue: {
        type: Object,
        required: true,
    }
});

const emit = defineEmits(['update:modelValue']);
const form = props.modelValue;

const activeTab = ref('profile');
</script>

<template>
    <section class="mb-6" id="doctorsSection">
        <div class="flex items-start justify-between gap-3 mb-4">
            <div>
                <h2 class="text-lg font-semibold text-gray-900 mb-1">Médico</h2>
                <div class="text-sm text-gray-500">Configuración del médico.</div>
            </div>
        </div>

        <div id="doctorsList">
            <div class="bg-slate-50 border border-gray-200 rounded-lg shadow-sm mb-4">
                
                <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200 bg-slate-50 rounded-t-lg">
                    <div class="flex items-center gap-2">
                        <span class="font-semibold text-gray-800">Médico</span>
                        <span class="inline-flex items-center rounded-full bg-slate-50 px-2.5 py-0.5 text-xs font-medium text-gray-600 border border-gray-200">Configuración</span>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row">
                    <div class="w-full md:w-1/4 border-b md:border-b-0 md:border-r border-gray-200 bg-slate-50">
                        <nav class="flex flex-col" aria-label="Tabs del médico">
                            <button @click="activeTab = 'profile'" type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 transition-colors" :class="activeTab === 'profile' ? 'border-cyan-500 text-cyan-700 bg-cyan-50' : 'border-gray-200 text-gray-600 hover:bg-slate-50'">Perfil</button>
                            <button @click="activeTab = 'contact'" type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 transition-colors" :class="activeTab === 'contact' ? 'border-cyan-500 text-cyan-700 bg-cyan-50' : 'border-gray-200 text-gray-600 hover:bg-slate-50'">Contacto</button>
                            <button @click="activeTab = 'hours'" type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 transition-colors" :class="activeTab === 'hours' ? 'border-cyan-500 text-cyan-700 bg-cyan-50' : 'border-gray-200 text-gray-600 hover:bg-slate-50'">Horarios</button>
                            <button @click="activeTab = 'rules'" type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 transition-colors" :class="activeTab === 'rules' ? 'border-cyan-500 text-cyan-700 bg-cyan-50' : 'border-gray-200 text-gray-600 hover:bg-slate-50'">Reglas</button>
                            <button @click="activeTab = 'services'" type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 transition-colors" :class="activeTab === 'services' ? 'border-cyan-500 text-cyan-700 bg-cyan-50' : 'border-gray-200 text-gray-600 hover:bg-slate-50'">Servicios</button>
                            <button @click="activeTab = 'policies'" type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 transition-colors" :class="activeTab === 'policies' ? 'border-cyan-500 text-cyan-700 bg-cyan-50' : 'border-gray-200 text-gray-600 hover:bg-slate-50'">Políticas</button>
                            <button @click="activeTab = 'payments'" type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 transition-colors" :class="activeTab === 'payments' ? 'border-cyan-500 text-cyan-700 bg-cyan-50' : 'border-gray-200 text-gray-600 hover:bg-slate-50'">Pagos</button>
                            <button @click="activeTab = 'billing'" type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 transition-colors" :class="activeTab === 'billing' ? 'border-cyan-500 text-cyan-700 bg-cyan-50' : 'border-gray-200 text-gray-600 hover:bg-slate-50'">Facturación</button>
                        </nav>
                    </div>

                    <div class="w-full md:w-3/4 p-6 bg-slate-50">

                        <div v-if="activeTab === 'profile'">
                            <div class="mb-5">
                                <h3 class="text-lg font-semibold text-gray-900">Perfil del Médico</h3>
                                <p class="text-sm text-gray-500">Datos base del médico.</p>
                            </div>
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nombre <span class="text-red-500">*</span></label>
                                    <div class="text-sm text-gray-500 mb-2">Nombre del médico.</div>
                                    <input type="text" v-model="form.profile.name" class="w-full border-gray-200 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" required placeholder="Ej: Dr. Juan Pérez" />
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Especialidad <span class="text-red-500">*</span></label>
                                    <select v-model="form.profile.specialty" class="w-full border-gray-200 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" required>
                                        <option value="" disabled>Seleccione…</option>
                                        <option value="pediatria">Pediatría</option>
                                        <option value="medicina_general">Medicina General</option>
                                        <option value="ginecologia">Ginecología</option>
                                        <option value="otro">Otro</option>
                                    </select>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-1">Edad mínima <span class="text-red-500">*</span></label>
                                        <div class="flex rounded-md shadow-sm">
                                            <input type="number" v-model="form.profile.age_min" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-l-md border border-gray-200 focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" min="0" required />
                                            <span class="inline-flex items-center px-3 py-2 rounded-none rounded-r-md border border-l-0 border-gray-200 bg-slate-50 text-gray-700 sm:text-sm">años</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-1">Edad máxima <span class="text-red-500">*</span></label>
                                        <div class="flex rounded-md shadow-sm">
                                            <input type="number" v-model="form.profile.age_max" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-l-md border border-gray-200 focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" min="0" required />
                                            <span class="inline-flex items-center px-3 py-2 rounded-none rounded-r-md border border-l-0 border-gray-200 bg-slate-50 text-gray-700 sm:text-sm">años</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div v-if="activeTab === 'contact'">
                            <div class="mb-5">
                                <h3 class="text-lg font-semibold text-gray-900">Contacto</h3>
                                <p class="text-sm text-gray-500">Datos para que los pacientes puedan comunicarse contigo.</p>
                            </div>
                            <div class="space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-1">Teléfono / WhatsApp <span class="text-red-500">*</span></label>
                                        <div class="flex rounded-md shadow-sm">
                                            <span class="inline-flex items-center px-3 py-2 rounded-none rounded-l-md border border-r-0 border-gray-200 bg-slate-50 text-gray-700 sm:text-sm">🇲🇽 +52</span>
                                            <input type="tel" v-model="form.contact.phone" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md border border-gray-200 focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" required placeholder="55 1234 5678" />
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-1">Correo de contacto <span class="text-red-500">*</span></label>
                                        <input type="email" v-model="form.contact.email" class="w-full border-gray-200 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" required placeholder="doctor@ejemplo.com" />
                                    </div>
                                </div>
                                <div class="mt-6 border-t border-gray-200 pt-6">
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Medio de contacto preferido <span class="text-red-500">*</span></label>
                                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mt-4">
                                        <label class="relative flex flex-col items-center justify-center p-4 border rounded-lg cursor-pointer hover:bg-slate-50" :class="form.contact.preferred === 'whatsapp' ? 'border-cyan-500 bg-cyan-50 text-cyan-700' : 'border-gray-200 text-gray-500'">
                                            <input type="radio" v-model="form.contact.preferred" value="whatsapp" class="sr-only">
                                            <span class="font-medium">WhatsApp</span>
                                        </label>
                                        <label class="relative flex flex-col items-center justify-center p-4 border rounded-lg cursor-pointer hover:bg-slate-50" :class="form.contact.preferred === 'telefono' ? 'border-cyan-500 bg-cyan-50 text-cyan-700' : 'border-gray-200 text-gray-500'">
                                            <input type="radio" v-model="form.contact.preferred" value="telefono" class="sr-only">
                                            <span class="font-medium">Teléfono</span>
                                        </label>
                                        <label class="relative flex flex-col items-center justify-center p-4 border rounded-lg cursor-pointer hover:bg-slate-50" :class="form.contact.preferred === 'correo' ? 'border-cyan-500 bg-cyan-50 text-cyan-700' : 'border-gray-200 text-gray-500'">
                                            <input type="radio" v-model="form.contact.preferred" value="correo" class="sr-only">
                                            <span class="font-medium">Correo</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div v-if="activeTab === 'hours'">
                            <div class="mb-5">
                                <h3 class="text-lg font-semibold text-gray-900">Horarios de atención</h3>
                                <p class="text-sm text-gray-500">Define en qué días y horarios atiende este médico.</p>
                            </div>
                            <div class="border-b border-gray-200 mb-4">
                                <nav class="-mb-px flex space-x-4 overflow-x-auto">
                                    <button type="button" class="border-cyan-500 text-cyan-600 py-2 px-1 border-b-2 font-medium text-sm">Lunes</button>
                                    <button type="button" class="border-gray-200 text-gray-500 py-2 px-1 border-b-2 font-medium text-sm">Martes</button>
                                    <button type="button" class="border-gray-200 text-gray-500 py-2 px-1 border-b-2 font-medium text-sm">Miércoles</button>
                                    <button type="button" class="border-gray-200 text-gray-500 py-2 px-1 border-b-2 font-medium text-sm">Jueves</button>
                                    <button type="button" class="border-gray-200 text-gray-500 py-2 px-1 border-b-2 font-medium text-sm">Viernes</button>
                                </nav>
                            </div>
                            <div class="bg-slate-50 p-4 rounded-lg border border-gray-200 mb-6">
                                <div class="flex items-center justify-between mb-4">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" checked class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:ring-cyan-500 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-slate-50 after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-slate-50 after:border-gray-200 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-cyan-500"></div>
                                        <span class="ml-3 text-sm font-semibold text-gray-900">¿Abre este día?</span>
                                    </label>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-slate-50 border border-gray-200 text-gray-700">Bloque 1</span>
                                    <div class="flex items-center">
                                        <span class="text-sm text-gray-500 mr-2">Inicio</span>
                                        <input type="time" value="09:00" class="border-gray-200 rounded-md shadow-sm sm:text-sm">
                                    </div>
                                    <div class="flex items-center">
                                        <span class="text-sm text-gray-500 mr-2">Fin</span>
                                        <input type="time" value="18:00" class="border-gray-200 rounded-md shadow-sm sm:text-sm">
                                    </div>
                                    <button type="button" class="text-red-500 hover:text-red-700 p-1">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </div>
                                <div class="mt-4">
                                    <button type="button" class="text-sm text-cyan-500 font-medium">+ Añadir bloque</button>
                                </div>
                            </div>
                        </div>

                        <div v-if="activeTab === 'rules'">
                            <div class="mb-5">
                                <h3 class="text-lg font-semibold text-gray-900">Reglas de agenda</h3>
                                <p class="text-sm text-gray-500">Duración, buffers, tolerancia, cupos, etc.</p>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Anticipación mínima (horas) <span class="text-red-500">*</span></label>
                                    <input type="number" v-model="form.rules.min_notice" class="w-full border-gray-200 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" min="0" required />
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Máximo días por adelantado <span class="text-red-500">*</span></label>
                                    <input type="number" v-model="form.rules.max_ahead" class="w-full border-gray-200 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" min="1" required />
                                </div>
                            </div>
                        </div>

                        <div v-if="activeTab === 'services'">
                            <div class="mb-5">
                                <h3 class="text-lg font-semibold text-gray-900">Servicios</h3>
                                <p class="text-sm text-gray-500">Configura el catálogo de servicios: nombre, duración, precio y requisitos.</p>
                            </div>
                            <div class="border border-gray-200 rounded-lg overflow-hidden mb-6">
                                <div class="bg-slate-50 px-4 py-2 border-b border-gray-200 flex justify-between items-center">
                                    <span class="text-xs font-bold text-gray-500 uppercase">Servicio</span>
                                    <span class="text-xs font-bold text-gray-500 uppercase">Acción</span>
                                </div>
                                <div class="divide-y divide-gray-200">
                                    <div class="px-4 py-3 flex justify-between items-center bg-slate-50">
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">Consulta General</p>
                                            <p class="text-xs text-gray-500">30 min • $800.00 MXN</p>
                                        </div>
                                        <button type="button" class="text-cyan-500 hover:text-cyan-900 text-sm font-medium italic underline">Editar</button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="inline-flex items-center px-3 py-1.5 border border-cyan-500 text-cyan-500 rounded-md text-sm font-medium hover:bg-cyan-50 mb-4">
                                + Agregar servicio
                            </button>
                        </div>

                        <div v-if="activeTab === 'policies'">
                            <div class="mb-5">
                                <h3 class="text-lg font-semibold text-gray-900">Políticas</h3>
                                <p class="text-sm text-gray-500">Cancelaciones, cambios, tolerancia, etc.</p>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Cancelar sin costo hasta (horas antes)</label>
                                    <input type="number" class="w-full border-gray-200 rounded-md shadow-sm sm:text-sm" min="0" value="2" required />
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Tolerancia de llegada (minutos)</label>
                                    <input type="number" class="w-full border-gray-200 rounded-md shadow-sm sm:text-sm" min="0" value="15" required />
                                </div>
                            </div>
                        </div>

                        <div v-if="activeTab === 'payments'">
                            <div class="mb-5">
                                <h3 class="text-lg font-semibold text-gray-900">Pagos</h3>
                                <p class="text-sm text-gray-500">Métodos, reglas de cobro y meses sin intereses.</p>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Métodos de pago aceptados</label>
                                    <div class="grid grid-cols-2 gap-3">
                                        <label class="flex items-center space-x-2"><input type="checkbox" checked class="w-4 h-4 text-cyan-500 border-gray-200 rounded"><span class="text-sm text-gray-600">Efectivo</span></label>
                                        <label class="flex items-center space-x-2"><input type="checkbox" checked class="w-4 h-4 text-cyan-500 border-gray-200 rounded"><span class="text-sm text-gray-600">Tarjeta</span></label>
                                        <label class="flex items-center space-x-2"><input type="checkbox" class="w-4 h-4 text-cyan-500 border-gray-200 rounded"><span class="text-sm text-gray-600">Transferencia</span></label>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Regla de cobro</label>
                                    <select class="w-full border-gray-200 rounded-md shadow-sm sm:text-sm">
                                        <option value="at_reception">Al llegar a recepción</option>
                                        <option value="after_consultation">Al finalizar la consulta</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div v-if="activeTab === 'billing'">
                            <div class="mb-5">
                                <h3 class="text-lg font-semibold text-gray-900">Facturación</h3>
                                <p class="text-sm text-gray-500">Datos para CFDI y contacto de facturación.</p>
                            </div>
                            <div class="space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-1">Correo para facturación</label>
                                        <input type="email" class="w-full border-gray-200 rounded-md shadow-sm sm:text-sm" placeholder="facturacion@ejemplo.com" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-1">Límite para solicitar CFDI (horas)</label>
                                        <input type="number" class="w-full border-gray-200 rounded-md shadow-sm sm:text-sm" value="72" required>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Régimen del emisor (SAT)</label>
                                    <select class="w-full border-gray-200 rounded-md shadow-sm sm:text-sm" required>
                                        <option value="">Selecciona…</option>
                                        <option value="612">612 — Personas Físicas con Actividades Empresariales</option>
                                        <option value="626">626 — Régimen Simplificado de Confianza (RESICO)</option>
                                        <option value="601">601 — General de Ley Personas Morales</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
