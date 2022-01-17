<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Student User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-auth-validation-errors></x-auth-validation-errors>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">

                    <form wire:submit="store">
                        <h1 class="text-lg uppercase text-gray-500">
                            <span>Student's</span>
                            Personal Information
                        </h1>

                        <div class="text-right mt-2">
                            <x-button type="button" wire:click="setPage(2)">Back</x-button>
                            <x-button type="button" wire:click="store">Save</x-button>
                        </div>

                        <h1 class="text-lg uppercase text-gray-500 mt-3">
                            User Information
                        </h1>
                        <div class="flex sm:flex-row flex-col sm:space-x-2 w-full mt-2">
                            <div class="w-full sm:w-1/2">
                                <x-label for="name" value="Username" />
                                <x-input type="text" id="name" wire:model="name" class="w-full"  />
                            </div>
                            <div class="w-full sm:w-1/2">
                                <x-label for="email" value="Email" />
                                <x-input type="email" id="email" wire:model="email" class="w-full"
                                        />
                            </div>
                        </div>

                        <div class="flex sm:flex-row flex-col sm:space-x-2 w-full mt-2">
                            <span class="text-xs text-gray-700">Default password: colegio2021</span>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
