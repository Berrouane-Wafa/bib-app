@extends('layouts.app')
@section('title', 'Suivi des Emprunts')

@section('content')
<div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100">
    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
        <p class="text-gray-500">Visualisez les emprunts actifs et les retours prévus.</p>
        <a href="{{ route('loans.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition shadow-sm">
            + Nouvel Emprunt
        </a>
    </div>
    
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50">
            <tr>
                <th class="p-4 font-semibold text-gray-600">Client</th>
                <th class="p-4 font-semibold text-gray-600">Livre</th>
                <th class="p-4 font-semibold text-gray-600">Date Sortie</th>
                <th class="p-4 font-semibold text-gray-600">Retour Prévu</th>
                <th class="p-4 font-semibold text-gray-600">Statut</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loans as $loan)
            <tr class="border-t border-gray-50 hover:bg-gray-50 transition">
                <td class="p-4">
                    <div class="font-medium text-gray-800">{{ $loan->client->nom }}</div>
                    <div class="text-xs text-gray-400">{{ $loan->client->email }}</div>
                </td>
                <td class="p-4 text-gray-700">{{ $loan->livre->titre }}</td>
                <td class="p-4 text-gray-600 text-sm">{{ $loan->date_emprunt }}</td>
                <td class="p-4 text-gray-600 text-sm font-semibold">{{ $loan->date_retour_prevue }}</td>
                <td class="p-4">
                    @if($loan->date_retour_reelle)
                        <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-bold">Rendu</span>
                    @elseif(\Carbon\Carbon::parse($loan->date_retour_prevue)->isPast())
                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold animate-pulse">En retard</span>
                    @else
                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold">En cours</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection