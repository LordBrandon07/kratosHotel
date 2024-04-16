<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;


class TipoController extends Controller
{

    public function index()
    {
        $tipos = Tipo::paginate();

        return view('tipo.index', compact('tipos'))
            ->with('i', (request()->input('page', 1) - 1) * $tipos->perPage());
    }


    public function create()
    {
        $tipo = new Tipo();
        return view('tipo.create', compact('tipo'));
    }


    public function store(Request $request)
    {
        request()->validate(Tipo::$rules);

        $tipo = Tipo::create($request->all());

        return redirect()->route('tipos.index')
            ->with('success', 'Tipo created successfully.');
    }


    public function show($id)
    {
        $tipo = Tipo::find($id);

        return view('tipo.show', compact('tipo'));
    }


    public function edit($id)
    {
        $tipo = Tipo::find($id);

        return view('tipo.edit', compact('tipo'));
    }


    public function update(Request $request, Tipo $tipo)
    {
        request()->validate(Tipo::$rules);

        $tipo->update($request->all());

        return redirect()->route('tipos.index')
            ->with('success', 'Tipo updated successfully');
    }


    public function destroy($id)
    {   
        try{
            $tipo = Tipo::find($id)->delete();
            return redirect()->route('tipos.index')
                ->with('success', 'Tipo de habitacion eliminado');
            }catch (\Exception $e) {
            return redirect()->back()->with('error','Error al eliminarl el tipo de habitacion: '. $e->getMessage() );
        }
    }
}