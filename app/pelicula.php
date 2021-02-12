<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelicula extends Model
{
    protected  $table = 'peliculas';

    // Relacion de muchos a uno 
    public function user() {
        return $this->belongsTo('App\User', 'id_user');
    }

     // Relacion de muchos a uno 
     public function categoria() {
        return $this->belongsTo('App\categoria', 'id_categoria');
    }

    // Relacion uno To muchos
    public function novedades(){
        return $this->hasMany('App\novedad');        
    }


}
