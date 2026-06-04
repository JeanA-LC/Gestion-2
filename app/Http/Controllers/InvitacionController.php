<?php

namespace App\Http\Controllers;

use App\Models\LinkInvitacion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InvitacionController extends Controller
{
    public function index()
    {
        $links = LinkInvitacion::where('id_coordinador', auth()->id())
            ->withCount('interesados')
            ->latest('created_at')
            ->paginate(15);

        return view('invitacion.index', compact('links'));
    }

    public function create()
    {
        return view('invitacion.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'nullable|string|max:255',
        ]);

        LinkInvitacion::create([
            'id_coordinador' => auth()->id(),
            'token'          => Str::random(32),
            'descripcion'    => $request->descripcion,
            'activo'         => true,
        ]);

        return redirect()->route('mis-links.index')
            ->with('success', 'Link de invitación generado correctamente.');
    }

    public function edit(LinkInvitacion $misLink)
    {
        $this->authorize('admin-o-coordinador');

        if ($misLink->id_coordinador !== auth()->id()) {
            abort(403);
        }

        return view('invitacion.edit', compact('misLink'));
    }

    public function update(Request $request, LinkInvitacion $misLink)
    {
        if ($misLink->id_coordinador !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'descripcion' => 'nullable|string|max:255',
            'activo'      => 'boolean',
        ]);

        $misLink->update([
            'descripcion' => $request->descripcion,
            'activo'      => $request->boolean('activo'),
        ]);

        return redirect()->route('mis-links.index')
            ->with('success', 'Link actualizado.');
    }

    public function destroy(LinkInvitacion $misLink)
    {
        if ($misLink->id_coordinador !== auth()->id()) {
            abort(403);
        }

        $misLink->delete();
        return back()->with('success', 'Link eliminado.');
    }
}
