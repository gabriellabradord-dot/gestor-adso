<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Gestor ADSO | Acceso</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700|space-grotesk:500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="auth-page">
        <div class="auth-shell">
            <section class="auth-aside" aria-label="Gestor ADSO">
                <a class="auth-brand" href="{{ route('login') }}" aria-label="Gestor ADSO, inicio">
                    <span class="auth-brand-mark" aria-hidden="true">A</span>
                    <span>GESTOR <b>ADSO</b></span>
                </a>
                <div class="auth-aside-copy">
                    <p class="auth-kicker">Gestión académica · SENA</p>
                    <h1>Aprender,<br>registrar,<br><span>avanzar.</span></h1>
                    <p>Un espacio claro para acompañar cada proceso de formación y mantener todo en movimiento.</p>
                </div>
                <div class="auth-aside-footer"><span aria-hidden="true"></span> Plataforma de seguimiento académico</div>
            </section>
            <main class="auth-main">
                <a class="auth-mobile-brand" href="{{ route('login') }}" aria-label="Gestor ADSO, inicio">
                    <span class="auth-brand-mark" aria-hidden="true">A</span>
                    <span>GESTOR <b>ADSO</b></span>
                </a>
                <div class="auth-content">
                    {{ $slot }}
                </div>
                <p class="auth-footnote">Gestor ADSO · Formación con propósito</p>
            </main>
        </div>
    </body>
</html>
