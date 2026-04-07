<template>
    <section id="facilitiesSection" class="bg-slate-50 border border-gray-200 rounded-lg shadow-sm text-left mb-6">
        <div class="p-6">
            <div class="flex items-start gap-3 border-b border-gray-200 pb-4 mb-6">
                <div class="text-cyan-500 mt-1" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M3 2.25a.75.75 0 000 1.5v16.5h-.75a.75.75 0 000 1.5h15a.75.75 0 000-1.5h-.75V3.75a.75.75 0 000-1.5h-13.5zM6 6.75A.75.75 0 016.75 6h.5a.75.75 0 01.75.75v.5a.75.75 0 01-.75.75h-.5A.75.75 0 016 7.25v-.5zm0 3.5a.75.75 0 01.75-.75h.5a.75.75 0 01.75.75v.5a.75.75 0 01-.75.75h-.5A.75.75 0 016 7.25v-.5zm0 3.5a.75.75 0 01.75-.75h.5a.75.75 0 01.75.75v.5a.75.75 0 01-.75.75h-.5a.75.75 0 01-.75-.75v-.5zm6-7a.75.75 0 01.75-.75h.5a.75.75 0 01.75.75v.5a.75.75 0 01-.75.75h-.5a.75.75 0 01-.75-.75v-.5zm0 3.5a.75.75 0 01.75-.75h.5a.75.75 0 01.75.75v.5a.75.75 0 01-.75.75h-.5a.75.75 0 01-.75-.75v-.5z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Instalaciones</h3>
                    <p class="text-sm text-gray-500">Datos del consultorio/clínica.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            ¿Tienes sala de espera? <span class="text-red-500">*</span>
                        </label>
                        <div class="text-sm text-gray-500 mb-3">Si el consultorio cuenta con sala de espera.</div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="has_waiting_room" name="has_waiting_room" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-cyan-500 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-slate-50 after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-slate-50 after:border-gray-200 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-cyan-500"></div>
                            <span class="ml-3 text-sm font-semibold text-gray-900">Sí</span>
                        </label>
                    </div>

                    <div id="waitingRoomCapacityWrapper">
                        <label for="waiting_room_capacity" class="block text-sm font-semibold text-gray-700 mb-1">Capacidad de sala de espera</label>
                        <div class="text-sm text-gray-500 mb-2">Opcional. Número aproximado.</div>
                        <div class="flex rounded-md shadow-sm">
                            <input type="number" id="waiting_room_capacity" name="waiting_room_capacity" min="0" max="200" step="1" placeholder="8" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-l-md border border-gray-200 focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" />
                            <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-200 bg-slate-50 text-gray-500 sm:text-sm">
                                personas
                            </span>
                        </div>
                        <div id="waitingRoomCapacityError" style="display:none;" class="mt-1 text-sm text-red-600">
                            Debe estar entre 0 y 200.
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <label for="facility_notes" class="block text-sm font-semibold text-gray-700 mb-1">Comentarios de instalaciones</label>
                        <div class="text-sm text-gray-500 mb-2">Ej: 'Ambiente familiar', 'área para niños', etc.</div>
                        <textarea id="facility_notes" name="facility_notes" rows="5" placeholder="Ambiente familiar..." class="w-full border-gray-200 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
