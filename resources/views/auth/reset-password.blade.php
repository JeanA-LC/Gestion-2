<x-guest-layout>
    <!-- Encabezado -->
    <div class="text-center mb-8">
        <!-- Ícono corporativo de Recuperación -->
        <div class="mx-auto inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-50 mb-4 ring-1 ring-blue-100 shadow-sm">
            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4v-3.252a1 1 0 01.293-.707l8.96-8.96A6 6 0 0115 7z"/>
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Crea una nueva contraseña</h2>
        <p class="text-sm text-slate-500 mt-2 font-medium">Ingresa tu correo y la nueva clave que deseas utilizar</p>
    </div>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
        @csrf

        <!-- Password Reset Token (Oculto) -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Correo Electrónico -->
        <div>
            <label for="email" class="block text-sm font-semibold text-slate-700 mb-1">Correo Electrónico</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/></svg>
                </div>
                <x-text-input id="email" 
                    class="block w-full pl-11 pr-4 py-2.5 bg-slate-50 border-slate-200 text-slate-800 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-colors shadow-sm" 
                    type="email" 
                    name="email" 
                    :value="old('email', $request->email)" 
                    required autofocus autocomplete="username" 
                    placeholder="correo@ejemplo.com" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs font-medium text-red-600" />
        </div>

        <!-- Agrupación Contraseñas (Grid lado a lado en PC) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <!-- Nueva Contraseña -->
            <div>
                <label for="password" class="block text-sm font-semibold text-slate-700 mb-1">Nueva Contraseña</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <x-text-input id="password" 
                        class="block w-full pl-11 pr-4 py-2.5 bg-slate-50 border-slate-200 text-slate-800 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-colors shadow-sm" 
                        type="password" 
                        name="password" 
                        required autocomplete="new-password" 
                        placeholder="••••••••" />
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs font-medium text-red-600" />
            </div>

            <!-- Confirmar Contraseña -->
            <div>
                <label for="password_confirmation" class="block text-sm font-semibold text-slate-700 mb-1">Confirmar Contraseña</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <x-text-input id="password_confirmation" 
                        class="block w-full pl-11 pr-4 py-2.5 bg-slate-50 border-slate-200 text-slate-800 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-colors shadow-sm" 
                        type="password" 
                        name="password_confirmation" 
                        required autocomplete="new-password" 
                        placeholder="••••••••" />
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xs font-medium text-red-600" />
            </div>
        </div>

        <!-- Botón de Restablecer -->
        <div class="pt-4">
            <button type="submit" class="w-full flex items-center justify-center gap-2 bg-blue-600 text-white font-bold py-2.5 px-4 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all shadow-md shadow-blue-600/20 active:scale-[0.98]">
                Guardar Nueva Contraseña
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            </button>
        </div>
    </form>
</x-guest-layout>