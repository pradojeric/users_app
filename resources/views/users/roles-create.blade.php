<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-auth-validation-errors></x-auth-validation-errors>
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('roles.store') }}" method="post">
                        @csrf
                        <div>
                            <x-label for="name" value="Name" />
                            <x-input type="text" id="name" name="name" :value="old('name')" class="w-full" />
                        </div>
                        <x-button type="submit" class="mt-2">Save</x-button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
