<x-layouts.app>
    <div class="p-5">
        <div class="flex flex-row justify-between">
            <h1 class="text-2xl font-semibold">Statistics</h1>
        </div>
        <div class="flex flex-row space-x-5">
            <div class="w-96 flex flex-col">
                <h2 class="text-xl font-semibold">Spendings per Category</h2>
                <livewire:chart-spending-per-category/>
            </div>
            <div class="w-96 h-96 flex flex-col">
                <h2 class="text-xl font-semibold">Income per Category</h2>
                <livewire:chart-income-per-category/>
            </div>
        </div>
    </div>

</x-layouts.app>
