@extends('layouts.app')
@section('title', 'Ajouter une Maison d\'Édition')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-gray-100">
    <form action="{{ route('publishers.store') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nom de la maison d'édition</label>
            <input type="text" name="nom" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Adresse / Siège social</label>
            <input type="text" name="adresse" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-lg font-bold hover:bg-indigo-700 transition">Confirmer l'ajout</button>
    </form>
</div>
@endsection