<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected  $table = 'categorias';

    // Relacion uno To muchos
    public function peliculas()
    {
        return $this->hasMany('App\pelicula');
    }
}
