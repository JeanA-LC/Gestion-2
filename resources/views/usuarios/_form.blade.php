@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <label class="block mb-1 font-medium">Nombres</label>
        <input type="text" name="nombres" value="{{ old('nombres', $usuario->nombres ?? '') }}" class="w-full border rounded px-3 py-2">
        @error('nombres') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-1 font-medium">Apellidos</label>
        <input type="text" name="apellidos" value="{{ old('apellidos', $usuario->apellidos ?? '') }}" class="w-full border rounded px-3 py-2">
        @error('apellidos') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-1 font-medium">Correo</label>
        <input type="email" name="correo" value="{{ old('correo', $usuario->correo ?? '') }}" class="w-full border rounded px-3 py-2">
        @error('correo') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-1 font-medium">Teléfono</label>
        <input type="text" name="telefono" value="{{ old('telefono', $usuario->telefono ?? '') }}" class="w-full border rounded px-3 py-2">
        @error('telefono') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-1 font-medium">Zona</label>
        <select name="id_zona" class="w-full border rounded px-3 py-2">
            <option value="">Sin zona</option>
            @foreach($zonas as $zona)
                <option value="{{ $zona->id_zona }}"
                    @selected(old('id_zona', $usuario->id_zona ?? '') == $zona->id_zona)>
                    {{ $zona->nombre }}
                </option>
            @endforeach
        </select>
        @error('id_zona') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-1 font-medium">Estado</label>
        <select name="estado" class="w-full border rounded px-3 py-2">
            <option value="1" @selected(old('estado', $usuario->estado ?? 1))>Activo</option>
            <option value="0" @selected(old('estado', $usuario->estado ?? 1) == 0)>Inactivo</option>
        </select>
        @error('estado') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-1 font-medium">Contraseña</label>
        <input type="password" name="password" class="w-full border rounded px-3 py-2">
        @error('password') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-1 font-medium">Confirmar contraseña</label>
        <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2">
    </div>
</div>

<div class="mt-4">
    <label class="block mb-2 font-medium">Roles</label>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
        @foreach($roles as $rol)
            <label class="flex items-center gap-2 border rounded px-3 py-2">
                <input type="checkbox" name="roles[]" value="{{ $rol->id_rol }}"
                    @checked(in_array($rol->id_rol, old('roles', $usuarioRoles ?? [])))>
                <span>{{ $rol->nombre }}</span>
            </label>
        @endforeach
    </div>
    @error('roles') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
</div>

<div class="mt-6 flex gap-3">
    <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded">
        Guardar
    </button>
    <a href="{{ route('usuarios.index') }}" class="bg-gray-300 px-4 py-2 rounded">
        Cancelar
    </a>
</div>