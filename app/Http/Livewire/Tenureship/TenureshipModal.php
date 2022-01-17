<?php

namespace App\Http\Livewire\Tenureship;

use App\Models\Tenureship;
use LivewireUI\Modal\ModalComponent;

class TenureshipModal extends ModalComponent
{
    public $name;
    public $tenureship;

    protected $rules = [
        'name' => 'required',
    ];

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount($tenureship = null)
    {
        if($tenureship)
        {
            $this->tenureship = Tenureship::find($tenureship);
            $this->name = $this->tenureship['name'];
        }
    }

    public function store()
    {
        $data = $this->validate();

        if($this->tenureship)
        {
            $this->tenurship->update($data);
        }
        else
        {
            Tenureship::create($data);
        }

        $this->closeModalWithEvents([
            'updateTenurship'
        ]);
    }


    public function render()
    {
        return view('livewire.tenureship.tenureship-modal');
    }
}
