<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of Staff ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto lg:px-2">
            <x-auth-validation-errors></x-auth-validation-errors>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-2 bg-white border-b border-gray-200">
                    <a href="{{ route('staff.create') }}" class="m-2 px-3 py-2 bg-green-500 hover:bg-green-300 rounded shadow-sm text-white text-sm">Register New Staff</a>
                    <h1 class="text-lg uppercase text-gray-500 p-6">
                        List of Staffs
                    </h1>
                    <table class="table w-full mt-2">
                        <thead>
                            <tr>
                                <th class="uppercase text-gray-700 tracking-tighter text-sm py-2">Staff Name</th>
                                <th class="uppercase text-gray-700 tracking-tighter text-sm py-2">Email</th>
                                <th class="uppercase text-gray-700 tracking-tighter text-sm py-2">Employee Id</th>
                                <th class="uppercase text-gray-700 tracking-tighter text-sm py-2">Teneurship</th>
                                <th class="uppercase text-gray-700 tracking-tighter text-sm py-2">Position</th>
                                <th class="uppercase text-gray-700 tracking-tighter text-sm py-2">Date of Employment</th>
                                <th class="uppercase text-gray-700 tracking-tighter text-sm py-2">End of Contract</th>
                                <th class="uppercase text-gray-700 tracking-tighter text-sm py-2">College</th>
                                <th class="uppercase text-gray-700 tracking-tighter text-sm py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffs as $staff)
                                <tr>
                                    <td class="px-6 py-2 text-sm text-center">
                                        {{ $staff->employee_name }}
                                    </td>
                                    <td class="px-6 py-2 text-sm text-center">
                                        {{ $staff->user->email }}
                                    </td>
                                    <td class="px-6 py-2 text-sm text-center">
                                        {{ $staff->employee_id }}
                                    </td>
                                    <td class="px-6 py-2 text-sm text-center">
                                        {{ $staff->tenureship->name }}
                                    </td>
                                    <td class="px-6 py-2 text-sm text-center">
                                        {{ $staff->position->name }}
                                    </td>
                                    <td class="px-6 py-2 text-sm text-center">
                                        {{ $staff->doe }}
                                    </td>
                                    <td class="px-6 py-2 text-sm text-center">
                                        {{ $staff->eoc }}
                                    </td>
                                    <td class="px-6 py-2 text-sm text-center">
                                        {{ $staff->college->name }}
                                    </td>
                                    <td class="px-6 py-2 text-sm text-center">
                                        <div class="flex flex-col space-y-1">
                                            <button wire:click.prevent="$emit('openModal', 'staff.user-modal', {{ json_encode(['staffId' => $staff->id]) }})" class="px-2 py-1 bg-yellow-500 hover:bg-yellow-300 rounded shadow-sm text-white text-xs">Edit User Account</button>
                                            <a href="{{ route('staff.edit', $staff->id) }}" class="px-2 py-1 bg-green-500 hover:bg-green-300 rounded shadow-sm text-white text-xs">Edit</a>
                                            <button text="button" wire:click="delete({{ $staff }})" class="px-2 py-1 bg-red-500 hover:bg-red-300 rounded shadow-sm text-white text-xs">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
