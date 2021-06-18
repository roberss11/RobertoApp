<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ArtistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['artistas']=Artista::paginate(8);
        return view('artista.index',$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('artista.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $campos=[
          'Nombre'=>'required|string|max:100',
          'Apellido'=>'required|string|max:100',
          'Edad'=>'required|integer|max:100',
          'Nacionalidad'=>'required|string|max:100',
          'Tipo'=>'required|string|max:100',
          'GeneroMusical'=>'required|string|max:100',
          'Foto'=>'required|max:10000|mimes:jpeg,png,jpg',

        ];
        $mensaje=[
            'required'=>'El :attribute es obligatoria',
            'Foto.required'=>'La foto es obligatoria',
            'Nacionalidad.required'=>'La nacionalidad es obligatoria',
            'Edad.required'=>'La edad es obligatoria',

        ];

        $this->validate($request, $campos, $mensaje);

        $datosArtista = request()->except('_token'); 

        if($request->hasFile('Foto')) {
            $datosArtista['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Artista::insert($datosArtista);
        
       // return response()->json($datosArtista);
       return redirect('artista')->with('mensaje','Artista agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function show(Artista $artista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $artista=Artista::findOrFail($id);
        return view('artista.edit', compact('artista') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosArtista = request()->except(['_token','_method']);
        
        if($request->hasFile('Foto')) {
            $artista=Artista::findOrFail($id);

            Storage::delete('public/'.$artista->Foto);

            $datosArtista['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Artista::where('id','=',$id)->update($datosArtista);
        $artista=Artista::findOrFail($id);
        return view('artista.edit', compact('artista') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $artista=Artista::findOrFail($id);

        if(Storage::delete('public/'.$artista->Foto)){

            Artista::destroy($id);

        }

        
        return redirect('artista')->with('mensaje','Artista borrado con éxito');
    }
}
