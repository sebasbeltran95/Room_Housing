<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propiedades;

class PropiedadesController extends Controller
{
    public function index(Request $request){
        $busqueda = $request->busqueda;
        $propiedades = Propiedades::paginate(6);
        return view('propiedades', compact('propiedades','busqueda'));
    }
    public function filtro_name(Request $request){
        $busqueda = $request->busqueda;
        if($request->id == ''){
            $propiedades = Propiedades::paginate(6);
        }else{
            $propiedades = Propiedades::where('id', $request->id)->paginate(6);
        }
        return view('propiedades', compact('propiedades', 'busqueda'));
    }

    public function store(Request $request)
    {
        $propiedades = new  Propiedades();
        $propiedades->nombres = $request->nombres;
        $propiedades->apellidos = $request->apellidos;
        $propiedades->piso = $request->piso;
        $propiedades->habitacion = $request->habitacion;
        $propiedades->inicio_contrato = $request->inicio_contrato;
        $propiedades->fin_contrato = $request->fin_contrato;
        $propiedades->save();
        return redirect()->route('propiedades.ver');
    }

    public function update(Request $request){
    
        $propiedades = Propiedades::find($request->id); 
        $propiedades->nombres = $request->nombres;
        $propiedades->apellidos = $request->apellidos;
        $propiedades->piso = $request->piso;
        $propiedades->habitacion = $request->habitacion;
        $propiedades->inicio_contrato = $request->inicio_contrato;
        $propiedades->fin_contrato = $request->fin_contrato;
        $propiedades->save();
        return redirect()->route('propiedades.ver');
    }

    public function destroy($id){
        Propiedades::where('id',$id)->first()->delete();
        return redirect()->route('propiedades.ver');
    }
}
