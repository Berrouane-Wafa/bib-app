@extends('layouts.app')
@section('title', 'Enregistrer un prêt')

@section('content')
<div class="max-w-xl bg-white p-8 rounded-xl shadow-sm border border-gray-100 mx-auto">
    <form action="{{ route('loans.store') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Sélectionner le client</label>
            <select name="client_id" class="w-full p-3 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-green-500">
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->nom }} ({{ $client->email }})</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Livre à emprunter</label>
            <select name="livre_id" class="w-full p-3 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-green-500">
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->titre }} - Stock: {{ $book->stock }}</option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Date d'emprunt</label>
                <input type="date" name="date_emprunt" value="{{ date('Y-m-d') }}" class="w-full p-3 border border-gray-300 rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Retour prévu</label>
                <input type="date" name="date_retour_prevue" class="w-full p-3 border border-gray-300 rounded-lg">
            </div>
        </div>

        <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-bold hover:bg-green-700 transition">
            Valider le prêt
        </button>
    </form>
</div>
@endsection