@extends('layout')

@section('title', 'Détails du Livre')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
    <!-- Modal Background Overlay -->
    <div class="fixed inset-0 bg-black bg-opacity-50 z-40"></div>

    <!-- Modal Container -->
    <div class="relative z-50 w-full max-w-2xl">
        <div class="bg-white rounded-lg shadow-xl overflow-hidden">
            <!-- Modal Header -->
            <div class="px-6 py-4 bg-gradient-to-r from-indigo-600 to-indigo-700 flex justify-between items-center">
                <h2 class="text-2xl font-bold text-white">Détails du Livre</h2>
                <a href="{{ route('books.index') }}" class="text-white hover:text-gray-200 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </a>
            </div>

            <!-- Modal Content -->
            <div class="px-6 py-8 space-y-6">
                <!-- Title -->
                <div>
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Titre</h3>
                    <p class="text-xl font-semibold text-gray-900">{{ $book->title }}</p>
                </div>

                <!-- Author -->
                <div>
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Auteur</h3>
                    <p class="text-lg text-gray-700">{{ $book->author ?? 'Non spécifié' }}</p>
                </div>

                <!-- Category -->
                <div>
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Catégorie</h3>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-indigo-100 text-indigo-800">
                        {{ $book->category ?? 'Non classé' }}
                    </span>
                </div>

                <!-- Price -->
                <div>
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Prix</h3>
                    <p class="text-2xl font-bold text-indigo-600">{{ number_format($book->price ?? 0, 2, ',', ' ') }} €</p>
                </div>

                <!-- Additional Information -->
                <div class="grid grid-cols-2 gap-4 pt-4 border-t border-gray-200">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Créé le</h3>
                        <p class="text-gray-700">{{ $book->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Modifié le</h3>
                        <p class="text-gray-700">{{ $book->updated_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex gap-3">
                <a
                    href="{{ route('books.edit', $book->id) }}"
                    class="flex-1 inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Modifier
                </a>
                <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce livre?');">
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Supprimer
                    </button>
                </form>
                <a
                    href="{{ route('books.index') }}"
                    class="flex-1 inline-flex items-center justify-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                    Fermer
                </a>
            </div>
        </div>
    </div>
</div>
@endsection