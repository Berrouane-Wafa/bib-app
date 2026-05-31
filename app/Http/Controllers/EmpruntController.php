<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Emprunt;
use App\Models\Livre;
use Illuminate\Http\Request;

class EmpruntController extends Controller
{
    public function index()
    {
        // On récupère l'emprunt avec les infos du livre et du client
        $loans = Emprunt::with(['livre', 'client'])->get();
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        $books = Livre::where('stock', '>', 0)->get(); // On ne montre que les livres en stock
        $clients = Client::all();
        return view('loans.create', compact('books', 'clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'livre_id' => 'required',
            'client_id' => 'required',
            'date_emprunt' => 'required|date',
            'date_retour_prevue' => 'required|date|after:date_emprunt',
        ]);

        Emprunt::create($request->all());

        // Logique métier : Diminuer le stock du livre emprunté
        $book = Livre::find($request->livre_id);
        $book->decrement('stock');

        return redirect()->route('loans.index')->with('success', 'Emprunt validé.');
    }
}
