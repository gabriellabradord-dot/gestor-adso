<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor ADSO - Lista de Aprendices</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0a0a0a] text-gray-100 min-h-screen p-8 font-sans">

    <div class="max-w-6xl mx-auto">
        <!-- Encabezado -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 border-b border-[#222222] pb-4 gap-4">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-white">Lista de Aprendices</h1>
                <p class="text-xs text-gray-500 mt-1 uppercase tracking-wider">Gestor ADSO / Panel Principal</p>
            </div>
            <a href="{{ route('aprendices.create') }}" 
                class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-white text-black text-xs uppercase tracking-wider font-bold hover:bg-gray-200 active:scale-95 transition">
                + Nuevo Aprendiz
            </a>
        </div>

        <!-- Mensaje Flash de Éxito -->
        @if(session('ok'))
            <div class="mb-6 p-4 rounded-xl bg-emerald-950/40 border border-emerald-900/50 text-emerald-400 text-xs">
                {{ session('ok') }}
            </div>
        @endif

        <!-- Barra de Búsqueda -->
        <div class="mb-6">
            <form action="{{ route('aprendices.index') }}" method="GET" class="flex gap-3">
                <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="Buscar por nombre o documento..." 
                    class="bg-[#121212] border border-[#222222] rounded-xl px-4 py-2.5 text-sm text-white placeholder-gray-600 focus:outline-none focus:border-white transition flex-1 max-w-sm">
                <button type="submit" 
                    class="px-4 py-2.5 rounded-xl border border-[#2a2a2a] text-xs uppercase tracking-wider font-semibold text-gray-300 hover:text-white hover:bg-[#1a1a1a] transition">
                    Buscar
                </button>
                @if(!empty($q))
                    <a href="{{ route('aprendices.index') }}" 
                        class="px-4 py-2.5 rounded-xl border border-[#2a2a2a] text-xs uppercase tracking-wider font-semibold text-gray-500 hover:text-white flex items-center transition">
                        Limpiar
                    </a>
                @endif
            </form>
        </div>

        <!-- Tabla de Registros -->
        <div class="bg-[#121212] border border-[#222222] rounded-2xl overflow-hidden shadow-2xl">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-[#222222] text-gray-500 text-[11px] uppercase tracking-wider">
                        <th class="p-4 font-medium">ID</th>
                        <th class="p-4 font-medium">Nombre</th>
                        <th class="p-4 font-medium">Documento</th>
                        <th class="p-4 font-medium">Correo</th>
                        <th class="p-4 font-medium text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#1c1c1c] text-sm">
                    @forelse($aprendices as $a)
                        <tr class="hover:bg-[#161616] transition">
                            <td class="p-4 text-gray-500">{{ $a->id }}</td>
                            <td class="p-4 font-medium text-white">{{ $a->nombre }}</td>
                            <td class="p-4 text-gray-400">{{ $a->documento }}</td>
                            <td class="p-4 text-gray-400">{{ $a->correo }}</td>
                            <td class="p-4 text-right space-x-2">
                                <a href="{{ route('aprendices.edit', $a) }}" 
                                    class="inline-block px-3 py-1.5 rounded-lg border border-[#2a2a2a] text-xs font-semibold text-gray-300 hover:text-white hover:bg-[#1f1f1f] transition">
                                    Editar
                                </a>
                                <form action="{{ route('aprendices.destroy', $a) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar este aprendiz?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="px-3 py-1.5 rounded-lg border border-red-950 text-xs font-semibold text-red-400 hover:bg-red-950/40 transition">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-500 text-sm">
                                No se encontraron registros de aprendices.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="mt-6">
            {{ $aprendices->links() }}
        </div>
    </div>

</body>
</html>