<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewCandidatureNotification;
use Illuminate\Support\Facades\Auth;

class CandidatureController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $candidatures = $user->candidatures()->with('offre')->get();
        return view('candidatures.index', compact('candidatures'));
    }
    

    public function create()
    {
        $offres = Offre::all();
        return view('candidatures.create', compact('offres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'offre_id' => 'required|exists:offres,id',
            'user_id' => 'required|exists:users,id',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cv' => 'required|file|mimes:pdf,doc,docx',
        ]);
    
        $candidature = new Candidature;
        $candidature->offre_id = $request->offre_id;
        $candidature->user_id = $request->user_id;
        $candidature->nom = $request->nom;
        $candidature->email = $request->email;
    
        if ($request->hasFile('cv')) {
            $path = $request->file('cv')->store('cvs', 'public');
            $candidature->cv = $path;
        }
    
        $candidature->save();

       
    
        return redirect()->route('candidatures.index');
    }
    
    public function show(Candidature $candidature)
    {
        return view('candidatures.show', compact('candidature'));
    }

    public function edit(Candidature $candidature)
    {
        $offres = Offre::all();
        return view('candidatures.edit', compact('candidature', 'offres'));
    }

    public function update(Request $request, Candidature $candidature)
    {
        $candidature->offre_id = $request->offre_id;
        $candidature->nom = $request->nom;
        $candidature->email = $request->email;
        $candidature->cv = $request->cv; // Assurez-vous de gérer le téléchargement de fichiers si nécessaire
        $candidature->save();

        return redirect()->route('candidatures.index');
    }

    public function destroy(Candidature $candidature)
    {
        $candidature->delete();
        return redirect()->route('candidatures.index');
    }

    // App\Http\Controllers\OffreController.php


    public function accepter($id)
    {
        $candidature = Candidature::findOrFail($id);
        $candidature->status = 1;
        $candidature->update();

        return redirect()->back()->with('success', 'Candidature acceptée avec succès');
    }

    public function refuser($id)
    {
        $candidature = Candidature::findOrFail($id);
        $candidature->status = 0;
        $candidature->update();

        return redirect()->back()->with('success', 'Candidature refusée avec succès');
    }

}
