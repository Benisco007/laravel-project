<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cours;
use App\Models\Evaluation;

class AdminController extends Controller
{
    public function listeEleves()
    {
        $eleves = User::where('role', 'eleve')->orderBy('nom', 'asc')->get();
        return view('eleves_index', compact('eleves'));
    }

    public function programmation()
    {
        $cours = Cours::orderBy('date_debut', 'asc')->get();
        return view('programmation', compact('cours'));
    }

    public function createCours()
    {
        $professeurs = User::where('role', 'professeur')->get();
        return view('cours_create', compact('professeurs'));
    }

    public function storeCours(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'professeur' => 'required|string|max:255',
            'salle' => 'required|string|max:255',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
        ]);

        Cours::create($request->all());
        return redirect()->route('admin.programmation')->with('success', 'Cours programmé avec succès !');
    }

    public function createProfesseur()
    {
        return view('professeur_create');
    }

    public function storeProfesseur(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'role' => 'professeur',
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Professeur ajouté avec succès !');
    }

    // CETTE FONCTION EST MAINTENANT BIEN DANS LA CLASSE
    public function dashboard()
    {
        $moyenneGenerale = Evaluation::avg('note') ?: 0;
        $noteSurVingt = number_format($moyenneGenerale * 4, 1);
        $pourcentage = ($moyenneGenerale / 5) * 100;

        return view('admin_dashboard', compact('noteSurVingt', 'pourcentage'));
    }
    public function destroyEleve(User $user)
    {
        $user->delete();
        return back()->with('success', 'Étudiant supprimé avec succès.');
    }
} // <--- CETTE ACCOLADE FERME ENFIN TOUTE LA CLASSE