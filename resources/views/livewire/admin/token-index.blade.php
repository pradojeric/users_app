<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Api Tokens') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="m-2">
                    <x-auth-session-status :status="session('success')"></x-auth-session-status>
                </div>
                <div class="px-6 py-2">
                    <x-button wire:click="$emit('openModal', 'admin.token-modal')">Add Token</x-button>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">

                    <table class="table w-full mt-2">
                        <thead>
                            <tr>
                                <th class="uppercase text-gray-700 tracking-tight text-sm py-2">Name</th>
                                <th class="uppercase text-gray-700 tracking-tight text-sm py-2">Scopes</th>
                                <th class="uppercase text-gray-700 tracking-tight text-sm py-2">Token</th>
                                <th class="uppercase text-gray-700 tracking-tight text-sm py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tokens as $token)
                                <tr>
                                    <td class="px-6 py-2">{{ $token->name }}</td>
                                    <td class="px-6 py-2">
                                        @foreach ($token->abilities as $ability)
                                            {{ $loop->first ? '' : ', ' }}
                                            {{ $ability }}
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-2">{{ Auth::user()->userPlainTokens->where('token_id', $token->id)->first()->token }}</td>
                                    <td class="px-6 py-2 text-center">
                                        <button wire:click='delete({{ $token->id }})' type="button" class="px-2 py-1 text-white bg-yellow-500 hover:bg-yellow-300 rounded shadow-sm text-xs">
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
