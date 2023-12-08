<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Détails de Produits')
        </h2>
    </x-slot>

    <x-div-card>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Nom de la Catégorie')</h3>
        <p>
            @foreach($categories as $categorie)
                @if ($categorie->id == $produit->categorie_id)
                {{ $categorie->nom }}
                @endif
            @endforeach
        </p>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Libellé')</h3>
        <p>{{ $produit->libelle }}</p>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Stock')</h3>
        <p>{{ $produit->stock }}</p> 
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Date de création')</h3>
        <p>{{ $produit->created_at->format('d/m/Y') }}</p>
        @if($produit->created_at != $produit->updated_at)
          <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Last update')</h3>
          <p>{{ $produit->updated_at->format('d/m/Y') }}</p>
        @endif
    </x-div-card>
</x-app-layout>