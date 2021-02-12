<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\novedad;

class NovedadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Guardar la calificacion
    public function save(Request $request)
    {
        // Recoger datos
        $user = \Auth::user();
        $id_pelicula = $request->input('id_pelicula');
        $calificacion = $request->input('calificacion');


        // Asigno los valores de mi nuevo objeto
        $novedad = new novedad();
        $novedad->id_pelicula = $id_pelicula;
        $novedad->id_user = $user->id;
        $novedad->contenido = "x";
        $novedad->calificacion = $calificacion;

        // Guardar en db
        $novedad->save();

        // Reedireccion
        return redirect()->route('pelicula.detail',['id' => $id_pelicula])
                         ->with([
                             'message' => 'Has enviado tu calificación correctamente!!'
                         ]);  
        
        
    }
}
