<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Détails de Sorties')
        </h2>
    </x-slot>

    <x-div-card>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Nom du Produit')</h3>
        <p>
            @foreach($produits as $produit)
                @if ($produit->id == $sortie->produit_id)
                {{ $produit->libelle }}
                @endif
            @endforeach
        </p>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Quantité')</h3>
        <p>{{ $sortie->quantite }}</p>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Prix')</h3>
        <p>{{ $sortie->prix }}</p> 
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Date de sortie')</h3>
        <p>{{ $sortie->created_at->format('d/m/Y') }}</p>
        @if($sortie->created_at != $sortie->updated_at)
          <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Last update')</h3>
          <p>{{ $sortie->updated_at->format('d/m/Y') }}</p>
        @endif
    </x-div-card>
</x-app-layout>