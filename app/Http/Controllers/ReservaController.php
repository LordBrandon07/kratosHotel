<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Estado;
use App\Models\User;
use App\Models\Habitacione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::paginate();
        return view('reserva.index', compact('reservas'))
            ->with('i', (request()->input('page', 1) - 1) * $reservas->perPage());
    }


    public function create()
    {
        $reserva = new Reserva();
        $estado = Estado::pluck('name','id');
        $user = User::pluck('documento','documento');
        $nro_hab = Habitacione::where('disponible', 1)->pluck('hab_numero','hab_numero');
        return view('reserva.create', compact('reserva','estado','user','nro_hab'));
    }


    public function store(Request $request)
    {
        $request->validate(Reserva::$rules);
    
        // Crear la reserva si la validación pasa
        $reserva = Reserva::create($request->all());
    
        return redirect()->route('reservas.index')
            ->with('success', 'Reserva created successfully.');
    }


    public function show($id)
    {
        $reserva = Reserva::find($id);
        return view('reserva.show', compact('reserva'));
    }


    public function edit($id)
    {
        $reserva = Reserva::find($id);
        $estado = Estado::pluck('name','id');
        $user = User::pluck('documento','documento');
        $nro_hab = Habitacione::where('disponible', 1)->pluck('hab_numero','hab_numero');
        return view('reserva.edit', compact('reserva','estado','user','nro_hab'));
    }


    public function update(Request $request, Reserva $reserva)
    {
        request()->validate(Reserva::$rules);
        $reserva->update($request->all());
        return redirect()->route('reservas.index')
            ->with('success', 'Reserva updated successfully');
    }


    public function destroy($id)
    {
        try{
            $reserva = Reserva::find($id)->delete();
            return redirect()->route('reservas.index')
                ->with('success', 'Reserva eliminada con exito');
    }catch (\Exception $e){
            return redirect()-back()->wwith('error', 'Error al eliminar la reserva');
    }
}
}