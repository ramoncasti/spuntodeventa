<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{
   
    public function index()
    {
        $clientes=Client::get();
        return view('admin.client.index', compact('clientes'));
    }

    public function create()
    {
        $clientes=Client::get();
        $productos=Productos::get();
        return view('admin.client.create',compact('clientes','productos'));
    }

    public function store(StoreClientRequest $request)
    {
        Client::create($request->all());
        return redirect()->route('clientes.index');
    }

    public function show(Client $client)
    {
        return view('admin.client.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('admin.client.show', compact('client'));
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        Client::update($request->all());
        return redirect()->route('clientes.index');
    }

    public function destroy(Client $client)
    {
        $clientes->delete();
        return redirect()->route('clientes.index');
    }
}
