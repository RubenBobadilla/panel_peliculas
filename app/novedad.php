<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class novedad extends Model
{
    protected  $table = 'novedades';

    // Relacion de muchos a uno 
    public function pelicula() {
        return $this->belongsTo('App\pelicula', 'id_pelicula');
    }

    // Relacion de muchos a uno 
    public function user() {
        return $this->belongsTo('App\User', 'id_user');
    }
    
}
