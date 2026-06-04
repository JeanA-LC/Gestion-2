<x-guest-layout>
    <div class="text-center mb-8">
        <div class="mx-auto inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-50 mb-4 ring-1 ring-blue-100 shadow-sm">
            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Crear una Cuenta</h2>
        <p class="text-sm text-slate-500 mt-2 font-medium">Únete a la plataforma de gestión electoral</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label for="nombres" class="block text-sm font-semibold text-slate-700 mb-1">Nombres</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <x-text-input id="nombres" 
                        class="block w-full pl-11 pr-4 py-2.5 bg-slate-50 border-slate-200 text-slate-800 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-colors shadow-sm" 
                        type="text" 
                        name="nombres" 
                        :value="old('nombres')" 
                        required autofocus 
                        placeholder="Ej. Juan Carlos" />
                </div>
                <x-input-error :messages="$errors->get('nombres')" class="mt-2 text-xs font-medium text-red-600" />
            </div>

            <div>
                <label for="apellidos" class="block text-sm font-semibold text-slate-700 mb-1">Apellidos</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <x-text-input id="apellidos" 
                        class="block w-full pl-11 pr-4 py-2.5 bg-slate-50 border-slate-200 text-slate-800 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-colors shadow-sm" 
                        type="text" 
                        name="apellidos" 
                        :value="old('apellidos')" 
                        required 
                        placeholder="Ej. Pérez Gómez" />
                </div>
                <x-input-error :messages="$errors->get('apellidos')" class="mt-2 text-xs font-medium text-red-600" />
            </div>
        </div>

        <div>
            <label for="correo" class="block text-sm font-semibold text-slate-700 mb-1">Correo Electrónico</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/></svg>
                </div>
                <x-text-input id="correo" 
                    class="block w-full pl-11 pr-4 py-2.5 bg-slate-50 border-slate-200 text-slate-800 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-colors shadow-sm" 
                    type="email" 
                    name="correo" 
                    :value="old('correo')" 
                    required 
                    placeholder="correo@ejemplo.com" />
            </div>
            <x-input-error :messages="$errors->get('correo')" class="mt-2 text-xs font-medium text-red-600" />
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label for="password" class="block text-sm font-semibold text-slate-700 mb-1">Contraseña</label>
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

        <div class="pt-4">
            <button type="submit" class="w-full flex items-center justify-center gap-2 bg-blue-600 text-white font-bold py-2.5 px-4 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all shadow-md shadow-blue-600/20 active:scale-[0.98]">
                Crear Cuenta
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </button>
        </div>

        <p class="text-center text-sm text-slate-600 mt-6 pb-2">
            ¿Ya estás registrado? 
            <a href="{{ route('login') }}" class="font-bold text-blue-600 hover:text-blue-700 hover:underline transition-colors">
                Inicia sesión aquí
            </a>
        </p>
    </form>
</x-guest-layout>