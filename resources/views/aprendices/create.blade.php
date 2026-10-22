<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor ADSO - Crear Aprendiz</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0a0a0a] text-gray-100 min-h-screen flex items-center justify-center p-6 font-sans">

    <div class="w-full max-w-lg bg-[#121212] border border-[#222222] rounded-2xl p-8 shadow-2xl">
        <div class="mb-8 border-b border-[#222222] pb-4">
            <h1 class="text-2xl font-bold tracking-tight text-white">Registrar Aprendiz</h1>
            <p class="text-xs text-gray-500 mt-1 uppercase tracking-wider">Gestor ADSO / Base de datos</p>
        </div>

        <form action="{{ route('aprendices.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-xs uppercase tracking-wider text-gray-400 font-medium mb-2">Nombre Completo</label>
                <input type="text" name="nombre" placeholder="Ej. Gabriel Labrador" required 
                    class="w-full bg-[#181818] border border-[#2a2a2a] rounded-xl px-4 py-3 text-sm text-white placeholder-gray-600 focus:outline-none focus:border-white transition">
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-gray-400 font-medium mb-2">Documento de Identidad</label>
                <input type="text" name="documento" placeholder="1000000000" required 
                    class="w-full bg-[#181818] border border-[#2a2a2a] rounded-xl px-4 py-3 text-sm text-white placeholder-gray-600 focus:outline-none focus:border-white transition">
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-gray-400 font-medium mb-2">Correo Electrónico</label>
                <input type="email" name="email" placeholder="correo@ejemplo.com" required 
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
        </form>
    </div>

</body>
</html>