<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Edition;
use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    // Afficher la liste des livres
    public function index()
    {
        // On récupère les livres avec leurs auteurs et éditeurs ()
        $books = Livre::with(['auteur', 'edition'])->get();
        return view('books.index', compact('books'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        $authors = Auteur::all();
        $publishers = Edition::all();
        return view('books.create', compact('authors', 'publishers'));
    }

    // Enregistrer un nouveau Auteur
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'stock' => 'required|numeric',
            'auteur_id' => 'required',
            'edition_id' => 'required',
        ]);

        Livre::create($request->all());

        return redirect()->route('books.index')->with('success', 'Livre ajouté !');
    }
}
