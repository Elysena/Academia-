@extends('layouts.app')
@section('titulo', 'docentes')
@section('contenido')

<form action="/docentes/{{$theacher->id}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <br>
        <h2>Formulario para el docente </h2>
        <div class="form-group">
            <label for="nombre">Edita el Nombre</label>
            <input id="nombre" class="form-control" type="text" name="nombre" value="{{$theacher->nombre}}">
        </div>
        <div class="form-group">
            <label for="descripcion">Edita el apellido</label>
            <input id="descripcion" class="form-control" type="text" name="descripcion" value="{{$theacher->apellido}}">
        </div>

        <div class="form-group">
            <label for="imagen">Cargue la imagen del curso</label>
            <br>
            <img width="100" src="{{Storage::url($theacher->imagen)}}" alt=""><br><br>
            <input id="imagen" type="file" name="imagen" value="{{$theacher->duracion}}">
        </div>
        <button class="btn btn-info" type="submit">Actualizar</button>
    </div>
</form>
@endsection
