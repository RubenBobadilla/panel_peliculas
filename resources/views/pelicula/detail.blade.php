@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
         @include('includes.message')

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

                    <div class="clearfix"></div>
                    <div class="comments">
                        <h2>Déjanos tu calificación de <b>1</b> a <b>5</b></h2>
                        <div class="col-md-4">

                            <form action="{{ route('novedad.save') }}" method="POST">
                                @csrf

                                <input type="hidden" name="id_pelicula" value="{{$pelicula->id}}" />
                                <p>
                                    <textarea class="form-control {{ $errors->has('calificacion') ? 'is-invalid' : '' }} " name="calificacion"></textarea>
                                    @if($errors->has('calificacion'))
                                    <span class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('calificacion') }}</strong>
                                    </span>
                                    @endif
                                </p>
                                <button type="submit" class="btn  btn-success">
                                    Enviar
                                </button>
                            </form>
                        </div>

                        <hr>
                    </div>
                </div>
            </div>


            <!-- PAGINACION -->
            <div class="clearfix"></div>

        </div>
    </div>
</div>
@endsection