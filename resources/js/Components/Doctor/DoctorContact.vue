<script setup>
const model = defineModel({
	type: Object,
	required: true
});
</script>

<template>
	<div>
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
						<input type="tel" v-model="model.phone" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md border border-gray-200 focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" required placeholder="55 1234 5678" />
					</div>
				</div>
				<div>
					<label class="block text-sm font-semibold text-gray-700 mb-1">Correo de contacto <span class="text-red-500">*</span></label>
					<input type="email" v-model="model.email" class="w-full border-gray-200 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" required placeholder="doctor@ejemplo.com" />
				</div>
			</div>
			<div class="mt-6 border-t border-gray-200 pt-6">
				<label class="block text-sm font-semibold text-gray-700 mb-1">Medio de contacto preferido <span class="text-red-500">*</span></label>
				<div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mt-4">
					<label class="relative flex flex-col items-center justify-center p-4 border rounded-lg cursor-pointer hover:bg-slate-50" :class="model.preferred === 'whatsapp' ? 'border-cyan-500 bg-cyan-50 text-cyan-700' : 'border-gray-200 text-gray-500'">
						<input type="radio" v-model="model.preferred" value="whatsapp" class="sr-only">
						<span class="font-medium">WhatsApp</span>
					</label>
					<label class="relative flex flex-col items-center justify-center p-4 border rounded-lg cursor-pointer hover:bg-slate-50" :class="model.preferred === 'telefono' ? 'border-cyan-500 bg-cyan-50 text-cyan-700' : 'border-gray-200 text-gray-500'">
						<input type="radio" v-model="model.preferred" value="telefono" class="sr-only">
						<span class="font-medium">Teléfono</span>
					</label>
					<label class="relative flex flex-col items-center justify-center p-4 border rounded-lg cursor-pointer hover:bg-slate-50" :class="model.preferred === 'correo' ? 'border-cyan-500 bg-cyan-50 text-cyan-700' : 'border-gray-200 text-gray-500'">
						<input type="radio" v-model="model.preferred" value="correo" class="sr-only">
						<span class="font-medium">Correo</span>
					</label>
				</div>
			</div>
		</div>
	</div>
</template>
