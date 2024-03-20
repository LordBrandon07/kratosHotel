<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;


class EstadoController extends Controller
{

    public function index()
    {
        $estados = Estado::paginate();

        return view('estado.index', compact('estados'))
            ->with('i', (request()->input('page', 1) - 1) * $estados->perPage());
    }


    public function create()
    {
        $estado = new Estado();
        return view('estado.create', compact('estado'));
    }


    public function store(Request $request)
    {
        request()->validate(Estado::$rules);

        $estado = Estado::create($request->all());

        return redirect()->route('estados.index')
            ->with('success', 'Estado created successfully.');
    }


    public function show($id)
    {
        $estado = Estado::find($id);

        return view('estado.show', compact('estado'));
    }


    public function edit($id)
    {
        $estado = Estado::find($id);

        return view('estado.edit', compact('estado'));
    }


    public function update(Request $request, Estado $estado)
    {
        request()->validate(Estado::$rules);

        $estado->update($request->all());

        return redirect()->route('estados.index')
            ->with('success', 'Estado updated successfully');
    }


    public function destroy($id)
    {
        $estado = Estado::find($id)->delete();

        return redirect()->route('estados.index')
            ->with('success', 'Estado deleted successfully');
    }
}
