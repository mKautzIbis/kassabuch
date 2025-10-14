<div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y-2 divide-gray-200">
            <thead class="ltr:text-left rtl:text-right">
            <tr class="font-medium text-gray-900">
                <th class="px-3 py-2 whitespace-nowrap">Datum</th>
                <th class="px-3 py-2 whitespace-nowrap">Kategorie</th>
                <th class="px-3 py-2 whitespace-nowrap">Namen</th>
                <th class="px-3 py-2 whitespace-nowrap">Betrag</th>
                <th class="px-3 py-2 whitespace-nowrap"></th>
            </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
            @foreach($transactions as $transaction)
                <tr class="text-gray-900 first:font-medium">
                    <td class="px-3 py-2 whitespace-nowrap">{{\Carbon\Carbon::parse($transaction->date)->format('d.m.Y')}}</td>
                    <td class="px-3 py-2 whitespace-nowrap">
                        @if($transaction->category === null)
                            <div class="px-2 py-1 mx-2 my-1 rounded-full text-center">
                                Nicht zugewiesen
                            </div>
                        @else
                            <div style="background-color: {{$transaction->category->color}}; filter: brightness(1.2)"
                                 class="px-2 py-1 mx-2 my-1 rounded-full text-center">
                                {{$transaction->category->name}}
                            </div>
                        @endif
                    </td>
                    <td class="px-3 py-2 whitespace-nowrap">{{$transaction->name}}</td>
                    <td class="px-3 py-2 whitespace-nowrap {{ $transaction->amount < 0 ? 'text-red-600' : 'text-green-600' }}">{{$transaction->amount}}
                        €
                    </td>
                    <td class="px-3 py-2 whitespace-nowrap">
                            <flux:button variant="danger" icon="trash" wire:click="deleteQuestion({{$transaction->id}})"></flux:button>
                            <flux:button icon="pencil" wire:click="edit({{$transaction->id}})"></flux:button>
                    </td>
                </tr>
            @endforeach
            <flux:modal name="deleteModal" class="md:w-96">
                <div class="space-y-6">
                    <div>
                        <flux:heading size="lg">Wirklich Löschen?</flux:heading>
                        <flux:text class="mt-2">Bist du sicher, dass du diese Transaktion löschen willst?</flux:text>
                    </div>
                    <div class="flex">
                        <flux:spacer/>
                        <flux:button variant="danger" wire:click="delete">Löschen</flux:button>
                    </div>
                </div>
            </flux:modal>
            </tbody>
        </table>
        {{ $transactions->links() }}
    </div>
</div>
