@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="GET" action="{{ route('pelicula.buscar') }}" id="buscador">
                <div class="row">
                    <div class="form-group col">
                        <input type='text' id='search' class="form-control" />
                    </div>
                    <div class="form-group col btn-search">
                        <input type="submit" value="Buscar" class="btn btn-success" />
                    </div>
                </div>
            </form>
            <hr>
            <h1>Resultado de la busqueda</h1>
            <hr>

            @foreach($peliculas as $pelicula)
            <div class="card pub_image">
                <div class="card-header">


                    <div class="data-user">
                        <a href="{{ $pelicula->trailer }}">
                            {{ $pelicula->titulo.' | duracion: '.$pelicula->duracion.' minutos' }}
                            <span class="nickname">
                                {{'| Categoría '.$pelicula->categoria->nombre }}
                            </span>
                        </a>
                    </div>

                </div>

                <div class="card-body">
                    <div class="image-container">
                        <img src="{{ route('caratula.file' ,['filename' => $pelicula->imagen_path]) }}" />
                    </div>

                    <div class="description">
                        <p>{{ $pelicula->descripcion }}</p>
                    </div>



                    <div class="comments">
                        <a href="" class="btn btn-sm btn-warning btn-comments">
                            Califica esta película
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- PAGINACION -->
            <div class="clearfix"></div>
                {{$peliculas->links()}}
        </div>
    </div>
</div>
@endsection