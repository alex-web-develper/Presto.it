<x-layout title="Inserisci Il tuo prodotto">
    <x-header>
        Inserisci il tuo prodotto
    </x-header>

    <div class="container my-5">
        <div class="row justify-content-center">
            {{-- componente livewire --}}
            @livewire('annuncement-create')
        </div>
    </div>
    <script src="/annuncement-create.js"></script>
</x-layout>
