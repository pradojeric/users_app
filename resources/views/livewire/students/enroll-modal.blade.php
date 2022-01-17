<div>
    <x-modal formAction="store">
        <x-slot name="title">
            Edit Enrollment Details
        </x-slot>
        <x-slot name="content">
            <x-auth-validation-errors></x-auth-validation-errors>
            <div>
                <x-label for="studentId">New Student Id</x-label>
                <x-input type="text" class="w-full border px-2" id="studentId" wire:model="studentId" autofocus></x-input>
            </div>

            <div>
                <x-label for="enrollmentStatus">Enrollment Status</x-label>
                <x-select id="enrollmentStatus" wire:model.defer="enrollmentStatus" class="w-full">
                    <option value="" selected>Choose</option>
                    <option value="admitted">Admitted</option>
                    <option value="enrolled">Enrolled</option>
                </x-select>
            </div>

            <hr>
            <h1 class="mt-2 uppercase text-gray-700">User Account</h1>
            <div>
                <x-label for="user">Username</x-label>
                <x-input type="text" class="w-full border px-2" id="user" wire:model="user" autofocus></x-input>
            </div>
            <div>
                <x-label for="email">Email</x-label>
                <x-input type="text" class="w-full border px-2" id="email" wire:model="email" autofocus></x-input>
                <span class="text-xs text-red-500">Default password: colegio2021</span>
            </div>

        </x-slot>
        <x-slot name="buttons">

            <div class="flex justify-end space-x-2">

                <x-button type="submit">
                    {{ $student ? 'Update' : 'Add' }}
                </x-button>
                <x-button type="button" wire:click="closeModal">Close</x-button>
            </div>

        </x-slot>
    </x-modal>
</div>
