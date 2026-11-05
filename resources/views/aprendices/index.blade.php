<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#17613f">
    <title>Gestor ADSO | Aprendices</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700|space-grotesk:500,600,700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="apprentices-page">
    <main class="apprentices-shell">
        <header class="apprentices-header">
            <div>
                <p class="apprentices-eyebrow">Gestor ADSO · Panel principal</p>
                <h1>Aprendices</h1>
                <p class="apprentices-subtitle">Consulta y administra los registros de formación.</p>
            </div>
            <a class="apprentices-primary" href="{{ route('aprendices.create') }}"><span aria-hidden="true">+</span> Nuevo aprendiz</a>
        </header>

        @if(session('ok'))
            <div class="apprentices-flash" role="status">{{ session('ok') }}</div>
        @endif

        <section class="apprentices-toolbar" aria-label="Herramientas de aprendices">
            <p class="apprentices-total"><strong>{{ number_format($aprendices->total()) }}</strong> aprendices registrados</p>
            <form action="{{ route('aprendices.index') }}" method="GET" class="apprentices-search" role="search">
                <input type="search" name="q" value="{{ $q ?? '' }}" placeholder="Buscar nombre o documento..." aria-label="Buscar por nombre o documento">
                <button class="apprentices-search-button" type="submit">Buscar</button>
                @if(!empty($q))
                    <a class="apprentices-clear" href="{{ route('aprendices.index') }}">Limpiar</a>
                @endif
            </form>
        </section>

        <div class="apprentices-table-wrap">
            <table class="learners-table">
                <thead>
                    <tr>
                        <th scope="col">N.º</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Documento</th>
                        <th scope="col">Correo electrónico</th>
                        <th scope="col" class="learner-actions">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($aprendices as $a)
                        <tr>
                            <td class="learner-number" data-label="N.º">{{ ($aprendices->currentPage() - 1) * $aprendices->perPage() + $loop->iteration }}</td>
                            <td class="learner-name" data-label="Nombre">{{ $a->nombre }}</td>
                            <td data-label="Documento">{{ $a->documento }}</td>
                            <td class="learner-email" data-label="Correo">{{ $a->correo }}</td>
                            <td class="learner-actions" data-label="Acciones">
                                <a class="apprentices-action" href="{{ route('aprendices.edit', $a) }}">Editar</a>
                                <form action="{{ route('aprendices.destroy', $a) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar este aprendiz?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="apprentices-action apprentices-action-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="learners-empty-row">
                            <td colspan="5">No se encontraron registros de aprendices.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="apprentices-pagination">
            {{ $aprendices->links() }}
        </div>
    </main>
</body>
</html>
