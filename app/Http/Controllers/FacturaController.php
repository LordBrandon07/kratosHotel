<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;


class FacturaController extends Controller
{

    public function index()
    {
        $facturas = Factura::paginate();

        return view('factura.index', compact('facturas'))
            ->with('i', (request()->input('page', 1) - 1) * $facturas->perPage());
    }


    public function create()
    {
        $factura = new Factura();
        return view('factura.create', compact('factura'));
    }


    public function store(Request $request)
    {
        request()->validate(Factura::$rules);

        $factura = Factura::create($request->all());

        return redirect()->route('facturas.index')
            ->with('success', 'Factura created successfully.');
    }


    public function show($id)
    {
        $factura = Factura::find($id);

        return view('factura.show', compact('factura'));
    }


    public function edit($id)
    {
        $factura = Factura::find($id);

        return view('factura.edit', compact('factura'));
    }


    public function update(Request $request, Factura $factura)
    {
        request()->validate(Factura::$rules);

        $factura->update($request->all());

        return redirect()->route('facturas.index')
            ->with('success', 'Factura updated successfully');
    }


    public function destroy($id)
    {
        $factura = Factura::find($id)->delete();

        return redirect()->route('facturas.index')
            ->with('success', 'Factura deleted successfully');
    }
}
