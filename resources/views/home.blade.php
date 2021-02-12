@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">            
            <div class="card">
            @include('includes.message')
             

            @foreach($peliculas as $pelicula)
                @include('includes.pelicula',['pelicula'=>$pelicula])
            @endforeach

                 <!-- PAGINACION -->
            <div class="clearfix"></div>
            
            </div>
        </div>
    </div>
</div>
@endsection
