@extends('layouts.app')

@section('titulo', 'Crear Curso')

@section('contenido')
<br>
<form method="post" action="/recursos" enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
        @foreach ($errors->all() as $alerta)
            <div class="alert alert-danger" role="alert">
                <ul>
                    <li>{{$alerta}}</li>
                </ul>
            </div>

            <p>{{$alerta}}</p>
        @endforeach
    @endif


    <br>
        <h2>Aquí puedes crear un nuevo curso</h2>
        <div class="form-group">
            <label for="nombre">Nombre del curso</label>
            <input id="nombre" class="form-control" type="text" name="nombre">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input id="descripcion" class="form-control" type="text" name="descripcion">
        </div>
        <div class="form-group">
            <label for="duracion">Duración</label>
            <input id="duracion" class="form-control" type="text" name="duracion">
        </div>
        <div class="form-group">
            <label for="imagen">Cargue la imagen del curso</label>
            <br>
            <input id="imagen" type="file" name="imagen">
        </div>
        <button class="btn btn-warning" type="submit">Crear</button>
    </div>
</form>
@endsection
{{--
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Curso</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <br>
        <h2>Aquí puedes crear un nuevo curso</h2>
        <div class="form-group">
            <label for="nombre">Nombre del curso</label>
            <input id="nombre" class="form-control" type="text" name="nombre">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input id="descripcion" class="form-control" type="text" name="descripcion">
        </div>
        <div class="form-group">
            <label for="duracion">Duración</label>
            <input id="duracion" class="form-control" type="text" name="duracion">
        </div>
        <button class="btn btn-info" type="submit">Crear</button>
    </div>
</body>
</html>
--}}
