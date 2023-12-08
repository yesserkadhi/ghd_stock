<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une Entrée') }}
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

        <form action="{{ route('Entree.store') }}" method="post">
            @csrf

          

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Créer') }}
                </x-button>
            </div>
        </form>

    </x-div-card>
</x-app-layout>