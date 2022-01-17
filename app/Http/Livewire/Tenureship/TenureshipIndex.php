<?php

namespace App\Http\Livewire\Tenureship;

use App\Models\Tenureship;
use Livewire\Component;

class TenureshipIndex extends Component
{
    protected $listeners = [
        'updateTenurship' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.tenureship.tenureship-index', [
            'tenureships' => Tenureship::orderBy('name')->get(),
        ]);
    }
}
