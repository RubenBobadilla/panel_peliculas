<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\pelicula;
use App\categoria;

class PeliculaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($search = null)
    {   
        if(!empty($search)){
            $peliculas = pelicula::where('titulo', 'LIKE', '%'.$search.'%')    
                                ->orWhere('descripcion', 'LIKE', '%'.$search.'%')                            
                                ->orderBy('id', 'desc')
                                ->paginate(15);
        }else{
            $peliculas = pelicula::orderBy('id', 'desc')->paginate(5);
        }
        
        return view('pelicula.buscador', [
            'peliculas' => $peliculas
        ]);
    }

    // redirecciona al formularipo para crear peliculas
    public function crear()
    {
        $categorias = categoria::all();
        return view('pelicula.create',[
            'categorias' => $categorias 
         ]);
        
    }

    // Gurda el formularipo para crear peliculas
    public function save(Request $request)
    {
        
        // Recoger datos 
        $image_path = $request->file('image_path');
        $titulo = $request->input('titulo');
        $id_categoria = $request->input('categoria');
        $descripcion = $request->input('descripcion');
        $duracion = $request->input('duracion');
        $trailer = $request->input('trailer');
        $fecha_es = $request->input('fecha_es');
        //var_dump($categoria);
        //die();
       
        //  Asignar valores -> nuevo objeto
        $user = \Auth::user();  // traemos el id del modelo user
        $pelicula = new pelicula();   // instanciamos el objeto que usamos arriba de app
        $pelicula->id_user = $user->id;
        $pelicula->id_categoria = $id_categoria;
        $pelicula->titulo = $titulo;
        $pelicula->descripcion = $descripcion;
        $pelicula->duracion = $duracion;
        $pelicula->trailer = $trailer;
        $pelicula->fecha_estreno = $fecha_es;

         // Subir fichero
         if ($image_path) {
            $image_path_name = time() . $image_path->getClientOriginalName();
            Storage::disk('caratulas')->put($image_path_name, File::get($image_path));
            $pelicula->imagen_path = $image_path_name;
        }

        // Guardar en la db
        $pelicula->save();

        return redirect()->route('home')->with([
            'message' => 'La película ha sido cargada correctamente'
        ]);

    }

    // Mostrar la imagen guardada
    public function getCaratula($filename)
    {
        // Buscar la img del storage y retornarla
        $file = Storage::disk('caratulas')->get($filename);
        return new Response($file, 200);
    }

    // consultamos el detalle unco de la pelicula, para enviar la calificacion
    public function detail($id)
    {
        $pelicula = pelicula::find($id);

        return view('pelicula.detail', [
            'pelicula' => $pelicula
        ]);

    }

    // consulta las pelicas que se estrenen de hoy a tres semanas mas tarde
    public function caratulaX_Novedades() 
    {
        // Es novedad si la Fecha de estreno esta entre hoy y 3 semanas adelante 
        $today = date("d-m-Y");
        $hasta = date('d-m-Y', strtotime($today."+ 3 week"));
        $hasta_f = date("Y-m-d", strtotime($hasta));
        $today_f = date("Y-m-d", strtotime($today));
        
        // Consultar las peliculas proximas a estrenar
        $peliculas = pelicula::where("fecha_estreno", ">=", $today_f)
                               ->where("fecha_estreno", "<=", $hasta_f)                         
                                ->get();
      //var_dump($peliculas);
      //die();
        return view('pelicula.novedades',[
           'peliculas' => $peliculas 
        ]);
    }

    // Consulta las peliclas segun su categoria
    public function categoria($id)
    {
        // depende de la categoria consulte
        $peliculas = pelicula::where("id_categoria", "=", $id)->get();
        
        if($id == 1){

            return view('pelicula.categoriasAcc',[
                'peliculas' => $peliculas 
             ]);

        }elseif($id == 2){

            return view('pelicula.categoriasCom',[
                'peliculas' => $peliculas 
            ]);        

        }else{
            return view('pelicula.categoriasTerr',[
                'peliculas' => $peliculas 
            ]); 
        }
        
    } 

  
    

   
    
    
}
