@extends('layouts.app')
@section('title', 'Gestion des Clients')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
        <div class="text-sm text-gray-500 uppercase font-bold">Total Clients</div>
        <div class="text-3xl font-bold text-indigo-600">{{ $clients->count() }}</div>
    </div>
</div>

<div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100">
    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
        <div>
            <h3 class="text-lg font-bold text-gray-800">Répertoire des membres</h3>
            <p class="text-sm text-gray-500">Liste des personnes autorisées à emprunter des ouvrages.</p>
        </div>
        <button onclick="toggleModal('modal-client')" class="bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700 transition flex items-center">
            <i class="fas fa-user-plus mr-2"></i> Nouveau Client
        </button>
    </div>
    
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50">
            <tr>
                <th class="p-4 font-semibold text-gray-600 uppercase text-xs">Client</th>
                <th class="p-4 font-semibold text-gray-600 uppercase text-xs">Email</th>
                <th class="p-4 font-semibold text-gray-600 uppercase text-xs">Inscrit le</th>
                <th class="p-4 font-semibold text-gray-600 uppercase text-xs text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr class="border-t border-gray-50 hover:bg-indigo-50/30 transition">
                <td class="p-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold mr-3">
                            {{ strtoupper(substr($client->nom, 0, 1)) }}
                        </div>
                        <span class="font-medium text-gray-800">{{ $client->nom }}</span>
                    </div>
                </td>
                <td class="p-4 text-gray-600">{{ $client->email }}</td>
                <td class="p-4 text-gray-500 text-sm">{{ $client->created_at->format('d M Y') }}</td>
                <td class="p-4 text-right space-x-3">
                    <button class="text-gray-400 hover:text-indigo-600 transition"><i class="fas fa-eye"></i></button>
                    <button class="text-gray-400 hover:text-red-600 transition"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id="modal-client" class="hidden fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-8 transform transition-all">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-800">Ajouter un Membre</h3>
            <button onclick="toggleModal('modal-client')" class="text-gray-400 hover:text-gray-600">&times;</button>
        </div>
        
        <form action="{{ route('clients.store') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nom complet</label>
                <input type="text" name="nom" required placeholder="Ex: Jean Dupont" 
                    class="w-full p-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Adresse Email</label>
                <input type="email" name="email" required placeholder="jean@email.com" 
                    class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>
            
            <div class="flex space-x-3 pt-4">
                <button type="button" onclick="toggleModal('modal-client')" 
                    class="flex-1 px-4 py-3 bg-gray-100 text-gray-600 rounded-xl hover:bg-gray-200 transition font-bold">
                    Annuler
                </button>
                <button type="submit" 
                    class="flex-1 px-4 py-3 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition font-bold">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleModal(id) {
        const modal = document.getElementById(id);
        modal.classList.toggle('hidden');
    }
</script>
@endsection