<?php

namespace App\Http\Controllers;

use App\Models\DraftCheck;
use Illuminate\Http\Request;

class DraftCheckController extends Controller
{
    public function index()
    {        
        $client = request()->client;

        $draftChecks = $client->draftChecks;        

        return view('clients.draft-checks.index')
            ->with([
                'client' => $client,
                'draftChecks' => $draftChecks,
            ]);
    }

    public function create()
    {
        $client = request()->client;

        return view('clients.draft-checks.create')
            ->with([
                'client' => $client
            ]);
    }

    public function store()
    {
        request()->validate([
            'check_number' => [
                'required',
            ],
            'file' => [
                'required',
            ]
        ]);

        $client = request()->client;

        $draftCheck = DraftCheck::create([
            'check_number' => request()->check_number,
            'client_id' => $client->id,           
        ]);

        $draftCheck->saveImage(
            request()->file
        );

        return redirect()
            ->route('draft-checks.index', $client)
            ->with('flash_success', 'Se registró con éxito la solicitud de cheque.');
    }

    public function edit()
    {        
        $client = request()->client;        

        $draftCheck = request()->draftCheck;

        return view('clients.draft-checks.edit')
            ->with([
                'client' => $client,
                'draftCheck' => $draftCheck
            ]);
    }

    public function update()
    {        
        $client = request()->client;

        $draftCheck = request()->draftCheck;
        
        $status = request()->status;        

        if ($status == 1) {

            $draftCheck->update([
                'observation' => request()->observation,
                'status' => true,                
            ]);

            return redirect()
            ->route('draft-checks.index', $client)
            ->with('flash_success', 'Cheque Aprovado.');
        } else {

            $draftCheck->update([
                'observation' => request()->observation,
                'status' => false,                
            ]);

            return redirect()
            ->route('draft-checks.index', $client)
            ->with('flash_error', 'Cheque Denegado.');
        }        
    }
}
