<script setup>
const model = defineModel({
	type: Object,
	required: true
});
</script>

<template>
	<div>
		<div class="mb-5">
			<h3 class="text-lg font-semibold text-gray-900">Reglas de agenda</h3>
			<p class="text-sm text-gray-500">Duración, buffers, tolerancia, cupos, etc.</p>
		</div>
		<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
			<div>
				<label class="block text-sm font-semibold text-gray-700 mb-1">Anticipación mínima (horas) <span class="text-red-500">*</span></label>
				<input type="number" v-model="model.min_notice" class="w-full border-gray-200 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" min="0" required />
			</div>
			<div>
				<label class="block text-sm font-semibold text-gray-700 mb-1">Máximo días por adelantado <span class="text-red-500">*</span></label>
				<input type="number" v-model="model.max_ahead" class="w-full border-gray-200 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" min="1" required />
			</div>
		</div>
	</div>
</template>
