<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeCursoReques;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*traemos toda la informacion de ka tabla cursos a
        través de la instancia cursito y el metodo all*/
        $cursito = Curso::all();
        //se adjunta cursito a la vista para poderlo usar
        return view('cursos.index', compact('cursito'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeCursoReques $solicitud)
    {
        /*
        //implementamos validaciones
            $validacionDatos = $solicitud->validate([
            'nombre'=>'required/max:10',
            'avatar'=>'required/image'
        ]);
        */

        //si dentro de la solicitud viene un archivo desde el campo
        if($solicitud->hasFile('avatar')){
            //la variable archivo contendra la informacion del archivo de
            $archivo = $solicitud-file('avatar');
            //se le asigna un nombre al archivo que seria fecha Unix Junto
        //Se devuelve la peticion hecha al servidor
        //return $request->all();
        //$cursito = new Curso();//Lo que hicimos fue crear una instancia de la clase Curso
        //$cursito->nombre = $request->input('nombre');
        //$cursito->descripcion = $request->input('descripcion');
        //$cursito->duracion = $request->input('duracion');
        //if($request->hasFile('imagen')){
            //$cursito->imagen = $request->file('imagen')->store('public/cursos');
        //}
        //$cursito->save();//Con el comando save se registra la info en la db
        //return 'Guardado exitosamente';
        //return $request->input('nombre')
    }
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cursito = Curso::find($id);
        return view('cursos.show', compact('cursito'));
        //return view('cursos.show');
        //return 'El id de este curso es: ' . $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cursito = Curso::find($id);
        //return 'La informacion que usted quiere actualizar, se veria asi en formato array: ' .$cursito;
        return view('cursos.edit', compact('cursito'));
        //return view('cursos.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $solicitud,)
    {
        //implementando validaciones
        $validacionDatos = $solicitud-> validate([
            'nombre'=>'required|max:10',
            'avatar'=>'required|image'
        ]);
        //si dentro de la solicitud  viene un archivo desde el compo
        if($solicitud->hasFile('avatar')){
            //la variable archivo contendra la informacion de archivo
            $archivo = $solicitud->file('avatar');
            //se le asigna un nombre al archivo que seria fecha UNIX junto
        }
        $cursito = Curso::find($id);
        //return $cursito;
        //return $request;
       // $cursito->fill($request->all()); //lleneme con los nuevos datos todo lo que viene de request
       $cursito->fill($request->except('imagen'));
       if($request->hasFile('imagen')){
        $cursito->imagen = $request->file('imagen')->store('public/cursos');
       }
        $cursito->save();// guardeme todo en la base de datos
        return 'La actualizacion fue exitosa';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cursito = curso::find($id);
        //return $cursito;
        $urlImagenBD = $cursito->imagen;
        //return $urlImagenBD;
        /*al nombre de la imagen de la base de datos le quite la parte que
        y la cambio por \storage\\ ya que es donde esta realmente la imagen*/
        $nombreImagen = str_replace('public/','\storage\\',$urlImagenBD);
        //return $nombreImagen;
        $rutaCompleta = public_path().$nombreImagen;
        //return $rutaCompleta;
        unlink($rutaCompleta);
        $cursito->delete();
        return 'Eliminado';
    }
}
