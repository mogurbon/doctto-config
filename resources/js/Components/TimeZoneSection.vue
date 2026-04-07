<template>
    <section class="bg-slate-50 border border-gray-200 rounded-lg shadow-sm text-left mb-6">
        <div class="p-6">
            <label for="time_zone" class="block text-sm font-semibold text-gray-700 mb-1">Zona horaria <span class="text-red-500">*</span></label>
            <div class="text-sm text-gray-500 mb-4">Se usará para horarios, recordatorios y reportes.</div>
            <select id="time_zone" name="time_zone" required minlength="3" maxlength="64" class="w-full border-gray-200 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm">
                <option value="">Seleccione una zona horaria...</option>
                <option value="America/Mexico_City" selected>America/Mexico_City</option>
            </select>
            <div id="timeZoneError" style="display:none;" class="mt-2 text-sm text-red-600">Seleccione una zona horaria válida.</div>
        </div>
    </section>
</template>
