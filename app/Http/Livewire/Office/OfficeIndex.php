<?php

namespace App\Http\Livewire\Office;

use App\Models\Office;
use Livewire\Component;

class OfficeIndex extends Component
{
    protected $listeners = [
        'updateOffices' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.office.office-index', [
            'offices' => Office::orderBy('name')->get(),
        ]);
    }
}
