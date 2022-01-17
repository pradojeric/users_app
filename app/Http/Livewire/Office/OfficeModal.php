<?php

namespace App\Http\Livewire\Office;

use App\Models\Office;
use LivewireUI\Modal\ModalComponent;

class OfficeModal extends ModalComponent
{

    public $name;
    public $office;

    protected $rules = [
        'name' => 'required',
    ];

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount($office = null)
    {
        if($office)
        {
            $this->office = Office::find($office);
            $this->name = $this->office['name'];
        }
    }

    public function store()
    {
        $data = $this->validate();

        if($this->office)
        {
            $this->office->update($data);
        }
        else
        {
            Office::create($data);
        }

        $this->closeModalWithEvents([
            'updateOffices'
        ]);
    }


    public function render()
    {
        return view('livewire.office.office-modal');
    }
}
