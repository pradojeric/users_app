<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Offices') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="m-2">
                    <x-auth-session-status :status="session('success')"></x-auth-session-status>
                </div>
                <div class="px-6 py-2">

                    <x-button wire:click="$emit('openModal', 'office.office-modal')">Add Office</x-button>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">

                    <table class="table w-full mt-2">
                        <thead>
                            <tr>
                                <th class="uppercase text-gray-700 tracking-tight text-sm py-2">Name</th>
                                <th class="uppercase text-gray-700 tracking-tight text-sm py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($offices as $office)
                                <tr>
                                    <td class="px-6 py-2">
                                        {{ $office->name }}
                                    </td>
                                    <td class="px-6 py-2 text-center">
                                        <button type="button" wire:click="$emit('openModal', 'office.office-modal', {{ json_encode(['office' => $office->id]) }})" class="px-2 py-1 text-white bg-yellow-500 hover:bg-yellow-300 rounded shadow-sm text-xs">
                                            Edit
                                        </button>
                                        <button type="button" class="px-2 py-1 text-white bg-red-500 hover:bg-red-300 rounded shadow-sm text-xs"
                                            x-data x-on:click='
                                                if(confirm("Delete this office?")){
                                                    $wire.deleteOffice({{ $office }});
                                                }
                                            '>
                                            Delete
                                        </button>
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
