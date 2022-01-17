<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 bg-white border-b border-gray-200">
                    <div class="flex justify-end">
                        <a href="/create_client" class="px-2 py-1 text-white bg-green-500 hover:bg-green-300 rounded">Add Client</a>
                    </div>
                    <h1 class="text-2xl text-gray-700 tracking-tighter">OAuth Clients</h1>
                    <table class="w-full mt-2 border">
                        <thead>
                            <tr>
                                <th>Application Name</th>
                                <th>Client ID</th>
                                <th>Client Secret</th>
                                <th>Redirect Url</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach(Auth::user()->clients as $client)
                                <tr x-data>
                                    <td class="text-sm px-2 py-3">{{ $client->name }}</td>
                                    <td class="text-sm px-2 py-3">{{ $client->id }}</td>
                                    <td class="text-sm px-2 py-3">{{ $client->secret }}</td>
                                    <td class="text-sm px-2 py-3">{{ $client->redirect }}</td>
                                    <td class="text-sm px-2 py-3">{{ $client->revoked ? 'Revoked' : 'Active' }}</td>
                                    <td class="text-sm px-2 py-3">
                                        <a href="/edit_client/{{ $client->id }}" class="px-2 py-1 text-white bg-green-500 hover:bg-green-300 rounded">Edit</a>
                                        <button type="button"
                                            x-on:click="
                                                axios.delete('/oauth/clients/{{ $client->id }}')
                                                    .then(response => {
                                                        alert('Successfully Revoked');
                                                        location.reload();
                                                    })
                                            "
                                            class="px-2 py-1 text-white bg-red-500 hover:bg-red-300 rounded">Delete</button>
                                    </td>
                                </tr>
                            @endforeach --}}

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


