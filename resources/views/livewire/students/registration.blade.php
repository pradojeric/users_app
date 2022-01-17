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

                <div class="p-6 bg-white border-b border-gray-200">

                    <form wire:submit.prevent="store">
                        <h1 class="text-lg uppercase text-gray-500">
                            <span>Student's</span>
                            Personal Information
                        </h1>

                        @if ($page == 1)

                            <div class="text-right mt-2">
                                <x-link href="{{ route('students.lists') }}" class="">Back to list</x-link>
                                <x-button type="button" wire:click="setPage(2)">Next</x-button>
                            </div>

                            <div class="mt-2">
                                <x-label for="s_status">Student Status</x-label>
                                <select wire:model="student_status" id="s_status" class="w-full rounded border border-gray-300 shadow-sm">
                                    <option value="new" selected>New</option>
                                    {{-- <option value="new_h">New (HS Grad)</option> --}}
                                    <option value="old">Old</option>
                                    <option value="transferee">Transferee</option>
                                    {{-- <option value="cross_enrollee">Cross Enrollee</option>
                                    <option value="change_course">Change Course</option>
                                    <option value="second_course_o">Second Course (Old stud)</option>
                                    <option value="second_course_n">Second Course (New)</option> --}}
                                </select>
                            </div>
                            <div class="mt-2">
                                <x-label for="s_id">Student ID</x-label>
                                @if($student_status == 'old')
                                    <x-input type="text" class="w-full" wire:model="student_id"></x-input>
                                @else
                                    @if($student)
                                        @if($student->stud_id)
                                            {{ $student->stud_id }}
                                        @else
                                            <span class="text-xs text-red-500">Temp ID will be given upon saving</span>
                                        @endif
                                    @endif
                                @endif
                            </div>
                            <div class="mt-2">
                                <x-label for="">Course Program (Optional)</x-label>
                                <select wire:model="course_program" id="" class="w-full rounded border border-gray-300 shadow-sm">
                                    <option selected>-</option>
                                    <option value="associate">Associate</option>
                                    <option value="baccalaurate">Baccalaurate</option>
                                    <option value="doctoral">Doctoral</option>
                                    <option value="masteral">Masteral</option>
                                </select>
                            </div>
                            <div class="flex sm:flex-row flex-col sm:space-x-2 w-full mt-2">
                                <div class="w-full sm:w-1/2">
                                    <x-label for="course">Course</x-label>
                                    <select wire:model="selected_course" idcourse class="w-full rounded border border-gray-300 shadow-sm">
                                        <option value=null selected disabled hidden>Select Course</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full sm:w-1/3">
                                    <x-label for="major">Major</x-label>
                                    <select wire:model="selected_major" id="major" class="w-full rounded border border-gray-300 shadow-sm">
                                        <option value=null selected disabled hidden>Select Major</option>
                                        @foreach ($majors as $major)
                                            <option value="{{ $major->id }}">{{ $major->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full sm:w-1/6">
                                    <x-label for="current_year">Current Year</x-label>
                                    <select wire:model="current_year" id="current_year" class="w-full rounded border border-gray-300 shadow-sm">
                                        <option value="1" selected>1st Year</option>
                                        <option value="2">2nd Year</option>
                                        <option value="3">3rd Year</option>
                                        <option value="4">4th Year</option>
                                        <option value="5">5th Year</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-2">
                                <div class="flex space-x-2" x-data="updateYear()">
                                    <div>
                                        <x-label for="school_year" :value="__('School Year')" />
                                        <x-input id="school_year" type="number" name="school_year" class="w-32" x-on:keyup="getNextYear()" x-on:change="getNextYear()" x-model="year1" />
                                        {{ __('-') }}
                                        <x-input id="school_year" type="number" name="school_year" class="w-32" x-model="year2" readonly />
                                    </div>
                                    <div>
                                        <x-label for="term" :value="__('Term')" />
                                        <select wire:model="term" id="term" class="w-full rounded border border-gray-300 shadow-sm">
                                            @foreach ($terms as $i => $value)
                                                <option value="{{ $i }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        @endif

                        @if($page == 2)

                            <div class="text-right mt-2">
                                <x-button type="button" wire:click="setPage(1)">Back</x-button>
                                <x-button type="submit">Save</x-button>
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

                            <div class="mt-2">
                                <x-label for="">Previous School</x-label>
                                <div class="flex space-x-2">
                                    <x-input type="text" wire:model="previous_school" class="w-full"></x-input>
                                    {{-- <select name="" id="" class="flex-grow rounded border border-gray-300 shadow-sm">
                                        <option value="" selected disabled hidden></option>
                                    </select>
                                    <button class="text-white bg-green-500 hover:bg-green-300 px-2 py-1 text-sm flex-grow-0 rounded shadow-sm">Update School</button> --}}
                                </div>
                            </div>


                        @endif

                    </form>
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
