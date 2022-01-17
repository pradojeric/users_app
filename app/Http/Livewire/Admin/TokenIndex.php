<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenIndex extends Component
{

    protected $listeners = [
        'updateTokens' => '$refresh',
    ];

    public function delete(Request $request, $tokenId)
    {
        // Revoke a specific token...
        $request->user()->userPlainTokens()->where('token_id', $tokenId)->delete();
        $request->user()->tokens()->where('id', $tokenId)->delete();

    }

    public function render(Request $request)
    {
        return view('livewire.admin.token-index', [
            'tokens' => $request->user()->tokens,
        ]);
    }
}
