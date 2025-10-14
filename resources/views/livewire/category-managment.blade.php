<div class="p-5">
    <h1 class="text-2xl font-semibold">Kategorieverwaltung</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y-2 divide-gray-200 mt-3">
            <thead class="ltr:text-left rtl:text-right">
            <tr class="font-medium text-gray-900">
                <th class="px-3 py-2 whitespace-nowrap">Kategorie</th>
                <th class="px-3 py-2 whitespace-nowrap">Farbe</th>
                <th class="px-3 py-2 whitespace-nowrap"></th>
            </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
            @foreach($categories as $category)
                @if($marked_for_edit === $category->id)
                    <tr class="text-gray-900 first:font-medium">
                        <td class="px-3 py-2 whitespace-nowrap w-1/4"><flux:input wire:model="edit_name" /></td>
                        <td class="px-3 py-2 whitespace-nowrap w-1/4"><input type="color" wire:model="edit_color" class="w-full" /></td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <flux:button icon="check" wire:click="save_edit" />
                        </td>
                    </tr>
                @else
                    <tr class="text-gray-900 first:font-medium">
                        <td class="px-3 py-2 whitespace-nowrap w-1/4">{{$category->name}}</td>
                        <td class="px-3 py-2 whitespace-nowrap w-1/4" style="background: {{$category->color}}"></td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <flux:button variant="danger" icon="trash" wire:click="deleteQuestion({{$category->id}})"></flux:button>
                            <flux:button icon="pencil" wire:click="edit({{$category->id}})"></flux:button>
                        </td>
                    </tr>
                @endif
            @endforeach
            <tr class="text-gray-900 first:font-medium" wire:click="close_edit">
                <td class="px-3 py-2 whitespace-nowrap w-1/4"><flux:input wire:model="name" /></td>
                <td class="px-3 py-2 whitespace-nowrap w-1/4"><input type="color" wire:model="color" class="w-full" /></td>
                <td class="px-3 py-2 whitespace-nowrap text-end align-baseline"><flux:button icon="plus" wire:click="addCategory" /></td>
            </tr>
            </tbody>
            <flux:modal name="deleteModal" class="md:w-96">
                <div class="space-y-6">
                    <div>
                        <flux:heading size="lg">Wirklich Löschen?</flux:heading>
                        <flux:text class="mt-2">Bist du sicher, dass du diese Kategorie löschen willst?</flux:text>
                    </div>
                    <div class="flex">
                        <flux:spacer/>
                        <flux:button variant="danger" wire:click="delete">Löschen</flux:button>
                    </div>
                </div>
            </flux:modal>
        </table>
        <flux:error name="name" />
        <flux:error name="max_categories" />
        <flux:error name="edit_name" />
    </div>
</div>
