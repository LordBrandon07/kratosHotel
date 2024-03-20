<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;


class ServicioController extends Controller
{

    public function index()
    {
        $servicios = Servicio::paginate();

        return view('servicio.index', compact('servicios'))
            ->with('i', (request()->input('page', 1) - 1) * $servicios->perPage());
    }


    public function create()
    {
        $servicio = new Servicio();
        return view('servicio.create', compact('servicio'));
    }


    public function store(Request $request)
    {
        request()->validate(Servicio::$rules);

        $servicio = Servicio::create($request->all());

        return redirect()->route('servicios.index')
            ->with('success', 'Servicio created successfully.');
    }


    public function show($id)
    {
        $servicio = Servicio::find($id);

        return view('servicio.show', compact('servicio'));
    }


    public function edit($id)
    {
        $servicio = Servicio::find($id);

        return view('servicio.edit', compact('servicio'));
    }


    public function update(Request $request, Servicio $servicio)
    {
        request()->validate(Servicio::$rules);

        $servicio->update($request->all());

        return redirect()->route('servicios.index')
            ->with('success', 'Servicio updated successfully');
    }


    public function destroy($id)
    {
        $servicio = Servicio::find($id)->delete();

        return redirect()->route('servicios.index')
            ->with('success', 'Servicio deleted successfully');
    }
}
