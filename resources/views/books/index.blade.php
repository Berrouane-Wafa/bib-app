@extends('layouts.app')
@section('title', 'Catalogue des Livres')

@section('content')
<div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100">
    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
        <p class="text-gray-500">Gérez vos ouvrages et leurs disponibilités.</p>
        <a href="{{ route('books.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition shadow-sm">
            + Ajouter un livre
        </a>
    </div>
    
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50">
            <tr>
                <th class="p-4 font-semibold text-gray-600">Titre</th>
                <th class="p-4 font-semibold text-gray-600">Auteur</th>
                <th class="p-4 font-semibold text-gray-600">Stock</th>
                <th class="p-4 font-semibold text-gray-600 text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr class="border-t border-gray-50 hover:bg-gray-50 transition">
                <td class="p-4 font-medium text-gray-800">{{ $book->titre }}</td>
                <td class="p-4 text-gray-600">{{ $book->auteur->nom }}</td>
                
                <td class="p-4">
                    @if($book->stock > 0)
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">
                            {{ $book->stock }} disponibles
                        </span>
                    @else
                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold">Épuisé</span>
                    @endif
                </td>
                <td class="p-4 text-right space-x-2">
                    <button class="text-indigo-600 hover:text-indigo-900"><i class="fas fa-edit"></i></button>
                    <button class="text-red-600 hover:text-red-900"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection