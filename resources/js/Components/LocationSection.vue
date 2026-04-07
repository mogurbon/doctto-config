<template>
    <section id="locationSection" class="bg-slate-50 border border-gray-200 rounded-lg shadow-sm text-left mb-6">
        <div class="p-6">
            <div class="flex items-start gap-3 border-b border-gray-200 pb-4 mb-6">
                <div class="text-cyan-500 mt-1" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Ubicación</h3>
                    <p class="text-sm text-gray-500">Datos para que el bot comparta indicaciones.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <div>
                        <label for="location_name" class="block text-sm font-semibold text-gray-700 mb-1">Nombre del lugar <span class="text-red-500">*</span></label>
                        <div class="text-sm text-gray-500 mb-2">Nombre que el paciente reconocerá.</div>
                        <input type="text" id="location_name" name="location_name" required minlength="2" maxlength="100" placeholder="Plaza comercial Galerias" class="w-full border-gray-200 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" />
                    </div>
                    <div>
                        <label for="address_full" class="block text-sm font-semibold text-gray-700 mb-1">Dirección completa <span class="text-red-500">*</span></label>
                        <div class="text-sm text-gray-500 mb-2">Escribe la dirección completa.</div>
                        <textarea id="address_full" name="address_full" required minlength="10" maxlength="400" rows="4" placeholder="Calle, Número, Colonia, Delegación/Municipio, Estado, C.P." class="w-full border-gray-200 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm"></textarea>
                    </div>
                    <div>
                        <label for="arrival_references" class="block text-sm font-semibold text-gray-700 mb-1">Referencias para llegar</label>
                        <div class="text-sm text-gray-500 mb-2">Puntos de referencia fáciles.</div>
                        <textarea id="arrival_references" name="arrival_references" maxlength="400" rows="3" placeholder="Cerca de..., Plaza..., frente a..." class="w-full border-gray-200 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm"></textarea>
                    </div>
                </div>
                <div class="space-y-6">
                    <div>
                        <label for="map_url" class="block text-sm font-semibold text-gray-700 mb-1">Link de Google Maps</label>
                        <div class="text-sm text-gray-500 mb-2">Opcional, pero ayuda al bot a compartir ubicación.</div>
                        <input type="url" id="map_url" name="map_url" placeholder="https://maps.google.com/..." class="w-full border-gray-200 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" />
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">¿Hay estacionamiento?</label>
                        <div class="text-sm text-gray-500 mb-3">Si hay estacionamiento en la plaza/edificio.</div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="parking_available" name="parking_available" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-cyan-500 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-slate-50 after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-slate-50 after:border-gray-200 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-cyan-500"></div>
                            <span class="ml-3 text-sm font-semibold text-gray-900">Sí</span>
                        </label>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-3">Accesibilidad</label>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <input id="accessibility_wheelchair" type="checkbox" value="wheelchair" class="w-4 h-4 text-cyan-500 bg-slate-50 border-gray-200 rounded focus:ring-cyan-500">
                                <label for="accessibility_wheelchair" class="ml-2 text-sm text-gray-700">Acceso silla de ruedas</label>
                            </div>
                            <div class="flex items-center">
                                <input id="accessibility_elevator" type="checkbox" value="elevator" class="w-4 h-4 text-cyan-500 bg-slate-50 border-gray-200 rounded focus:ring-cyan-500">
                                <label for="accessibility_elevator" class="ml-2 text-sm text-gray-700">Elevador</label>
                            </div>
                            <div class="flex items-center">
                                <input id="accessibility_ramps" type="checkbox" value="ramps" class="w-4 h-4 text-cyan-500 bg-slate-50 border-gray-200 rounded focus:ring-cyan-500">
                                <label for="accessibility_ramps" class="ml-2 text-sm text-gray-700">Rampas</label>
                            </div>
                            <div class="flex items-center">
                                <input id="accessibility_accessible_bathroom" type="checkbox" value="accessible_bathroom" class="w-4 h-4 text-cyan-500 bg-slate-50 border-gray-200 rounded focus:ring-cyan-500">
                                <label for="accessibility_accessible_bathroom" class="ml-2 text-sm text-gray-700">Baño accesible</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
