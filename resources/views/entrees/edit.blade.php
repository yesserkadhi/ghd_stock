<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier une entrée') }}
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

        <form action="{{ route('Entree.update', $entree->id) }}" method="post">
            @csrf
            @method('put')

             <!-- NOM -->
          

            <div>
                <x-label for="num_be" :value="__('Num Bande Entree')" />

                <x-input id="num_be" class="block mt-1 w-full" type="text" name="num_be" :value="old('num_be', $entree->num_be)" required autofocus />
            </div>


       

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Modifier') }}
                </x-button>
            </div>
        </form>

    </x-div-card>
</x-app-layout>