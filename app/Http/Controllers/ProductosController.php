<?php

namespace App\Http\Controllers;
use app\Models\Category;
use App\Models\Productos;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductosRequest;
use App\Http\Requests\UpdateProductosRequest;
use app\Models\Provider;

class ProductosController extends Controller
{
    public function index()
    {
        $productos=Productos::get();
        return view('admin.producto.index', compact('productos'));
    }


    public function create()
    {
        $categories=Category::get();
        $providers=Provider::get();
        return view('admin.producto.create',compact('categories','providers'));
    }

    public function store(StoreproductosRequest $request)
    {
        Producto::create($request->all());
        return redirect()->route('productos.index');
    }

    public function show(Productos $productos)
    {
        return view('admin.producto.show', compact('producto'));
    }

    public function edit(Productos $productos)
    {
        $categories=Category::get();
        $providers=Provider::get();
        return view('admin.producto.show', compact('producto','categories','providers'));
    }

    public function update(UpdateproductosRequest $request, Productos $productos)
    {
        productos::update($request->all());
        return redirect()->route('productos.index');
    }

    public function destroy(Productos $productos)
    {
        $productos->delete();
        return redirect()->route('productos.index');
    }
}
