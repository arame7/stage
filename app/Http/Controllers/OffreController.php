<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffreController extends Controller
{
    public function index()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Récupérer les offres disponibles (à l'exclusion des offres créées par l'utilisateur) et dont la date limite n'est pas depassee

        $offres = Offre::where('date_limite', '>=', now())
            ->paginate(4);

        return view('offres.index', compact('offres'));
    }

   


    public function offre()
    {
        $offres = Offre::paginate(10);
        return view('offre', compact('offres'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $offres = Offre::where('titre', 'LIKE', "%$query%")
            ->orWhere('entreprise', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")
            ->get();

        return view('search_results', compact('offres'));
    }




    public function create()
    {
        return view('offres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'entreprise' => 'required|string',
            'date_limite' => 'required|date',
        ]);

        $offre = new Offre();
        $offre->titre = $request->titre;
        $offre->description = $request->description;
        $offre->entreprise = $request->entreprise;
        $offre->date_limite = $request->date_limite;
        $offre->user_id = Auth::id(); // Associer l'offre à l'utilisateur authentifié
        $offre->save();
        return redirect()->route('offres.index')->with('success', 'Offre créée avec succès.');
    }

    public function show($id)
    {
        $offre = Offre::with('candidature')->findOrFail($id);

        return view('offres.show', compact('offre'));
    }

    public function edit(Offre $offre)
    {
        return view('offres.edit', compact('offre'));
    }

    public function update(Request $request, Offre $offre)
    {
        $offre->titre = $request->titre;
        $offre->description = $request->description;
        $offre->entreprise = $request->entreprise;
        $offre->date_limite = $request->date_limite;
        $offre->save();

        return redirect()->route('profile.index')->with('success', 'Offre modifiée avec succès.');
    }

    public function destroy(Offre $offre)
    {
        $offre->delete();
        return redirect()->route('profile.index')->with('success', 'Offre supprimée avec succès.');
    }
}
