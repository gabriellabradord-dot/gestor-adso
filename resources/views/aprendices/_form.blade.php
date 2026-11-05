@csrf


@if ($errors->any())
    <div class="mb-6 p-4 rounded-xl bg-red-950/40 border border-red-900/50 text-red-400 text-xs space-y-1">
        <strong class="font-bold uppercase tracking-wider">Por favor corrige los siguientes errores:</strong>
        <ul class="list-disc list-inside mt-1">
            @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="space-y-6">
    <div>
        <label class="block text-xs uppercase tracking-wider text-gray-400 font-medium mb-2">Nombre Completo</label>
        <input type="text" name="nombre" value="{{ old('nombre', $aprendiz->nombre ?? '') }}" placeholder="Ej. Gabriel Labrador" required 
            class="w-full bg-[#181818] border border-[#2a2a2a] rounded-xl px-4 py-3 text-sm text-white placeholder-gray-600 focus:outline-none focus:border-white transition">
    </div>

    <div>
        <label class="block text-xs uppercase tracking-wider text-gray-400 font-medium mb-2">Documento de Identidad</label>
        <input type="text" name="documento" value="{{ old('documento', $aprendiz->documento ?? '') }}" placeholder="1000000000" required 
            class="w-full bg-[#181818] border border-[#2a2a2a] rounded-xl px-4 py-3 text-sm text-white placeholder-gray-600 focus:outline-none focus:border-white transition">
    </div>

    <div>
        <label class="block text-xs uppercase tracking-wider text-gray-400 font-medium mb-2">Correo Electrónico</label>
        <input type="email" name="correo" value="{{ old('correo', $aprendiz->correo ?? '') }}" placeholder="correo@ejemplo.com" required 
            class="w-full bg-[#181818] border border-[#2a2a2a] rounded-xl px-4 py-3 text-sm text-white placeholder-gray-600 focus:outline-none focus:border-white transition">
    </div>

    <div>
        <label class="block text-xs uppercase tracking-wider text-gray-400 font-medium mb-2">ID de Ficha (Opcional)</label>
        <input type="number" name="ficha_id" value="{{ old('ficha_id', $aprendiz->ficha_id ?? '') }}" placeholder="3412760" 
            class="w-full bg-[#181818] border border-[#2a2a2a] rounded-xl px-4 py-3 text-sm text-white placeholder-gray-600 focus:outline-none focus:border-white transition">
    </div>

    <div class="flex items-center justify-end space-x-3 pt-4 border-t border-[#222222]">
        <a href="{{ route('aprendices.index') }}" 
            class="px-5 py-2.5 rounded-xl border border-[#2a2a2a] text-xs uppercase tracking-wider font-semibold text-gray-400 hover:text-white hover:bg-[#1a1a1a] transition">
            Cancelar
        </a>
        <button type="submit" 
            class="px-5 py-2.5 rounded-xl bg-white text-black text-xs uppercase tracking-wider font-bold hover:bg-gray-200 active:scale-95 transition">
            Guardar
        </button>
    </div>
</div>