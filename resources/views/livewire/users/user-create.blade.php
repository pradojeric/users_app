<div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors></x-auth-validation-errors>
                    @if(!$userType)

                        @foreach ($roles as $role)
                            @if($role->name != 'admin' && $role->name != 'superadmin' || Auth::user()->hasRole('superadmin'))
                                <x-button wire:key="{{ $role->id }}" wire:click="setRole('{{ $role->name }}')">Add {{ $role->name }}</x-button>
                            @endif
                        @endforeach

                    @endif

                    @if($userType)


                        @if($page == 1)

                            <div class="text-right mt-2">
                                <x-button wire:click="setRole()">Back</x-button>
                                <x-button>Save</x-button>
                            </div>

                            <h1 class="text-lg uppercase text-gray-500 mt-3">
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
                        @endif

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateYear()
    {
        return {
            year1 : @entangle('year1').defer,
            year2 : @entangle('year2').defer,
            getNextYear() {
                this.year2 = parseInt(this.year1) + 1;
            },
        }
    }
</script>
