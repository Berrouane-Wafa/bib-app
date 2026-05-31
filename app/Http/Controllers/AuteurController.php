<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use Illuminate\Http\Request;

class AuteurController extends Controller
{
    // Afficher la liste des auteurs
    public function index()
    {
        $authors = Auteur::all();
        return view('authors.index', compact('authors'));
    }

    //afficher le formulaire d'ajout
        public function create()
    {
        return view('authors.create');
    }

    // Enregistrer un nouveau 
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'biographie' => 'nullable'
        ]);

        Auteur::create($request->all());
        
        return redirect()->route('authors.index')->with('success', 'Auteur enregistré.');
    }
    
}
