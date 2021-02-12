@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Estas en la categoría Comedia</h1>
            <hr/>
            
            @foreach($peliculas as $pelicula)
                @include('includes.pelicula',['pelicula'=>$pelicula])
            @endforeach

            <!-- PAGINACION -->
            <div class="clearfix"></div>
            
        </div>
    </div>
</div>
@endsection