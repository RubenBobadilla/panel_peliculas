<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pelicula;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = pelicula::orderBy('id', 'desc')->paginate(5);
        
        return view('home', [
            'peliculas' => $peliculas
        ]);
        //return view('home');
    }
}
