<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProviderRequest;
use App\Http\Requests\UpdateProviderRequest;

class ProviderController extends Controller
{
    public function index()
    {
        $providers=Provider::get();
        return view('admin.provider.index', compact('providers'));
    }


    public function create()
    {
        return view('admin.provider.create');
    }

    public function store(StoreProviderRequest $request)
    {
        Provider::create($request->all());
        return redirect()->route('providers.index');
    }

    public function show(Provider $provider)
    {
        return view('admin.provider.show', compact('provider'));
    }

    public function edit(Provider $provider)
    {
        return view('admin.provider.show', compact('provider'));
    }

    public function update(UpdateProviderRequest $request, Provider $provider)
    {
        Provider::update($request->all());
        return redirect()->route('providers.index');
    }

    public function destroy(Provider $provider)
    {
        $Provider->delete();
        return redirect()->route('providers.index');
    }
}
