<div>
    <x-modal formAction="store">
        <x-slot name="title">
            Add Office
        </x-slot>
        <x-slot name="content">
            <div>

                <x-label for="name">Name</x-label>
                <x-input type="text" class="w-full border px-2" id="name" wire:model="name" autofocus></x-input>
            </div>
        </x-slot>
        <x-slot name="buttons">

            <div class="flex justify-end space-x-2">

                <x-button type="submit">
                    {{ $office ? 'Update' : 'Add' }}
                </x-button>
                <x-button type="button" wire:click="closeModal">Close</x-button>
            </div>

        </x-slot>
    </x-modal>
</div>
