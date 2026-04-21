<script setup>
const model = defineModel({
	type: Object,
	default: () => ({})
});
</script>

<template>
	<div>
		<div class="mb-5">
			<h3 class="text-lg font-semibold text-gray-900">Facturación</h3>
			<p class="text-sm text-gray-500">Datos para CFDI y contacto de facturación。</p>
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
</template>
