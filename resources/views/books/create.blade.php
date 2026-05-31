@extends('layouts.app')
@section('title', 'Ajouter un nouvel ouvrage')

@section('content')
<div class="max-w-2xl bg-white p-8 rounded-xl shadow-sm border border-gray-100">
    <form action="{{ route('books.store') }}" method="POST" class="space-y-6">
        @csrf
        <div class="grid grid-cols-1 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Titre du livre</label>
                <input type="text" name="titre" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition">
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Auteur</label>
                    <select name="auteur_id" class="w-full p-3 border border-gray-300 rounded-lg bg-white outline-none">
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Édition</label>
                    <select name="edition_id" class="w-full p-3 border border-gray-300 rounded-lg bg-white outline-none">
                        @foreach($publishers as $publisher)
                            <option value="{{ $publisher->id }}">{{ $publisher->nom }}</option>
                        @endforeach
                        
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Quantité en stock</label>
                    <input type="number" name="stock" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>
            </div>
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-lg font-bold hover:bg-indigo-700 transition">
                Confirmer l'enregistrement
            </button>
        </div>
    </form>
</div>
@endsection