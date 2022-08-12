<?php

namespace App\Http\Controllers;
use App\Http\Requests\storeDocentesRequest;
use App\Models\Docentes;
use Illuminate\Http\Request;

class DocentesControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         /*traemos toda la informacion de la tabla docentes a
        través de la instancia theacher y el metodo all*/
        $theacher = Docentes::all();
        //se adjunta theacher a la vista para poderlo usar
        return view('docentes.index', compact('theacher'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('docentes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeDocentesRequest $solicitud)
    {
        if($solicitud->hasFile('avatar')){
            $archivo = $solicitud-file('avatar');
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
        $theacher = Docentes::find($id);
        return view('docentes.show', compact('theacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $theacher = Docentes::find($id);
        return view('docentes.edit', compact('theacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$solicitud,)
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
        $theacher = Docentes::find($id);
        //return $cursito;
        //return $request;
       // $cursito->fill($request->all()); //lleneme con los nuevos datos todo lo que viene de request
       $theacher->fill($request->except('imagen'));
       if($request->hasFile('imagen')){
        $theacher->imagen = $request->file('imagen')->store('public/docentes');
       }
        $theacher->save();// guardeme todo en la base de datos
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
        $theacher = Docentes::find($id);
        //return $cursito;
        $urlImagenBD = $theacher->imagen;
        //return $urlImagenBD;
        /*al nombre de la imagen de la base de datos le quite la parte que
        y la cambio por \storage\\ ya que es donde esta realmente la imagen*/
        $nombreImagen = str_replace('public/','\storage\\',$urlImagenBD);
        //return $nombreImagen;
        $rutaCompleta = public_path().$nombreImagen;
        //return $rutaCompleta;
        unlink($rutaCompleta);
        $theacher->delete();
        return 'Eliminado';
    }
}
