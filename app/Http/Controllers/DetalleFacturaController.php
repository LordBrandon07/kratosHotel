<?php

namespace App\Http\Controllers;

use App\Models\DetalleFactura;
use App\Models\Factura;
use App\Models\Servicio;
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
        $factura = Factura::pluck('id','id');
        $servicio = Servicio::pluck('tipo_serv','id');
        return view('detalle-factura.create', compact('detalleFactura','factura','servicio'));
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


    public function edit($id)
    {
        $detalleFactura = DetalleFactura::find($id);

        return view('detalle-factura.edit', compact('detalleFactura'));
    }


    public function update(Request $request, DetalleFactura $detalleFactura)
    {
        request()->validate(DetalleFactura::$rules);

        $detalleFactura->update($request->all());

        return redirect()->route('detalle-facturas.index')
            ->with('success', 'DetalleFactura updated successfully');
    }


    public function destroy($id)
    {
        $detalleFactura = DetalleFactura::find($id)->delete();

        return redirect()->route('detalle-facturas.index')
            ->with('success', 'DetalleFactura deleted successfully');
    }
}
