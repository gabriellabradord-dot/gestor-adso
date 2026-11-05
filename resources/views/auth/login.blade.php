<x-guest-layout>
    <div class="auth-form-heading">
        <p class="auth-form-kicker">Acceso institucional</p>
        <h2>Qué bueno verte.</h2>
        <p>Ingresa a tu cuenta para continuar con la gestión.</p>
    </div>

    <x-auth-session-status class="auth-alert" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="auth-field">
            <label for="email">Correo electrónico</label>
            <input id="email" class="auth-input" type="email" name="email" value="{{ old('email') }}" placeholder="nombre@institucion.edu.co" required autofocus autocomplete="username">
            <x-input-error :messages="$errors->get('email')" class="auth-error" />
        </div>

        <div class="auth-field">
            <label for="password">Contraseña</label>
            <input id="password" class="auth-input" type="password" name="password" placeholder="Ingresa tu contraseña" required autocomplete="current-password">
            <x-input-error :messages="$errors->get('password')" class="auth-error" />
        </div>

        <div class="auth-options">
            <label class="auth-remember" for="remember_me">
                <input id="remember_me" type="checkbox" name="remember">
                <span>Mantener sesión iniciada</span>
            </label>
            @if (Route::has('password.request'))
                <a class="auth-link" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
            @endif
        </div>

        <div class="auth-form-actions">
            <button class="auth-submit" type="submit">Iniciar sesión</button>
        </div>
    </form>
</x-guest-layout>
