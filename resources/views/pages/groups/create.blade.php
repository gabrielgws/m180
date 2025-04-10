<x-layouts.app>
    @include('partials.groups-heading')
    <x-layouts.groups>
        <x-slot:heading>{{ __('Criar grupo') }}</x-slot:heading>
        <x-slot:subheading>{{ __('Preencha os dados abaixo para criar um grupo.') }}</x-slot:subheading>

        {{-- Conteúdo principal aqui --}}
        <form>
            <input type="text" placeholder="Nome do grupo" class="w-full p-2 border rounded mb-4">
            <textarea placeholder="Descrição" class="w-full p-2 border rounded mb-4"></textarea>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Criar</button>
        </form>
    </x-layouts.groups>
</x-layouts.app>
