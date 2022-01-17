<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function createClient()
    {
        return view('create_clients');
    }

    public function editClient($clientId)
    {
        $client = auth()->user()->clients->where('id', $clientId)->first();
        return view('edit_clients', [
            'client' => $client,
        ]);
    }
}
