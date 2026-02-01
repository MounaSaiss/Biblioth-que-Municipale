@extends('layout')

@section('title', 'Ajouter un Livre')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
        <!-- Header -->
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Ajouter un Livre</h1>
        <p class="text-gray-600 mb-6">Remplissez le formulaire pour ajouter un nouveau livre à la bibliothèque</p>

        <!-- Form -->
        <form action="{{ route('books.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Title Field -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Titre</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="Entrez le titre du livre"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors @error('title') border-red-500 @enderror"
                    required>
                @error('title')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Author Field -->
            <div>
                <label for="author" class="block text-sm font-medium text-gray-700 mb-2">Auteur</label>
                <input
                    type="text"
                    id="author"
                    name="author"
                    value="{{ old('author') }}"
                    placeholder="Entrez le nom de l'auteur"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors @error('author') border-red-500 @enderror"
                    required>
                @error('author')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category Field -->
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Catégorie</label>
                <select
                    id="category"
                    name="category"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors @error('category') border-red-500 @enderror"
                    required>
                    <option value="">Sélectionnez une catégorie</option>
                    <option value="Fiction" {{ old('category') === 'Fiction' ? 'selected' : '' }}>Fiction</option>
                    <option value="Non-Fiction" {{ old('category') === 'Non-Fiction' ? 'selected' : '' }}>Non-Fiction</option>
                    <option value="Science" {{ old('category') === 'Science' ? 'selected' : '' }}>Science</option>
                    <option value="Histoire" {{ old('category') === 'Histoire' ? 'selected' : '' }}>Histoire</option>
                    <option value="Jeunesse" {{ old('category') === 'Jeunesse' ? 'selected' : '' }}>Jeunesse</option>
                    <option value="Poésie" {{ old('category') === 'Poésie' ? 'selected' : '' }}>Poésie</option>
                    <option value="Biographie" {{ old('category') === 'Biographie' ? 'selected' : '' }}>Biographie</option>
                </select>
                @error('category')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Price Field -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Prix</label>
                <div class="relative">
                    <span class="absolute left-3 top-2 text-gray-500">€</span>
                    <input
                        type="number"
                        id="price"
                        name="price"
                        value="{{ old('price') }}"
                        placeholder="0.00"
                        step="0.01"
                        min="0"
                        class="w-full pl-8 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors @error('price') border-red-500 @enderror"
                        required>
                </div>
                @error('price')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-3 pt-4">
                <button
                    type="submit"
                    class="flex-1 bg-indigo-600 text-white font-medium py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors">
                    Ajouter le Livre
                </button>
                <a
                    href="{{ route('books.index') }}"
                    class="flex-1 bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors text-center">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection