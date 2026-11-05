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

        <form action="{{ route('aprendices.store') }}" method="POST">
            @include('aprendices._form', ['aprendiz' => $aprendiz])
        </form>
    </div>

</body>
</html>