
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Liste des Sorties ')
        </h2>
    </x-slot>
    <div class="container flex justify-center mx-auto">
      <div class="flex flex-col">
          <div class="w-full">
              <div class="border-b border-gray-200 shadow pt-6">
              <x-link-button href="{{route('Sortie.create')}}">
                            @lang('Ajouter')
                        </x-link-button>
                <table>
                  <thead class="bg-gray-50">
                    <tr>
                      <th class="px-2 py-2 text-l text-gray-500">#</th>
                      <th class="px-2 py-2 text-l text-gray-500">@lang('Produits')</th>
                      <th class="px-2 py-2 text-l text-gray-500">@lang('Quantités')</th>
                      <th class="px-2 py-2 text-l text-gray-500">@lang('Prix')</th>
                      <th class="px-2 py-2 text-l text-gray-500">@lang('Dates')</th>
                      <th class="px-2 py-2 text-l text-gray-500"></th>
                      <th class="px-2 py-2 text-l text-gray-500"></th>
                      <th class="px-2 py-2 text-l text-gray-500"></th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    @foreach($sorties as $sortie)
                      <tr class="whitespace-nowrap">
                          <td class="px-4 py-4 text-sm text-gray-500">{{ $sortie->id }}</td>
                          <td class="px-4 py-4">
                              @foreach($produits as $produit)
                                  @if ($produit->id == $sortie->produit_id)
                                  {{ $produit->libelle }}
                                  @endif
                              @endforeach
                          </td>
                        <td class="px-4 py-4">{{ $sortie->quantite }}</td>
                        <td class="px-4 py-4">{{ $sortie->prix }}</td>
                        <td class="px-4 py-4">{{ $sortie->date }}</td>
                        <x-link-button href="{{ route('Sortie.show', $sortie->id) }}" style="background:#308bb4">
                            @lang('Voir')
                        </x-link-button>
                  
                        <x-link-button onclick="event.preventDefault(); document.getElementById('destroy{{ $sortie->id }}').submit();"  style="background:#e55246">
                            @lang('Supprimer')
                        </x-link-button>
                        <form id="destroy{{ $sortie->id }}" action="{{ route('Sortie.destroy', $sortie->id) }}" method="POST" style="display: none;">
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