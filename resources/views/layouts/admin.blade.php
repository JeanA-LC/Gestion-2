<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') — Gestión Personeros</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        ::-webkit-scrollbar { width: 4px; height: 4px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #475569; border-radius: 4px; }
    </style>
</head>
<body class="bg-gray-100 text-gray-800 antialiased">

{{-- Alpine.js controla la apertura del sidebar en móvil --}}
<div class="min-h-screen flex" x-data="{ sidebarOpen: false }">

    {{-- ─── OVERLAY (móvil) ────────────────────────────────── --}}
    <div x-show="sidebarOpen"
         x-transition:enter="transition-opacity duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="sidebarOpen = false"
         class="fixed inset-0 bg-black/50 z-20 lg:hidden"
         style="display:none">
    </div>

    {{-- ─── SIDEBAR ─────────────────────────────────────────── --}}
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
           class="fixed top-0 left-0 h-full z-30 w-72 lg:w-64 bg-slate-900 text-white flex flex-col
                  transition-transform duration-300 ease-in-out
                  lg:static lg:translate-x-0 lg:shrink-0 overflow-y-auto">

        {{-- Logo + cierre en móvil --}}
        <div class="p-4 border-b border-slate-700 sticky top-0 bg-slate-900 z-10 flex items-center justify-between">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <div class="w-7 h-7 rounded-lg bg-blue-500 flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    @php
                    $rolLabel = [
                        'Administrador' => 'Administrador',
                        'Coordinador'   => 'Coordinador',
                        'Personero'     => 'Personero',
                        'Simpatizante'  => 'Simpatizante',
                    ];
                    $primerRol = auth()->user()->roles->pluck('nombre')->first() ?? 'Sistema';
                    $labelSidebar = $rolLabel[$primerRol] ?? $primerRol;
                @endphp
                <span class="font-bold text-white text-sm">{{ $labelSidebar }}</span>
                </div>
                <p class="text-xs text-white truncate max-w-[180px]">{{ auth()->user()->nombres ?? '' }} {{ auth()->user()->apellidos ?? '' }}</p>
                <p class="text-xs text-slate-400 truncate max-w-[180px]">{{ auth()->user()->roles->pluck('nombre')->join(', ') }}</p>
            </div>
            {{-- Botón cerrar sidebar (solo móvil) --}}
            <button @click="sidebarOpen = false"
                    class="lg:hidden p-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-700 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Navegación --}}
        <nav class="flex-1 p-3 space-y-0.5 text-sm">
        @php $u = auth()->user(); @endphp

            <a href="{{ route('dashboard') }}" @click="sidebarOpen = false"
               class="flex items-center gap-2 px-3 py-2 rounded hover:bg-slate-700 {{ request()->routeIs('dashboard') ? 'bg-slate-700 font-semibold' : '' }}">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Mi panel
            </a>

            @if($u->hasRole('Administrador'))
            <div class="pt-3 pb-0.5"><p class="px-3 text-xs font-bold uppercase tracking-widest text-slate-500">Seguridad</p></div>
            <a href="{{ route('usuarios.index') }}" @click="sidebarOpen = false"
               class="flex items-center gap-2 px-3 py-2 rounded hover:bg-slate-700 {{ request()->routeIs('usuarios.*') ? 'bg-slate-700 font-semibold' : '' }}">
                <span class="w-4 text-slate-400 text-center">▸</span> Usuarios
            </a>

            <div class="pt-3 pb-0.5"><p class="px-3 text-xs font-bold uppercase tracking-widest text-slate-500">Territorial</p></div>
            @foreach([['departamentos','Departamentos'],['provincias','Provincias'],['distritos','Distritos'],['zonas','Zonas']] as [$r,$l])
            <a href="{{ route($r.'.index') }}" @click="sidebarOpen = false"
               class="flex items-center gap-2 px-3 py-2 rounded hover:bg-slate-700 {{ request()->routeIs($r.'.*') ? 'bg-slate-700 font-semibold' : '' }}">
                <span class="w-4 text-slate-400 text-center">▸</span> {{ $l }}
            </a>
            @endforeach
            @endif

            @if($u->hasAnyRole(['Administrador','Coordinador']))

            @if($u->hasRole('Coordinador'))
            <div class="pt-3 pb-0.5"><p class="px-3 text-xs font-bold uppercase tracking-widest text-indigo-400">Mis referidos</p></div>
            <a href="{{ route('mis-links.index') }}" @click="sidebarOpen = false"
               class="flex items-center gap-2 px-3 py-2 rounded hover:bg-slate-700 {{ request()->routeIs('mis-links.*') ? 'bg-indigo-700 font-semibold' : '' }}">
                <svg class="w-4 h-4 shrink-0 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                </svg>
                Links de invitación
            </a>
            @endif

            <div class="pt-3 pb-0.5"><p class="px-3 text-xs font-bold uppercase tracking-widest text-slate-500">Gestión Política</p></div>
            @foreach([['tipo-actor-politico','Tipos de Actor'],['personas','Personas'],['comites','Comités Base']] as [$r,$l])
            <a href="{{ route($r.'.index') }}" @click="sidebarOpen = false"
               class="flex items-center gap-2 px-3 py-2 rounded hover:bg-slate-700 {{ request()->routeIs($r.'.*') ? 'bg-slate-700 font-semibold' : '' }}">
                <span class="w-4 text-slate-400 text-center">▸</span> {{ $l }}
            </a>
            @endforeach

            <div class="pt-3 pb-0.5"><p class="px-3 text-xs font-bold uppercase tracking-widest text-slate-500">Captación</p></div>
            <a href="{{ route('interesados.index') }}" @click="sidebarOpen = false"
               class="flex items-center gap-2 px-3 py-2 rounded hover:bg-slate-700 {{ request()->routeIs('interesados.*') ? 'bg-slate-700 font-semibold' : '' }}">
                <span class="w-4 text-slate-400 text-center">▸</span> Interesados
            </a>

            <div class="pt-3 pb-0.5"><p class="px-3 text-xs font-bold uppercase tracking-widest text-slate-500">Participación</p></div>
            @foreach([['tipo-evento','Tipos Evento'],['eventos','Eventos'],['participaciones','Participaciones']] as [$r,$l])
            <a href="{{ route($r.'.index') }}" @click="sidebarOpen = false"
               class="flex items-center gap-2 px-3 py-2 rounded hover:bg-slate-700 {{ request()->routeIs($r.'.*') ? 'bg-slate-700 font-semibold' : '' }}">
                <span class="w-4 text-slate-400 text-center">▸</span> {{ $l }}
            </a>
            @endforeach

            <div class="pt-3 pb-0.5"><p class="px-3 text-xs font-bold uppercase tracking-widest text-slate-500">Proceso</p></div>
            @foreach([['postulaciones','Postulaciones'],['capacitaciones','Capacitaciones'],['evaluaciones','Evaluaciones'],['credenciales','Credenciales']] as [$r,$l])
            <a href="{{ route($r.'.index') }}" @click="sidebarOpen = false"
               class="flex items-center gap-2 px-3 py-2 rounded hover:bg-slate-700 {{ request()->routeIs($r.'.*') ? 'bg-slate-700 font-semibold' : '' }}">
                <span class="w-4 text-slate-400 text-center">▸</span> {{ $l }}
            </a>
            @endforeach

            <div class="pt-3 pb-0.5"><p class="px-3 text-xs font-bold uppercase tracking-widest text-slate-500">Electoral</p></div>
            @foreach([['centros-votacion','Centros Votación'],['mesas-sufragio','Mesas Sufragio'],['tipos-personero','Tipos Personero'],['asignaciones','Asignaciones']] as [$r,$l])
            <a href="{{ route($r.'.index') }}" @click="sidebarOpen = false"
               class="flex items-center gap-2 px-3 py-2 rounded hover:bg-slate-700 {{ request()->routeIs($r.'.*') ? 'bg-slate-700 font-semibold' : '' }}">
                <span class="w-4 text-slate-400 text-center">▸</span> {{ $l }}
            </a>
            @endforeach
            @endif

            @if($u->hasAnyRole(['Administrador','Coordinador','Personero']))
            <div class="pt-3 pb-0.5"><p class="px-3 text-xs font-bold uppercase tracking-widest text-slate-500">Operación Electoral</p></div>
            @foreach([['reportes-estado','Reportes de Campo'],['reportes-final','Reportes Finales']] as [$r,$l])
            <a href="{{ route($r.'.index') }}" @click="sidebarOpen = false"
               class="flex items-center gap-2 px-3 py-2 rounded hover:bg-slate-700 {{ request()->routeIs($r.'.*') ? 'bg-slate-700 font-semibold' : '' }}">
                <span class="w-4 text-slate-400 text-center">▸</span> {{ $l }}
            </a>
            @endforeach
            @endif

        </nav>

        <div class="p-3 border-t border-slate-700">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded text-sm transition">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </aside>

    {{-- ─── CONTENIDO PRINCIPAL ────────────────────────────── --}}
    <div class="flex-1 min-w-0 flex flex-col overflow-hidden">

        {{-- Header sticky --}}
        <header class="bg-white shadow-sm px-4 lg:px-6 py-3 flex items-center justify-between sticky top-0 z-10 gap-3">
            {{-- Hamburger (móvil) + título --}}
            <div class="flex items-center gap-3 min-w-0">
                <button @click="sidebarOpen = true"
                        class="lg:hidden p-2 rounded-lg text-gray-500 hover:bg-gray-100 transition shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <div class="min-w-0">
                    <h2 class="text-sm sm:text-base font-semibold truncate">@yield('title', 'Panel')</h2>
                    <p class="text-xs text-gray-400 hidden sm:block truncate">{{ auth()->user()->correo ?? '' }}</p>
                </div>
            </div>

            {{-- Usuario info (desktop) --}}
            <div class="hidden sm:block text-right shrink-0">
                <p class="text-sm font-medium text-gray-800">{{ auth()->user()->nombres ?? '' }} {{ auth()->user()->apellidos ?? '' }}</p>
                <p class="text-xs text-gray-500">{{ auth()->user()->roles->pluck('nombre')->join(' · ') }}</p>
            </div>
        </header>

        {{-- Contenido --}}
        <main class="flex-1 overflow-auto p-4 lg:p-6">
            @if(session('success'))
                <div class="mb-4 rounded-lg bg-green-100 text-green-800 px-4 py-3 text-sm flex items-center gap-2">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="mb-4 rounded-lg bg-red-100 text-red-800 px-4 py-3 text-sm flex items-center gap-2">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>

</div>
</body>
</html>
