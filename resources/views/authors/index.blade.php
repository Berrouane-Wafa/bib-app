@extends('layouts.app')
@section('title', 'Gestion des Auteurs')

@section('content')
<div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100">
    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
        <p class="text-gray-500">Liste des écrivains enregistrés dans le système.</p>
    <a href="{{ route('authors.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg">
        + Nouvel Auteur
    </a>
    </div>
    
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50">
            <tr>
                <th class="p-4 font-semibold text-gray-600">Nom de l'auteur</th>
                <th class="p-4 font-semibold text-gray-600">Biographie</th>
                <th class="p-4 font-semibold text-gray-600 text-center">Livres écrits</th>
                <th class="p-4 font-semibold text-gray-600 text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $author)
            <tr class="border-t border-gray-50 hover:bg-gray-50 transition">
                <td class="p-4 font-medium text-gray-800">{{ $author->nom }}</td>
                <td class="p-4 text-gray-500 text-sm italic">{{ Str::limit($author->biographie, 50) }}</td>
                <td class="p-4 text-center">
                    <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-xs font-bold">
                        {{ $author->livres->count() }}
                    </span>
                </td>
                <td class="p-4 text-right space-x-2">
                    <button class="text-indigo-600 hover:text-indigo-900"><i class="fas fa-edit"></i></button>
                    <form action="{{ route('authors.destroy', $author->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection