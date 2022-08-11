@extends('layouts.app')

@section('titulo', 'Detalle Curso')

@section('contenido')
    <div class="text-center">
        <div class="m-auto">
            <img width="300" src="{{Storage::url($cursito->imagen)}}" alt="">
            <p class="card-text">Descripción: {{$cursito->descripcion}}</p>
            <p class="card-text">Duración: {{$cursito->duracion}} horas</p>
            <a href="/cursos/{{$cursito->id}}/edit" class="btn btn-dark">Editar curso</a>
            <br>
            <br>
            {{--Para este caso no se necesita escribir destroy en la ruta como si escribimos
                edit en la ruta para obtener el formulario de edicion.Aqui creamos un formulario
                simplemente para poder incluir el boton para eliminar--}}
            <form class="form-group" action="/cursos/{{$cursito->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">--Eliminar--</button>
            </form>
        </div>
    </div>
@endsection
