<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor ADSO - Aprendices</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0a0a0a] text-gray-100 min-h-screen p-8 font-sans">

    <div class="max-w-5xl mx-auto">
        <!-- Encabezado y Botón Crear -->
        <div class="flex items-center justify-between mb-8 border-b border-[#222222] pb-5">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-white">Lista de Aprendices</h1>
                <p class="text-xs text-gray-500 mt-1 uppercase tracking-wider">Gestor ADSO / Panel Principal</p>
            </div>
            
            <a href="{{ route('aprendices.create') }}" 
                class="px-5 py-2.5 rounded-xl bg-white text-black text-xs uppercase tracking-wider font-bold hover:bg-gray-200 active:scale-95 transition flex items-center gap-2">
                <span>+</span> Agregar Aprendiz
            </a>
        </div>

        <!-- Tabla estilo LABRAH -->
        <div class="bg-[#121212] border border-[#222222] rounded-2xl overflow-hidden shadow-2xl mb-6">
            <table class="w-full text-left text-sm text-gray-300">
                <thead class="bg-[#181818] text-xs uppercase tracking-wider text-gray-400 border-b border-[#222222]">
                    <tr>
                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">Nombre</th>
                        <th class="px-6 py-4">Documento</th>
                        <th class="px-6 py-4">Correo</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#1f1f1f]">
                    @forelse ($aprendices as $aprendiz)
                        <tr class="hover:bg-[#1a1a1a] transition">
                            <td class="px-6 py-4 font-mono text-gray-500">{{ $aprendiz->id }}</td>
                            <td class="px-6 py-4 font-medium text-white">{{ $aprendiz->nombre }}</td>
                            <td class="px-6 py-4 font-mono text-gray-400">{{ $aprendiz->documento }}</td>
                            <td class="px-6 py-4 text-gray-400">{{ $aprendiz->email }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                                No hay aprendices registrados aún.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="flex justify-between items-center text-xs text-gray-500">
            <div>
                {{ $aprendices->links() }}
            </div>
        </div>
    </div>

</body>
</html>