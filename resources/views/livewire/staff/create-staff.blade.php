<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-auth-validation-errors></x-auth-validation-errors>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200" x-data="{
                    has_emp : false,
                    empId : @entangle('empId'),
                }"
                x-init="has_emp = empId ? true : false">

                    <form wire:submit.prevent="store">
                        <h1 class="text-lg uppercase text-gray-500">
                            <span>Staff's</span>
                            Personal Information
                        </h1>

                        @if($page == 1)

                            <div class="text-right mt-2">
                                <x-link href="{{ route('staffs.lists') }}" class="">Back to list</x-link>
                                <x-button type="button" wire:click="setPage(2)">Next</x-button>
                            </div>

                            <div class="flex sm:flex-row flex-col sm:space-x-2 w-full mt-2">
                                <div class="w-full">
                                    <x-label for="first_name" value="First Name" />
                                    <x-input type="text" id="first_name" wire:model="first_name" class="w-full"  />
                                </div>
                                <div class="w-full">
                                    <x-label for="middle_name" value="Middle Name" />
                                    <x-input type="text" id="middle_name" wire:model="middle_name" class="w-full"  />
                                </div>
                                <div class="w-full">

                                    <x-label for="last_name" value="Last Name" />
                                    <x-input type="text" id="last_name" wire:model="last_name" class="w-full"  />
                                </div>
                                <div class="w-full sm:w-1/3">
                                    <x-label for="name_ext" value="Name Ext." />
                                    <x-input type="text" id="name_ext" wire:model="name_ext" class="w-full"  />
                                </div>
                            </div>


                            <div class="flex sm:flex-row flex-col sm:space-x-2 w-full mt-2">
                                <div class="w-full">
                                    <x-label for="pob" value="Place of Birth" />
                                    <x-input type="text" id="pob" wire:model="pob" class="w-full"  />
                                </div>
                                <div class="w-full sm:w-1/3">
                                    <x-label for="dob" value="Date of Birth" />
                                    <x-input type="date" id="dob" wire:model="dob" class="w-full"  />
                                </div>
                                <div class="w-full sm:w-1/6">
                                    <x-label for="gender" value="Gender" />
                                    <select wire:model="gender" id="gender" class="w-full rounded border border-gray-300 shadow-sm">
                                        <option value="" selected disabled hidden>Select</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>
                                </div>
                            </div>

                            <h1 class="mt-2 text-gray-500 text-sm uppercase tracking-tight">Home Address</h1>
                            <div class="flex sm:flex-row flex-col sm:space-x-2 w-full">
                                <div class="w-full">
                                    <x-label for="h_street" value="Street" />
                                    <x-input type="text" id="h_street" wire:model="h_street" class="w-full"  />
                                </div>
                                <div class="w-full sm:w-1/2">
                                    <x-label for="h_city" value="City" />
                                    <x-input type="text" id="h_city" wire:model="h_city" class="w-full"  />
                                </div>
                                <div class="w-full sm:w-1/2">
                                    <x-label for="h_state" value="State" />
                                    <x-input type="text" id="h_state" wire:model="h_state" class="w-full"  />
                                </div>
                                <div class="w-full sm:w-1/5">
                                    <x-label for="h_zip" value="Zip Code" />
                                    <x-input type="text" id="h_zip" wire:model="h_zip" class="w-full"  />
                                </div>
                            </div>

                            <h1 class="mt-2 text-gray-500 text-sm uppercase tracking-tight">Present Address</h1>
                            <div class="flex sm:flex-row flex-col sm:space-x-2 w-full">
                                <div class="w-full">
                                    <x-label for="p_street" value="Street" />
                                    <x-input type="text" id="p_street" wire:model="p_street" class="w-full"  />
                                </div>
                                <div class="w-full sm:w-1/2">
                                    <x-label for="p_city" value="City" />
                                    <x-input type="text" id="p_city" wire:model="p_city"  class="w-full"  />
                                </div>
                                <div class="w-full sm:w-1/2">
                                    <x-label for="p_state" value="State" />
                                    <x-input type="text" id="p_state" wire:model="p_state" class="w-full"  />
                                </div>
                                <div class="w-full sm:w-1/5">
                                    <x-label for="p_zip" value="Zip Code" />
                                    <x-input type="text" id="p_zip" wire:model="p_zip" class="w-full"  />
                                </div>
                            </div>

                            <div class="flex sm:flex-row flex-col sm:space-x-2 w-full mt-2">
                                <div class="w-full sm:w-1/2">
                                    <x-label for="phone" value="Phone Number" />
                                    <x-input type="text" id="phone" wire:model="phone_number" class="w-full"  />
                                </div>
                                <div class="w-full sm:w-1/2">
                                    <x-label for="p_email" value="Personal Email" />
                                    <x-input type="email" id="p_email" wire:model="personal_email" class="w-full"
                                        />
                                </div>
                            </div>

                            <h1 class="mt-2 text-gray-500 text-sm uppercase tracking-tight">Contact Person</h1>
                            <div class="flex sm:flex-row flex-col sm:space-x-2 w-full">
                                <div class="w-full sm:w-1/2">
                                    <x-label for="c_name" value="Name of Parent/Guardian" />
                                    <x-input type="text" id="c_name" wire:model="guardian_name" class="w-full"  />
                                </div>
                                <div class="w-full sm:w-1/2">
                                    <x-label for="contact" value="Contact No" />
                                    <x-input type="text" id="contact" wire:model="g_contact" class="w-full"  />
                                </div>
                                <div class="w-full sm:w-1/2">
                                    <x-label for="relationship" value="Relationship" />
                                    <x-input type="text" id="relationship" wire:model="g_relationship" class="w-full"
                                        />
                                </div>
                            </div>


                        @endif

                        @if ($page == 2)

                            <div class="text-right mt-2">
                                <x-button type="button" wire:click="$set('page', 1)">Back</x-button>
                                <x-button type="submitt">Save</x-button>
                            </div>

                                <div class="flex items-end" >
                                    <div class="w-full">
                                        <x-label for="emp_id" value="Employee_id" />
                                        <div class="flex flex-grow items-center space-x-2">
                                            <x-input type="text" id="emp_id" wire:model="empId" class="w-1/2" x-bind:disabled="!has_emp" x-bind:placeholder="!has_emp ? 'Creates employee id upon saving' : ''" />
                                            <input type="checkbox" id="has_emp" x-model="has_emp" class="rounded border-gray-300" checked >
                                            <x-label for="has_emp" class="text-gray-300" value="Check if staff has already employee id" />
                                        </div>
                                    </div>
                                </div>

                                <div class="flex sm:flex-row flex-col sm:space-x-2 w-full">
                                    <div class="w-full sm:w-1/2">
                                        <x-label for="doe" value="Date of Employment" />
                                        <x-input type="date" id="doe" name="doe" wire:model="doe" class="w-full" />
                                    </div>
                                    <div class="w-full sm:w-1/2">
                                        <x-label for="eoc" value="End of Contract" />
                                        <x-input type="date" id="eoc" name="eoc" wire:model="eoc" class="w-full" />
                                    </div>
                                </div>
                                <div class="flex sm:flex-row flex-col sm:space-x-2 w-full mt-2">
                                    <div class="w-full sm:w-1/2">
                                        <x-label for="e_type" value="Emp. Type/Position" />
                                        <select name="e_type" id="e_type" class="w-full rounded border border-gray-300 shadow-sm" wire:model.defer="empPos">
                                            <option value="" selected hidden>Select</option>
                                            @foreach ($positions as $position)
                                                <option value="{{ $position->id }}">{{ $position->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="w-full sm:w-1/2">
                                        <x-label for="e_tenureship" value="Emp. Tenureship" />
                                        <select name="e_tenureship" id="e_tenurship" class="w-full rounded border border-gray-300 shadow-sm" wire:model.defer="empTenureship">
                                            <option value="" selected>-</option>
                                            @foreach ($tenureships as $tenureship)
                                                <option value="{{ $tenureship->id }}">{{ $tenureship->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="flex sm:flex-row flex-col sm:space-x-2 w-full mt-2">
                                    <div class="w-full sm:w-1/2">
                                        <x-label for="college" value="College" />
                                        <select name="college" id="college" class="w-full rounded border border-gray-300 shadow-sm" wire:model.defer="selectedCollege">
                                            <option value="" selected>N/A</option>
                                            @foreach ($colleges as $college)
                                                <option value="{{ $college->id }}">{{ $college->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="w-full sm:w-1/2">
                                        <x-label for="offices" value="Offices" />
                                        <select name="offices" id="offices" class="w-full rounded border border-gray-300 shadow-sm" wire:model.defer="selectedOffice">
                                            <option value="" selected>All</option>
                                            @foreach ($offices as $office)
                                                <option value="{{ $office->id }}">{{ $office->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
