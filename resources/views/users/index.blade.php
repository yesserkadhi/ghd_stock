
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Liste des Roles ')
        </h2>
    </x-slot>
    <div class="container flex justify-center mx-auto">
      <div class="flex flex-col">
          <div class="w-full">
              <div class="border-b border-gray-200 shadow pt-6">
              <x-link-button href="{{route('User.create')}}">
                            @lang('Ajouter')
                        </x-link-button>
                <table>
                  <thead class="bg-gray-50">
                    <tr>
                      <th class="px-2 py-2 text-l text-gray-500">#</th>
                      <th class="px-2 py-2 text-l text-gray-500">@lang('Nom')</th>
                      <th class="px-2 py-2 text-l text-gray-500">@lang('Prenom')</th>
                      <th class="px-2 py-2 text-l text-gray-500">@lang('Email')</th>
                      <th class="px-2 py-2 text-l text-gray-500">@lang('Role')</th>

                      <th class="px-2 py-2 text-l text-gray-500"></th>
                      <th class="px-2 py-2 text-l text-gray-500"></th>
                      <th class="px-2 py-2 text-l text-gray-500"></th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    @foreach($users as $user)
                      <tr class="whitespace-nowrap">
                        <td class="px-4 py-4 text-sm text-gray-500">{{ $user->id }}</td>
                        <td class="px-4 py-4">{{ $user->nom }}</td>
                        <td class="px-4 py-4">{{ $user->prenom }}</td>
                        <td class="px-4 py-4">{{ $user->email }}</td>
                        
                        <x-link-button href="{{ route('User.edit', $user->id) }}" style="background:#e1c249">
                            @lang('Modifier')
                        </x-link-button>
                        <x-link-button onclick="event.preventDefault(); document.getElementById('destroy{{ $user->id }}').submit();" style="background:#e55246">
                            @lang('Supprimer')
                        </x-link-button>
                        <form id="destroy{{ $user->id }}" action="{{ route('User.destroy', $user->id) }}" method="POST" style="display: none;">
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