<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{
    public function index(): View
    {
        $clients = Client::paginate(20);

        return view('clients.index', compact('clients'));
    }

    public function create(): View
    {
        return view('clients.create');
    }

    public function store(StoreClientRequest $request): RedirectResponse
    {
        Client::create($request->validated());

        return redirect()->route('clients.index');
    }

    public function edit(Client $client): View
    {
        return view('clients.edit', compact('client'));
    }

    public function update(UpdateClientRequest $request, Client $client): RedirectResponse
    {
        $client->update($request->validated());

        return redirect()->route('clients.index');
    }

    public function destroy(Client $client): RedirectResponse
    {
        $client->delete();

        return redirect()->route('clients.index');
    }
}
