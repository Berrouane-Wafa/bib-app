<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wattly - Gestion de Bibliothèque</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans">
    <div class="flex min-h-screen">
        <aside class="w-64 bg-indigo-900 text-white flex-col hidden md:flex">
            <div class="p-6 text-2xl font-bold border-b border-indigo-800">
                <i class="fas fa-book-open mr-2 text-indigo-400"></i> Bibiothèque 
            </div>
            <nav class="flex-1 mt-6 p-4">
                <a href="{{ route('books.index') }}" class="flex items-center p-3 mb-2 rounded-lg hover:bg-indigo-800 transition">
                    <i class="fas fa-book mr-3 w-5"></i> Livres
                </a>
                <a href="{{ route('authors.index') }}" class="flex items-center p-3 mb-2 rounded-lg hover:bg-indigo-800 transition">
                    <i class="fas fa-user-nib mr-3 w-5"></i> Auteurs
                </a>
                <a href="{{ route('publishers.index') }}" class="flex items-center p-3 mb-2 rounded-lg hover:bg-indigo-800 transition">
                    <i class="fas fa-user-nib mr-3 w-5"></i> Editions
                </a>
                <a href="{{ route('loans.index') }}" class="flex items-center p-3 mb-2 rounded-lg hover:bg-indigo-800 transition">
                    <i class="fas fa-exchange-alt mr-3 w-5"></i> Emprunts
                </a>
                <a href="{{ route('clients.index') }}" class="flex items-center p-3 mb-2 rounded-lg hover:bg-indigo-800 transition">
                    <i class="fas fa-users mr-3 w-5"></i> Clients
                </a>
            </nav>
        </aside>

        <main class="flex-1 p-8">
            <header class="flex justify-between items-center mb-8">
                <h1 class="text-2xl font-semibold text-gray-800">@yield('title')</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-500">Admin Bibliothécaire</span>
                    <div class="w-10 h-10 bg-indigo-500 rounded-full flex items-center justify-center text-white font-bold">A</div>
                </div>
            </header>

            @yield('content')
        </main>
    </div>
</body>
</html>