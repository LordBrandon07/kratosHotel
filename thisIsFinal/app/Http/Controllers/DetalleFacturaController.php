<?php

namespace App\Http\Controllers;

use App\Models\DetalleFactura;
use Illuminate\Http\Request;


class DetalleFacturaController extends Controller
{

    public function index()
    {
        $detalleFacturas = DetalleFactura::paginate();

        return view('detalle-factura.index', compact('detalleFacturas'))
            ->with('i', (request()->input('page', 1) - 1) * $detalleFacturas->perPage());
    }


    public function create()
    {
        $detalleFactura = new DetalleFactura();
        return view('detalle-factura.create', compact('detalleFactura'));
    }


    public function store(Request $request)
    {
        request()->validate(DetalleFactura::$rules);

        $detalleFactura = DetalleFactura::create($request->all());

        return redirect()->route('detalle-facturas.index')
            ->with('success', 'DetalleFactura created successfully.');
    }


    public function show($id)
    {
        $detalleFactura = DetalleFactura::find($id);

        return view('detalle-factura.show', compact('detalleFactura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detalleFactura = DetalleFactura::find($id);

        return view('detalle-factura.edit', compact('detalleFactura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DetalleFactura $detalleFactura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleFactura $detalleFactura)
    {
        request()->validate(DetalleFactura::$rules);

        $detalleFactura->update($request->all());

        return redirect()->route('detalle-facturas.index')
            ->with('success', 'DetalleFactura updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $detalleFactura = DetalleFactura::find($id)->delete();

        return redirect()->route('detalle-facturas.index')
            ->with('success', 'DetalleFactura deleted successfully');
    }
}
