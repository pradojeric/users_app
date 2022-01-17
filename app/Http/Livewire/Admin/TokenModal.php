<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Http\Request;
use LivewireUI\Modal\ModalComponent;

class TokenModal extends ModalComponent
{
    public $name;
    public $scope;

    protected $rules = [
        'name' => 'required',
        'scope' => 'nullable',
    ];

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function store(Request $request)
    {
        $this->validate();

        $scopes = explode(",", trim($this->scope));

        $token = $request->user()->createToken($this->name, $scopes);

        $request->user()->userPlainTokens()->create([
            'token_id' => $token->accessToken->id,
            'token' => $token->plainTextToken,
        ]);

        $this->closeModalWithEvents([
            'updateTokens'
        ]);
    }



    public function render()
    {
        return view('livewire.admin.token-modal');
    }
}
