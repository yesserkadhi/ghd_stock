<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Détails d\'Entrées')
        </h2>
    </x-slot>

    <x-div-card>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Nom du Produite')</h3>
        <p>
            @foreach($produits as $produit)
                @if ($produit->id == $ligne->produit_id)
                {{ $produit->libelle }}
                @endif
            @endforeach
        </p>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Quantité')</h3>
        <p>{{ $ligne->quantite }}</p>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Prix')</h3>
        <p>{{ $ligne->prix }}</p> 
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Date d entrée')</h3>
        <p>{{ $ligne->created_at->format('d/m/Y') }}</p>
        @if($ligne->created_at != $ligne->updated_at)
          <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Last update')</h3>
          <p>{{ $ligne->updated_at->format('d/m/Y') }}</p>
        @endif
    </x-div-card>
</x-app-layout>