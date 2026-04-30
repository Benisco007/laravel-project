<?php // LA BALISE DOIT ÊTRE ICI

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Evaluation;

use Illuminate\Http\Request;
use App\Models\Cours; // Vérifie que ton modèle s'appelle bien Cours au singulier
use Illuminate\Support\Facades\Auth;

class EleveController extends Controller
{
    public function dashboard()
    {
        $cours = Cours::orderBy('date_debut', 'asc')->get();
        // 1. Les cours disponibles
        $cours = Cours::orderBy('date_debut', 'asc')->get();

        // 2. Les notes de l'élève connecté
        $notes = Note::where('eleve_id', Auth::id())->orderBy('created_at', 'desc')->get();

        return view('eleve_dashboard', compact('cours', 'notes'));
    }
    public function noter(Request $request)
    {
        $request->validate([
            'note' => 'required|integer|min:1|max:5',
            'professeur_nom' => 'required|string'
        ]);

        Evaluation::create([
            'user_id' => auth()->id(),
            'professeur_nom' => $request->professeur_nom,
            'note' => $request->note,
        ]);

        return back()->with('success', 'Merci pour votre avis !');
    }
}
