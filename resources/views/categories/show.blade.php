<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Détails de Catégories')
        </h2>
    </x-slot>

    <x-div-card>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Nom de la categorie')</h3>
        <p>{{ $categorie->nom }}</p>
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Date de creation')</h3>
        <p>{{ $categorie->created_at->format('d/m/Y') }}</p>
        @if($categorie->created_at != $categorie->updated_at)
          <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Last update')</h3>
          <p>{{ $categorie->updated_at->format('d/m/Y') }}</p>
        @endif
    </x-div-card>
</x-app-layout>