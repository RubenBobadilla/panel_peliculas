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
            <a href="{{ route('pelicula.detail',['id'=> $pelicula->id]) }}" class="btn btn-sm btn-warning btn-comments">
                Califica esta película 
            </a>
        </div>
    </div>
</div>