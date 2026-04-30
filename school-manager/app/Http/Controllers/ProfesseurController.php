<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;
use App\Models\Evaluation;
use Illuminate\Support\Facades\Auth;

class ProfesseurController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        // On cherche si le nom OU le prénom de l'utilisateur apparaît dans le champ professeur
        // Le % permet de trouver "M. HOUNTONDJI" ou "Béni H."
        $cours = Cours::where(function ($query) use ($user) {
            $query->where('professeur', 'LIKE', '%' . $user->nom . '%')
                ->orWhere('professeur', 'LIKE', '%' . $user->prenom . '%');
        })
            ->orderBy('date_debut', 'asc')
            ->get();

        // On applique la même logique pour les statistiques
        $stats = [
            'moyenne' => Evaluation::where(function ($query) use ($user) {
                $query->where('professeur_nom', 'LIKE', '%' . $user->nom . '%')
                    ->orWhere('professeur_nom', 'LIKE', '%' . $user->prenom . '%');
            })->avg('note') ?: 0,

            'total_votes' => Evaluation::where(function ($query) use ($user) {
                $query->where('professeur_nom', 'LIKE', '%' . $user->nom . '%')
                    ->orWhere('professeur_nom', 'LIKE', '%' . $user->prenom . '%');
            })->count(),
        ];

        return view('professeur_dashboard', compact('cours', 'stats'));
    }
}
