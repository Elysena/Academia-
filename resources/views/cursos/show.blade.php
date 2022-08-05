@extends('layouts.app')

@section('titulo', 'Detalle Curso')

@section('contenido')
    <div class="text-center">
        <div class="m-auto">
            <img width="300" src="{{Storage::url($cursito->imagen)}}" alt="">
            <p class="card-text">Descripción: {{$cursito->descripcion}}</p>
            <p class="card-text">Duración: {{$cursito->duracion}} horas</p>
            <a href="/cursos/{{$cursito->id}}/edit" class="btn btn-success">Editar</a>
        </div>
    </div>
@endsection
