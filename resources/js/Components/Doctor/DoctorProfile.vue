<script setup>
const model = defineModel({
	type: Object,
	required: true
});
</script>

<template>
	<div>
		<div class="mb-5">
			<h3 class="text-lg font-semibold text-gray-900">Perfil del Médico</h3>
			<p class="text-sm text-gray-500">Datos base del médico.</p>
		</div>
		<div class="space-y-6">
			<div>
				<label class="block text-sm font-semibold text-gray-700 mb-1">Nombre <span class="text-red-500">*</span></label>
				<div class="text-sm text-gray-500 mb-2">Nombre del médico.</div>
				<input type="text" v-model="model.name" class="w-full border-gray-200 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" required placeholder="Ej: Dr. Juan Pérez" />
			</div>
			<div>
				<label class="block text-sm font-semibold text-gray-700 mb-1">Especialidad <span class="text-red-500">*</span></label>
				<select v-model="model.specialty" class="w-full border-gray-200 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" required>
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
						<input type="number" v-model="model.age_min" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-l-md border border-gray-200 focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" min="0" required />
						<span class="inline-flex items-center px-3 py-2 rounded-none rounded-r-md border border-l-0 border-gray-200 bg-slate-50 text-gray-700 sm:text-sm">años</span>
					</div>
				</div>
				<div>
					<label class="block text-sm font-semibold text-gray-700 mb-1">Edad máxima <span class="text-red-500">*</span></label>
					<div class="flex rounded-md shadow-sm">
						<input type="number" v-model="model.age_max" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-l-md border border-gray-200 focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" min="0" required />
						<span class="inline-flex items-center px-3 py-2 rounded-none rounded-r-md border border-l-0 border-gray-200 bg-slate-50 text-gray-700 sm:text-sm">años</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
