<?php

namespace App\Http\Controllers;

use App\Models\Habitacione;
use Illuminate\Http\Request;

/**
 * Class HabitacioneController
 * @package App\Http\Controllers
 */
class HabitacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habitaciones = Habitacione::paginate();

        return view('habitacione.index', compact('habitaciones'))
            ->with('i', (request()->input('page', 1) - 1) * $habitaciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $habitacione = new Habitacione();
        return view('habitacione.create', compact('habitacione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Habitacione::$rules);

        $habitacione = Habitacione::create($request->all());

        return redirect()->route('habitaciones.index')
            ->with('success', 'Habitacione created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $habitacione = Habitacione::find($id);

        return view('habitacione.show', compact('habitacione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $habitacione = Habitacione::find($id);

        return view('habitacione.edit', compact('habitacione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Habitacione $habitacione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Habitacione $habitacione)
    {
        request()->validate(Habitacione::$rules);

        $habitacione->update($request->all());

        return redirect()->route('habitaciones.index')
            ->with('success', 'Habitacione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $habitacione = Habitacione::find($id)->delete();

        return redirect()->route('habitaciones.index')
            ->with('success', 'Habitacione deleted successfully');
    }
}
