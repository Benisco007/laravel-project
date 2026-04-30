<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */


    public function store(Request $request): RedirectResponse
    {
        // 1. On met à jour les règles de validation
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', \Illuminate\Validation\Rules\Password::defaults()],
            'langue_souhaitee' => ['required', 'string'],
            'duree_formation' => ['required', 'string'],
            'niveau' => ['required', 'string'],
        ]);

        // 2. On crée l'utilisateur avec tes champs
        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'eleve', // Par défaut
            'langue_souhaitee' => $request->langue_souhaitee,
            'duree_formation' => $request->duree_formation,
            'niveau' => $request->niveau,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Redirection après inscription
        return redirect(route('dashboard', absolute: false));
    }
}
