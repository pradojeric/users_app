<?php

namespace App\Http\Livewire\Position;

use App\Models\Position;
use LivewireUI\Modal\ModalComponent;

class PositionModal extends ModalComponent
{
    public $name;
    public $position;

    protected $rules = [
        'name' => 'required',
    ];

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount($position = null)
    {
        if($position)
        {
            $this->position = Position::find($position);
            $this->name = $this->position['name'];
        }
    }

    public function store()
    {
        $data = $this->validate();

        if($this->position)
        {
            $this->position->update($data);
        }
        else
        {
            Position::create($data);
        }

        $this->closeModalWithEvents([
            'updatePosition'
        ]);
    }

    public function render()
    {
        return view('livewire.position.position-modal');
    }
}
