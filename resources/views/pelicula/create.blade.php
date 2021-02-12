@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Crear nueva película</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('pelicula.save') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="image_path" class="col-md-3 col-form-label text-md-right">Cáratula</label>
                            <div class="col-md-7"> 
                                <input id="image_path" type="file" name="image_path" class="form-control" required/>  
                                
                                @if($errors->has('image_path'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image_path') }}</strong>                                    
                                    </span>
                                @endif
                            </div>                            
                        </div>

                        <div class="form-group row">
                            <label for="titulo" class="col-md-3 col-form-label text-md-right">Título</label>
                            <div class="col-md-7"> 
                                <input id="titulo" type="text" name="titulo" class="form-control" required/>  
                                
                                @if($errors->has('titulo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('titulo') }}</strong>                                    
                                    </span>
                                @endif
                            </div>                            
                        </div>

                        
                        <div class="form-group row">
                            <label for="categoria" class="col-md-3 col-form-label text-md-right">Categoría</label>

                            <div class="col-md-3"> 
                                <select name="categoria">
                                    <option>seleccione</option>   
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>                                
                                    @endforeach
                                </select>                                  

                                @if($errors->has('categoria'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('categoria') }}</strong>                                    
                                    </span>
                                @endif
                            </div> 

                        </div>
                        
                        <div class="form-group row">
                            <label for="descripcion" class="col-md-3 col-form-label text-md-right">Descripción</label>
                            <div class="col-md-7"> 
                                <textarea id="descripcion" name="descripcion" class="form-control" ></textarea>
                                
                                @if($errors->has('descripcion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descripcion') }}</strong>                                    
                                    </span>
                                @endif
                            </div>                            
                        </div>

                        <div class="form-group row">
                            <label for="duracion" class="col-md-3 col-form-label text-md-right">Duración</label>
                            <div class="col-md-7"> 
                                <input type="number" name="duracion" class="form-control" />
                                
                                @if($errors->has('duracion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('duracion') }}</strong>                                    
                                    </span>
                                @endif
                            </div>                            
                        </div>

                        <div class="form-group row">
                            <label for="trailer" class="col-md-3 col-form-label text-md-right">Link trailer</label>
                            <div class="col-md-7"> 
                                <textarea id="trailer" name="trailer" class="form-control" ></textarea>
                                
                                @if($errors->has('trailer'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('trailer') }}</strong>                                    
                                    </span>
                                @endif
                            </div>                            
                        </div>

                        <div class="form-group row">
                            <label for="fecha_es" class="col-md-3 col-form-label text-md-right">Fecha estreno</label>
                            <div class="col-md-7"> 
                                <input type="date" name="fecha_es" class="form-control" />
                                
                                @if($errors->has('fecha_es'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fecha_es') }}</strong>                                    
                                    </span>
                                @endif
                            </div>                            
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3">
                                <input type="submit" class="btn btn-primary" value="Subir película" />
                            </div>                           
                        </div>

                    </form>  
                </div>

            </div>            


        </div>
    </div>
</div>

@endsection