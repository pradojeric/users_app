<?php

namespace App\Http\Livewire\Position;

use App\Models\Position;
use Livewire\Component;

class PositionIndex extends Component
{
    protected $listeners = [
        'updatePosition' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.position.position-index', [
            'positions' => Position::orderBy('name')->get(),
        ]);
    }
}
