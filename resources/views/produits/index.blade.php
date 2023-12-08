
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Liste des Produits ')
        </h2>
    </x-slot>
    <div class="container flex justify-center mx-auto">
      <div class="flex flex-col">
          <div class="w-full">
              <div class="border-b border-gray-200 shadow pt-6">
              <x-link-button href="{{route('Produit.create')}}">
                            @lang('Ajouter')
                        </x-link-button>
                <table>
                  <thead class="bg-gray-50">
                    <tr>
                      <th class="px-2 py-2 text-l text-gray-500">#</th>
                      <th class="px-2 py-2 text-l text-gray-500">@lang('Catégories')</th>
                      <th class="px-2 py-2 text-l text-gray-500">@lang('Libellés')</th>
                      <th class="px-2 py-2 text-l text-gray-500">@lang('Stocks')</th>
                      <th class="px-2 py-2 text-l text-gray-500">@lang('Dates')</th>
                      <th class="px-2 py-2 text-l text-gray-500"></th>
                      <th class="px-2 py-2 text-l text-gray-500"></th>
                      <th class="px-2 py-2 text-l text-gray-500"></th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    @foreach($produits as $produit)
                      <tr class="whitespace-nowrap">
                          <td class="px-4 py-4 text-sm text-gray-500">{{ $produit->id }}</td>
                          <td class="px-4 py-4">
                              @foreach($categories as $categorie)
                                  @if ($categorie->id == $produit->categorie_id)
                                  {{ $categorie->nom }}
                                  @endif
                              @endforeach
                          </td>
                        <td class="px-4 py-4">{{ $produit->libelle }}</td>
                        <td class="px-4 py-4">{{ $produit->stock }}</td>
                        <x-link-button href="{{ route('Produit.show', $produit->id) }}" style="background:#308bb4">
                            @lang('Voir')
                        </x-link-button>
                        <x-link-button href="{{ route('Produit.edit', $produit->id) }}" style="background:#e1c249">
                            @lang('Modifier')
                        </x-link-button>
                        <x-link-button onclick="event.preventDefault(); document.getElementById('destroy{{ $produit->id }}').submit();" style="background:#e55246">
                            @lang('Supprimer')
                        </x-link-button>
                        <form id="destroy{{ $produit->id }}" action="{{ route('Produit.destroy', $produit->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
          </div>
      </div>
</x-app-layout>