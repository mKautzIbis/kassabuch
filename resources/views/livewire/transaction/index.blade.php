<div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y-2 divide-gray-200">
            <thead class="ltr:text-left rtl:text-right">
            <tr class="font-medium text-gray-900">
                <th class="px-3 py-2 whitespace-nowrap">Datum</th>
                <th class="px-3 py-2 whitespace-nowrap">Kategorie</th>
                <th class="px-3 py-2 whitespace-nowrap">Namen</th>
                <th class="px-3 py-2 whitespace-nowrap">Betrag</th>
            </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
            @foreach($transactions as $transaction)
                <tr class="text-gray-900 first:font-medium">
                    <td class="px-3 py-2 whitespace-nowrap">{{\Carbon\Carbon::parse($transaction->date)->format('d.m.Y')}}</td>
                    <td class="px-3 py-2 whitespace-nowrap">
                        <div style="background-color: {{$transaction->category->color}}" class="px-2 py-1 mx-2 my-1 rounded-full text-center">
                            {{$transaction->category->name}}
                        </div>
                    </td>
                    <td class="px-3 py-2 whitespace-nowrap">{{$transaction->name}}</td>
                    <td class="px-3 py-2 whitespace-nowrap {{ $transaction->amount < 0 ? 'text-red-600' : 'text-green-600' }}">{{$transaction->amount}}€</td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {{ $transactions->links() }}
    </div>
</div>
