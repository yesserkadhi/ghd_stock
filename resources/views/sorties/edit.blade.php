<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier une sortie') }}
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

        <form action="{{ route('Sortie.update', $sortie->id) }}" method="post">
            @csrf
            @method('put')

             <!-- NOM -->
             <div>
                <x-label for="produit_id" :value="__('Produit')" />

                <select class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="produit_id" name="produit_id">
                    @foreach($produits as $produit)
                
                        <option value="{{ $produit->id }}">{{ $produit->libelle }}</option>
                
                    @endforeach
                
                </select>
            </div>

            <div>
                <x-label for="quantite" :value="__('Quantité')" />

                <x-input id="quantite" class="block mt-1 w-full" type="number" name="quantite" :value="old('quantite', $sortie->quantite)" required autofocus />
            </div>

            <div>
                <x-label for="prix" :value="__('Prix')" />

                <x-input id="prix" class="block mt-1 w-full" type="number" name="prix" :value="old('prix', $sortie->prix)" required autofocus />
            </div>

            <div>
                <x-label for="date" :value="__('Date')" />

                <x-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date', $sortie->date)" required autofocus />
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Modifier') }}
                </x-button>
            </div>
        </form>

    </x-div-card>
</x-app-layout>