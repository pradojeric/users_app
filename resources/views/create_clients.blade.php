<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('OAuth2 Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div x-data='authClient()'>
                        <div>
                            <x-label for="name" value="Application Name" />
                            <x-input type="text" id="name" x-model="name" class="w-full" />
                        </div>
                        <div>
                            <x-label for="redirect" value="Redirect Uri" />
                            <x-input type="text" id="redirect" x-model="redirect" class="w-full" />
                        </div>
                        <x-button type="submit" x-on:click="submit()" class="mt-2">Save</x-button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function authClient()
    {
        return {
            name : "",
            redirect : "",
            submit() {
                var data = {
                    name: this.name,
                    redirect: this.redirect,
                };

                axios.post('/oauth/clients', data)
                    .then(response => {
                        window.location.href = "/dashboard"
                    });
            }
        }
    }
</script>
