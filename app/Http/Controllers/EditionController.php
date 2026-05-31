<?php

namespace App\Http\Controllers;

use App\Models\Edition;
use Illuminate\Http\Request;

class EditionController extends Controller
{
    //Afficher la liste des editions
    public function index()
    {
        $publishers = Edition::all();
        return view('publishers.index', compact('publishers'));
    }

    public function create(){
        return view('publishers.create');
    }
    //Enregistrer une nouvelle edition
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|unique:editions',
            'adresse' => 'nullable'
        ]);

        Edition::create($request->all());
        return redirect()->route('publishers.index')->with('success', 'Éditeur ajouté.');
    }
}
