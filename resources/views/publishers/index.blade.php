@extends('layouts.app')
@section('title', 'Maisons d\'Édition')

@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-500">Gérez les partenaires et les maisons d'édition de la bibliothèque.</p>
    <a href="{{ route('publishers.create') }}" class="bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700 transition shadow-md">
        <i class="fas fa-plus-circle mr-2"></i> Ajouter un Éditeur
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($publishers as $publisher)
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
        <div class="flex items-start justify-between">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center text-xl font-bold">
                    <i class="fas fa-building"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-bold text-gray-800">{{ $publisher->nom }}</h3>
                    <p class="text-sm text-gray-500"><i class="fas fa-map-marker-alt mr-1"></i> {{ $publisher->adresse ?? 'Adresse non renseignée' }}</p>
                </div>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('publishers.edit', $publisher->id) }}" class="text-gray-400 hover:text-indigo-600"><i class="fas fa-edit"></i></a>
            </div>
        </div>
        
        <div class="mt-6 pt-4 border-t border-gray-50 flex justify-between items-center">
            <span class="text-xs font-semibold uppercase text-gray-400 italic">Livres publiés</span>
            <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-xs font-bold">
                {{ $publisher->livres->count() }} ouvrages
            </span>
        </div>
    </div>
    @endforeach
</div>

@if($publishers->isEmpty())
    <div class="bg-white p-12 rounded-xl border border-dashed border-gray-300 text-center">
        <i class="fas fa-industry text-4xl text-gray-200 mb-4"></i>
        <p class="text-gray-500">Aucun éditeur enregistré pour le moment.</p>
    </div>
@endif
@endsection