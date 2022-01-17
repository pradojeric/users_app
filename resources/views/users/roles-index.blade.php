<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="m-2">
                    <x-auth-session-status :status="session('success')"></x-auth-session-status>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('roles.create') }}" class="m-2 px-3 py-2 bg-green-500 hover:bg-green-300 rounded shadow-sm text-white text-sm">Add Role</a>
                    <table class="table w-full mt-2">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td class="px-2 py-3 text-center">{{ $role->name }}</td>
                                    <td class="px-3 py-2 text-center">
                                        <a href="{{ route('roles.edit', $role) }}" class="px-2 py-1 bg-green-500 hover:bg-green-300 text-white text-sm rounded shadow-sm">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
