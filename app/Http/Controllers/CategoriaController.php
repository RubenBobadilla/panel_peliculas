<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\pelicula;
use App\categoria;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getCategoria()
    {
        $categorias = categoria::all();

        return view('pelicula.novedades',[
            'categorias' => $categorias 
         ]);

    }
}
