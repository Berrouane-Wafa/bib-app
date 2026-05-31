<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
        //Afficher la liste des clients
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

        //Enregistrer un nouvel client
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:clients'
        ]);

        Client::create($request->all());
        return redirect()->route('clients.index')->with('success', 'Client créé.');
    }
}
