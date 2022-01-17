<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors></x-auth-validation-errors>
                    <form action="{{ route('users.update', $user) }}" method="post">
                        @csrf
                        @method('put')
                        <div>
                            <x-label for="name" value="Name" />
                            <x-input type="text" id="name" name="name" :value="$user->name" class="w-full" required />
                        </div>
                        <div class="mt-1">
                            <x-label for="email" value="Email" />
                            <x-input type="email" id="email" name="email" :value="$user->email" class="w-full"
                                required />
                        </div>
                        <div class="mt-1">
                            <x-label for="roles" value="Roles" />
                            <div class="flex space-x-2">

                                @foreach ($roles as $role)
                                    <div class="flex">
                                        <input type="checkbox" name="roles[]" id="{{ $role->name }}" value="{{ $role->id }}" class="mr-1" {{ $user->hasRole($role) ? 'checked' : '' }} />
                                        <x-label for="{{ $role->name }}" class="capitalize">{{ $role->name }}</x-label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-1">
                            <x-label for="password" value="Password" />
                            <x-input type="password" id="password" name="password" class="w-full" />
                        </div>
                        <div class="mt-1">
                            <x-label for="password_confirmation" value="Confirm Password" />
                            <x-input type="password" id="password_confirmation" name="password_confirmation"
                                class="w-full" />
                        </div>
                        <x-button type="submit" class="mt-2">Save</x-button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
