<div>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students List') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="mx-auto lg:px-2">
            <x-auth-validation-errors></x-auth-validation-errors>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-2 bg-white border-b border-gray-200">

                    <div class="flex justify-between items-center">
                        <h1 class="text-lg uppercase text-gray-500 p-6">
                            @if ($show == 'this_sem')
                                {{ __('List of Registered Students of SY ') }} {{ $school_year }}
                            @else
                                {{ __('All Students ') }}
                            @endif
                        </h1>

                        <div>
                            <x-button type="button" class="text-xs" wire:click="$set('show', 'this_sem')">This Sem</x-button>
                            <x-button type="button" class="text-xs" wire:click="$set('show', 'all')">All</x-button>
                        </div>

                    </div>
                    @if($show == 'this_sem')
                            <a href="{{ route('student.registration') }}" class="m-2 px-3 py-2 bg-green-500 hover:bg-green-300 rounded shadow-sm text-white text-sm">Register New Student</a>
                        @endif
                    <table class="table w-full mt-2">
                        <thead>
                            <tr>
                                <th class="uppercase text-gray-700 tracking-tight text-sm py-2">Student Name</th>
                                <th class="uppercase text-gray-700 tracking-tight text-sm py-2">Student Id</th>
                                <th class="uppercase text-gray-700 tracking-tight text-sm py-2">Email</th>
                                <th class="uppercase text-gray-700 tracking-tight text-sm py-2">Student Status</th>
                                <th class="uppercase text-gray-700 tracking-tight text-sm py-2">Course</th>
                                <th class="uppercase text-gray-700 tracking-tight text-sm py-2">Year</th>
                                <th class="uppercase text-gray-700 tracking-tight text-sm py-2">Enrollment Status</th>
                                @if($show == 'all')
                                    <th class="uppercase text-gray-700 tracking-tight text-sm py-2">Date Updated</th>
                                @endif
                                <th class="uppercase text-gray-700 tracking-tight text-sm py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td class="px-6 py-2 text-sm text-center">
                                        {{ $student->student_name }}
                                    </td>
                                    <td class="px-6 py-2 text-sm text-center">
                                        {{ $student->stud_id }}
                                    </td>
                                    <td class="px-2 py-2 text-sm text-center">
                                        {{ $student->user->email }}
                                    </td>
                                    <td class="px-6 py-2 text-sm text-center capitalize">
                                        {{ $student->student_status }}
                                    </td>
                                    <td class="px-2 py-2 text-center text-sm">
                                        {{ $student->course->name }}
                                    </td>
                                    <td class="px-6 py-2 text-sm text-center">
                                        {{ $student->current_year }}
                                    </td>
                                    <td class="px-6 py-2 text-center uppercase text-xs">
                                        {{ $student->enrollment_status }}
                                    </td>
                                    @if($show == 'all')
                                        <td class="px-6 py-2 text-center uppercase text-xs">
                                            {{ $student->updated_at->format('Y-m-d') }}
                                        </td>
                                    @endif
                                    <td class="px-6 py-2 text-center">
                                        <div class="flex flex-col space-y-1">
                                            <button type="button"
                                                wire:click.prevent="$emit('openModal', 'students.enroll-modal', {{ json_encode(['studId' => $student->id]) }})"
                                                class="px-2 py-1 bg-yellow-500 hover:bg-yellow-300 rounded shadow-sm text-white text-xs">
                                                    Edit Enrollment Status
                                            </button>
                                            <a href="{{ route('student.edit', $student->id) }}" class="px-2 py-1 bg-green-500 hover:bg-green-300 rounded shadow-sm text-white text-xs">Edit</a>
                                            <button type="button" wire:click="delete({{ $student }})" class="px-2 py-1 bg-red-500 hover:bg-red-300 rounded shadow-sm text-white text-xs">Delete</button>
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
