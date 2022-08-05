@extends('layouts.app')

@section('titulo', 'Editar Curso')

@section('contenido')
<form action="/cursos/{{$cursito->id}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <br>
        <h2>Formulario para la edicion del curso</h2>
        <div class="form-group">
            <label for="nombre">Edita el Nombre</label>
            <input id="nombre" class="form-control" type="text" name="nombre" value="{{$cursito->nombre}}">
        </div>
        <div class="form-group">
            <label for="descripcion">Edita la Descripción</label>
            <input id="descripcion" class="form-control" type="text" name="descripcion" value="{{$cursito->descripcion}}">
        </div>
        <div class="form-group">
            <label for="duracion">Edita la Duración</label>
            <input id="duracion" class="form-control" type="text" name="duracion" value="{{$cursito->duracion}}">
        </div>
        <div class="form-group">
            <label for="imagen">Cargue la imagen del curso</label>
            <br>
            <img width="100" src="{{Storage::url($cursito->imagen)}}" alt=""><br><br>
            <input id="imagen" type="file" name="imagen" value="{{$cursito->duracion}}">
        </div>
        <button class="btn btn-info" type="submit">Actualizar</button>
    </div>
</form>
@endsection
