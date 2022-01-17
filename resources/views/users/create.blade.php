<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    @livewire('users.user-create')

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors></x-auth-validation-errors>
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf

                        <h1 class="text-lg uppercase text-gray-700">
                            Personal Information
                        </h1>
                        <div class="flex sm:flex-row flex-col sm:space-x-2 w-full mt-2">
                            <div class="w-full">
                                <x-label for="name" value="First Name" />
                                <x-input type="text" id="name" name="first_name" :value="old('name')" class="w-full" required />
                            </div>
                            <div class="w-full">

                                <x-label for="name" value="Middle Name" />
                                <x-input type="text" id="name" name="middle_name" :value="old('name')" class="w-full" required />
                            </div>
                            <div class="w-full">

                                <x-label for="name" value="Last Name" />
                                <x-input type="text" id="name" name="last_name" :value="old('name')" class="w-full" required />
                            </div>
                            <div class="w-full sm:w-1/3">
                                <x-label for="name" value="Name Ext." />
                                <x-input type="text" id="name" name="name_ext" :value="old('name')" class="w-full" required />
                            </div>
                        </div>

                        <div class="flex sm:flex-row flex-col sm:space-x-2 w-full mt-2">
                            <div class="w-full">
                                <x-label for="name" value="Place of Birth" />
                                <x-input type="text" id="name" name="middle_name" :value="old('name')" class="w-full" required />
                            </div>
                            <div class="w-full sm:w-1/3">
                                <x-label for="name" value="Date of Birth" />
                                <x-input type="date" id="name" name="first_name" :value="old('name')" class="w-full" required />
                            </div>
                            <div class="w-full sm:w-1/6">
                                <x-label for="name" value="Gender" />
                                <x-input type="text" id="name" name="name_ext" :value="old('name')" class="w-full" required />
                            </div>
                        </div>

                        <div class="flex sm:flex-row flex-col sm:space-x-2 w-full mt-2">
                            <div class="w-full">
                                <x-label for="name" value="Address" />
                                <x-input type="text" id="name" name="middle_name" :value="old('name')" class="w-full" required />
                            </div>
                            <div class="w-full sm:w-1/2">
                                <x-label for="name" value="City" />
                                <x-input type="text" id="name" name="first_name" :value="old('name')" class="w-full" required />
                            </div>
                            <div class="w-full sm:w-1/2">
                                <x-label for="name" value="State" />
                                <x-input type="text" id="name" name="name_ext" :value="old('name')" class="w-full" required />
                            </div>
                            <div class="w-full sm:w-1/5">
                                <x-label for="name" value="Zip Code" />
                                <x-input type="text" id="name" name="name_ext" :value="old('name')" class="w-full" required />
                            </div>
                        </div>

                        <div class="flex sm:flex-row flex-col sm:space-x-2 w-full mt-2">
                            <div class="w-full sm:w-1/2">
                                <x-label for="name" value="Phone Number" />
                                <x-input type="text" id="name" name="name" :value="old('name')" class="w-full" required />
                            </div>
                            <div class="w-full sm:w-1/2">
                                <x-label for="email" value="Personal Email" />
                                <x-input type="email" id="email" name="email" :value="old('email')" class="w-full"
                                    required />
                            </div>
                        </div>

                        <h1 class="text-lg uppercase text-gray-700 mt-3">
                            User Information
                        </h1>
                        <div class="flex sm:flex-row flex-col sm:space-x-2 w-full mt-2">
                            <div class="w-full sm:w-1/2">
                                <x-label for="name" value="Username" />
                                <x-input type="text" id="name" name="name" :value="old('name')" class="w-full" required />
                            </div>
                            <div class="w-full sm:w-1/2">
                                <x-label for="email" value="Email" />
                                <x-input type="email" id="email" name="email" :value="old('email')" class="w-full"
                                    required />
                            </div>
                        </div>
                        <div class="mt-1">
                            <x-label for="roles" value="Roles" />
                            <div class="flex space-x-2">

                                @foreach ($roles as $role)
                                    <div class="flex">
                                        <input type="checkbox" name="roles[]" id="{{ $role->name }}" value="{{ $role->id }}" class="mr-1" />
                                        <x-label for="{{ $role->name }}" class="capitalize">{{ $role->name }}</x-label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex sm:flex-row flex-col sm:space-x-2 w-full mt-2">
                            <div class="w-full sm:w-1/2">
                                <x-label for="password" value="Password" />
                                <x-input type="password" id="password" name="password" class="w-full" required />
                            </div>
                            <div class="w-full sm:w-1/2">
                                <x-label for="password_confirmation" value="Confirm Password" />
                                <x-input type="password" id="password_confirmation" name="password_confirmation"
                                    class="w-full" required />
                            </div>
                        </div>
                        <x-button type="submit" class="mt-2">Save</x-button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
</x-app-layout>
