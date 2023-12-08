
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Liste des Entrées ')
        </h2>
    </x-slot>
    <div class="container flex justify-center mx-auto">
      <div class="flex flex-col">
          <div class="w-full">
              <div class="border-b border-gray-200 shadow pt-6">
              <form action="{{ route('Entree.store') }}" method="post">
            @csrf

          

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Ajouter') }}
                </x-button>
            </div>
        </form>
                <table>
                  <thead class="bg-gray-50">
                    <tr>
                      <th class="px-2 py-2 text-l text-gray-500">@lang('Num BE')</th>
                      <th class="px-2 py-2 text-l text-gray-500">@lang('Dates')</th>
                      <th class="px-2 py-2 text-l text-gray-500"></th>
                      <th class="px-2 py-2 text-l text-gray-500"></th>
                      <th class="px-2 py-2 text-l text-gray-500"></th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    @foreach($entrees as $entree)
                      <tr class="whitespace-nowrap">
                          <td class="px-4 py-4 text-sm text-gray-500">{{ $entree->num_be }}</td>
                         
                        <td class="px-4 py-4">{{ $entree->created_at }}</td>
                        
                       
                        <x-link-button href="{{ route('lignes.index', $entree->id) }}" style="background:#468e71">
    @lang('Afficher Lignes')
</x-link-button>

                        <x-link-button onclick="event.preventDefault(); document.getElementById('destroy{{ $entree->id }}').submit();" style="background:#e55246">
                            @lang('Supprimer')
                        </x-link-button>
                        <form id="destroy{{ $entree->id }}" action="{{ route('Entree.destroy', $entree->id) }}" method="POST" style="display: none;">
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