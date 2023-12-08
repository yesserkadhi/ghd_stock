<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier un produit') }}
        </h2>
    </x-slot>

    <x-div-card>

        <!-- Erreurs de validation -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('Produit.update', $produit->id) }}" method="post">
            @csrf
            @method('put')

             <!-- Cat -->
             <div>
                <x-label for="categorie_id" :value="__('categorie')" />

                <select class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="categorie_id" name="categorie_id">
                    @foreach($categories as $categorie)
                
                        <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                
                    @endforeach
                
                </select>
            </div>

            <div>
                <x-label for="libelle" :value="__('Libelle')" />

                <x-input id="libelle" class="block mt-1 w-full" type="text" name="libelle" :value="old('libelle', $produit->libelle)" required autofocus />
            </div>

            <div>
                <x-label for="stock" :value="__('Stock')" />

                <x-input id="stock" class="block mt-1 w-full" type="number" name="stock" :value="old('stock', $produit->stock)" required autofocus />
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Modifier') }}
                </x-button>
            </div>
        </form>

    </x-div-card>
</x-app-layout>