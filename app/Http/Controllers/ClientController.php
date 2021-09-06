<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\DraftCheck;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {        
        $clients = Client::all();            

        return view('clients.index')
            ->with([
                'clients' => $clients,
            ]);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store()
    {
        request()->validate([
            'name' => [
                'required',
            ],
            'email' => [
                'required',
            ],
            'file' => [
                'required',
            ]
        ]);

        $client = Client::create([
            'name' => request()->name,
            'email' => request()->email,
        ]);

        $client->saveImage(
            request()->file
        );

        return redirect()
            ->route('clients.index')
            ->with('flash_success', 'Cliente registrado con éxito');
    }
}
