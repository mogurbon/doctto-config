<script setup>
const model = defineModel({
	type: Object,
	required: true
});
</script>

<template>
	<div>
		<div class="mb-5">
			<h3 class="text-lg font-semibold text-gray-900">Políticas</h3>
			<p class="text-sm text-gray-500">Cancelaciones, cambios, tolerancia, etc.</p>
		</div>
		<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
			<div>
				<label class="block text-sm font-semibold text-gray-700 mb-1">Cancelar sin costo hasta (horas antes)</label>
				<input type="number" v-model="model.cancel_notice" class="w-full border-gray-200 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" min="0" required />
			</div>
			<div>
				<label class="block text-sm font-semibold text-gray-700 mb-1">Tolerancia de llegada (minutos)</label>
				<input type="number" v-model="model.arrival_tolerance" class="w-full border-gray-200 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" min="0" required />
			</div>
		</div>
	</div>
</template>
