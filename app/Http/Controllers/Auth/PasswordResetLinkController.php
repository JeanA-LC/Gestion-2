<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws ValidationException
     */
    public function store(request $request)
    {
        $request->validate([
            'correo' => ['required', 'email'],
        ]);

        $status = password::sendresetlink(
            ['correo' => $request->correo]
        );

        return $status == password::reset_link_sent
            ? back()->with('status', __($status))
            : back()->withinput($request->only('correo'))
                ->witherrors(['correo' => __($status)]);
    }
}
