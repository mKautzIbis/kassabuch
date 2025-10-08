<x-layouts.app>
    <div class="p-5">
        <div class="flex flex-row justify-between">
            <h1 class="text-2xl font-semibold">Transaktionen</h1>
            <livewire:transaction.create />
        </div>
        <livewire:transaction.index />
    </div>
    <livewire:transaction.edit />
</x-layouts.app>
