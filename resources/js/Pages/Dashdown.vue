<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Configuración del Consultorio" />

    <AuthenticatedLayout>
        <template #header>
            <div class="mx-auto max-w-4xl">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Configuración del Consultorio
                </h2>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="px-8 py-6 text-gray-900">
                        
                        <div class="py-2">
                            <div class="mb-6">
                                <h1 class="text-2xl font-bold text-gray-900 mb-1">Formulario de Configuración</h1>
                                <p class="text-sm text-gray-500 mb-0">Quick Facts</p>
                            </div>

                            <form id="practiceForm" @submit.prevent>
                                <div class="space-y-6 text-left">

                                    <section class="mb-6" id="doctorsSection">
                                        <div class="flex items-start justify-between gap-3 mb-4">
                                            <div>
                                                <h2 class="text-lg font-semibold text-gray-900 mb-1">Médico</h2>
                                                <div class="text-sm text-gray-500">Configuración del médico.</div>
                                            </div>
                                        </div>

                                        <div id="doctorsList">
                                            <div class="bg-white border border-gray-200 rounded-lg shadow-sm mb-4">
                                                
                                                <div class="flex items-center justify-between px-4 py-3 border-b border-gray-100 bg-gray-50 rounded-t-lg">
                                                    <div class="flex items-center gap-2">
                                                        <span class="font-semibold text-gray-800">Médico</span>
                                                        <span class="inline-flex items-center rounded-full bg-white px-2.5 py-0.5 text-xs font-medium text-gray-600 border border-gray-200">Configuración</span>
                                                    </div>
                                                </div>

                                                <div class="flex flex-col md:flex-row">
                                                    <div class="w-full md:w-1/4 border-b md:border-b-0 md:border-r border-gray-100 bg-white">
                                                        <nav class="flex flex-col" aria-label="Tabs del médico">
                                                            <button type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 border-transparent text-gray-600 hover:bg-gray-50" data-target="profile">Perfil</button>
                                                            <button type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 border-transparent text-gray-600 hover:bg-gray-50" data-target="contact">Contacto</button>
                                                            <button type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 border-transparent text-gray-600 hover:bg-gray-50" data-target="hours">Horarios</button>
                                                            <button type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 border-transparent text-gray-600 hover:bg-gray-50" data-target="rules">Reglas</button>
                                                            <button type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 border-transparent text-gray-600 hover:bg-gray-50" data-target="services">Servicios</button>
                                                            <button type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 border-transparent text-gray-600 hover:bg-gray-50" data-target="policies">Políticas</button>
                                                            <button type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 border-transparent text-gray-600 hover:bg-gray-50" data-target="payments">Pagos</button>
                                                            <button type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 border-indigo-600 text-indigo-700 bg-indigo-50" data-target="billing">Facturación</button>
                                                        </nav>
                                                    </div>

                                                    <div class="w-full md:w-3/4 p-6 bg-white">
                                                        <div class="block" data-panel="billing">
                                                            <div class="mb-5">
                                                                <h3 class="text-lg font-semibold text-gray-900 italic">Facturación</h3>
                                                                <p class="text-sm text-gray-500 italic">Datos para CFDI y contacto de facturación.</p>
                                                            </div>

                                                            <div class="space-y-6">
                                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                                    <div>
                                                                        <label class="block text-sm font-semibold text-gray-700 mb-1 italic">Correo para facturación <span class="text-red-500">*</span></label>
                                                                        <input type="email" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="facturacion@ejemplo.com" required>
                                                                        <p class="text-xs text-gray-400 mt-1 italic">Donde reciben solicitudes de CFDI.</p>
                                                                    </div>

                                                                    <div>
                                                                        <label class="block text-sm font-semibold text-gray-700 mb-1 italic">Límite para solicitar CFDI (horas) <span class="text-red-500">*</span></label>
                                                                        <input type="number" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="72" required>
                                                                        <p class="text-xs text-gray-400 mt-1 italic">Tiempo máximo tras la consulta.</p>
                                                                    </div>
                                                                </div>

                                                                <div>
                                                                    <label class="block text-sm font-semibold text-gray-700 mb-1 italic">Régimen del emisor (SAT) <span class="text-red-500">*</span></label>
                                                                    <select class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                                                        <option value="">Selecciona…</option>
                                                                        <option value="612">612 — Personas Físicas con Actividades Empresariales y Profesionales</option>
                                                                        <option value="626">626 — Régimen Simplificado de Confianza (RESICO)</option>
                                                                        <option value="601">601 — General de Ley Personas Morales</option>
                                                                    </select>
                                                                    <p class="text-xs text-gray-400 mt-1 italic">Tal como aparece en tu Constancia de Situación Fiscal.</p>
                                                                </div>

                                                                <div>
                                                                    <label class="block text-sm font-semibold text-gray-700 mb-1 italic">Notas de facturación</label>
                                                                    <textarea class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" rows="3" placeholder="Ej: Solo se factura en el mes de consumo..."></textarea>
                                                                    <p class="text-xs text-gray-400 mt-1 italic">Cualquier regla o instrucción extra.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    
                                    <div class="w-full pt-4 border-t border-gray-100 flex justify-end gap-3">
                                        <button type="button" class="px-4 py-2 bg-white border border-gray-300 rounded-md font-medium text-gray-700 hover:bg-gray-50">Restablecer</button>
                                        <button type="submit" class="px-4 py-2 bg-green-600 border border-transparent rounded-md font-medium text-white hover:bg-green-700">Guardar</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>