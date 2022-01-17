<div>
    <x-modal formAction="store">
        <x-slot name="title">
            Add Course
        </x-slot>
        <x-slot name="content">

            <div>
                <x-label for="department_id">Department</x-label>
                <select name="" id="department_id" wire:model="department_id" class="w-full rounded border border-gray-300 shadow-sm">
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <x-label for="name">Name</x-label>
                <x-input type="text" class="w-full px-2" id="name" wire:model="name"></x-input>
            </div>
            <div>
                <x-label for="code">Code</x-label>
                <x-input type="text" class="w-full px-2" id="code" wire:model="code"></x-input>
            </div>
            <div>
                <x-label for="majors">Majors</x-label>

                @foreach ($majors as $i => $major)
                    <div class="flex space-x-2 mt-1">
                        <x-input type="text" class="w-full" wire:model="majors.{{ $i }}.name" />
                        <x-button type="button" wire:click="deleteMajor({{ $i }})" class="text-xs">Delete</x-button>
                    </div>
                @endforeach
                <x-button type="button" wire:click="addMajor" class="mt-1 text-xs">Add Major</x-button>

            </div>
        </x-slot>
        <x-slot name="buttons">

            <div class="flex justify-end space-x-2">

                <x-button type="submit">
                    {{ $course ? 'Update' : 'Add' }}
                </x-button>
                <x-button type="button" wire:click="closeModal">Close</x-button>
            </div>

        </x-slot>
    </x-modal>
</div>
