@extends('layouts.app')
@section('titulo', 'docentes')
@section('contenido')

    <form action="" method="POST">
        <br>
        <h2>Informacion del Docente</h2>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input id="nombre" class="form-control" type="text" name="nombre">
        </div>
        <div class="form-group">
            <label for="apellido">Apellido: </label>
            <input id="apellido" class="form-control" type="text" name="apellido" >
        </div>
        <div class="form-group">
            <label for="titulo">Titulo Universitario</label>
            <input id="titulo" class="form-control" type="text" name="titulo">
        </div>
            <p id="fecha">
                <input type="date" onchange="edad(event);" name="fecha" class="sendit">
            </p>
        <div class="form-group">
            <label for="imagen">Cargue la imagen del curso</label>
            <br>
            <input id="imagen" type="file" name="imagen">
        </div>
        <button class="btn btn-warning" type="submit">Crear</button>
    </div>
    </form>
@endsection
