<?php

namespace App\Http\Controllers;

use App\Models\Habitacione;
use App\Models\Tipo;
use Illuminate\Http\Request;


class HabitacioneController extends Controller
{

    public function index()
    {
        $habitaciones = Habitacione::paginate();

        return view('habitacione.index', compact('habitaciones'))
            ->with('i', (request()->input('page', 1) - 1) * $habitaciones->perPage());
    }


    public function create()
    {
        $habitacione = new Habitacione();
        $tipos = Tipo::pluck('name','id');
        return view('habitacione.create', compact('habitacione','tipos'));
    }


    public function store(Request $request)
    {
        request()->validate(Habitacione::$rules);

        $habitacione = Habitacione::create($request->all());

        return redirect()->route('habitaciones.index')
            ->with('success', 'Habitacione created successfully.');
    }


    public function show($id)
    {
        $habitacione = Habitacione::find($id);
        return view('habitacione.show', compact('habitacione'));
    }


    public function edit($id)
    {
        $habitacione = Habitacione::find($id);
        $tipos = Tipo::pluck('name','id');
        return view('habitacione.edit', compact('habitacione','tipos'));
    }


    public function update(Request $request, Habitacione $habitacione)
    {
        request()->validate(Habitacione::$rules);

        $habitacione->update($request->all());

        return redirect()->route('habitaciones.index')
            ->with('success', 'Habitacione updated successfully');
    }


    public function destroy($id)
    {
        $habitacione = Habitacione::find($id)->delete();

        return redirect()->route('habitaciones.index')
            ->with('success', 'Habitacione deleted successfully');
    }
}
