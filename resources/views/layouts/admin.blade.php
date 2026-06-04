<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Personeros</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen flex">
        <aside class="w-64 bg-slate-900 text-white flex flex-col">
            <div class="p-6 border-b border-slate-700">
                <h1 class="text-xl font-bold">Gestión Personeros</h1>
                <p class="text-sm text-slate-300 mt-1">
                    {{ auth()->user()->nombres ?? 'Usuario' }}
                </p>
            </div>

            <nav class="flex-1 p-4 space-y-2">
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-slate-700">
                    Dashboard
                </a>

                <a href="{{ route('usuarios.index') }}" class="block px-4 py-2 rounded hover:bg-slate-700">
                    Usuarios
                </a>
            </nav>

            <div class="p-4 border-t border-slate-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1">
            <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
                <div>
                    <h2 class="text-lg font-semibold">@yield('title', 'Panel de control')</h2>
                    <p class="text-sm text-gray-500">
                        {{ auth()->user()->correo ?? '' }}
                    </p>
                </div>

                <div class="text-right text-sm">
                    <p class="font-medium">{{ auth()->user()->nombres ?? '' }}</p>
                    <p class="text-gray-500">
                        {{ auth()->user()->roles->pluck('nombre')->join(', ') }}
                    </p>
                </div>
            </header>

            <section class="p-6">
                @if(session('success'))
                    <div class="mb-4 rounded bg-green-100 text-green-800 px-4 py-3">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 rounded bg-red-100 text-red-800 px-4 py-3">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </section>
        </main>
    </div>
</body>
</html>