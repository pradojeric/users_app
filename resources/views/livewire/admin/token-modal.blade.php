<div>
    <x-modal formAction="store">
        <x-slot name="title">
            Add Token
        </x-slot>
        <x-slot name="content">
            <div>
                <x-label for="name">Name</x-label>
                <x-input type="text" class="w-full border px-2" id="name" wire:model="name" autofocus></x-input>
            </div>
            <div>
                <x-label for="scope">Scope</x-label>
                <x-input type="text" class="w-full border px-2" id="scope" wire:model="scope" placeholder="scope1,scope2"></x-input>
                <span class="text-xs text-gray-700 italic">Leave blank if no scope. Separate with comma only</span>
            </div>
        </x-slot>
        <x-slot name="buttons">

            <div class="flex justify-end space-x-2">
                <x-button type="submit">
                    Add
                </x-button>
                <x-button type="button" wire:click="closeModal">Close</x-button>
            </div>

        </x-slot>
    </x-modal>
</div>
