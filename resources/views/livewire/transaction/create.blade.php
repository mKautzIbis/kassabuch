<div>
    <flux:modal.trigger name="createTransaction">
        <flux:button icon="document-plus"></flux:button>
    </flux:modal.trigger>
    <flux:modal name="createTransaction" class="md:w-96" variant="flyout">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Transaktion erstellen</flux:heading>
            </div>
            <flux:radio.group wire:model="type" variant="segmented">
                <flux:radio label="Einzahlung" icon="arrow-trending-down" value="0" />
                <flux:radio label="Auszahlung" icon="arrow-trending-up" value="1" />
            </flux:radio.group>
            <flux:input label="Titel" wire:model="name"/>
            <flux:input label="Datum" type="date" wire:model="date"/>
            <flux:select label="Kategorie" wire:model="category_id" placeholder="Kategorie">
                @foreach($categories as $category)
                    <flux:select.option value="{{$category->id}}" class="text-black" style="background: {{$category->color}}">{{$category->name}}</flux:select.option>
                @endforeach
            </flux:select>
            <flux:input label="Betrag" type="number" wire:model="amount"/>
            <div class="flex">
                <flux:spacer/>
                <flux:button variant="primary" wire:click="save">Speichern</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
