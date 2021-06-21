<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Banda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['bandas']=Banda::paginate(1);
        return view('banda.index',$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('banda.create');
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
          'GeneroMusical'=>'required|string|max:100',
          'NumeroMiembros'=>'required|integer|max:100',
          'AnoFundacion'=>'required',
          'Hit'=>'required|string|max:100',
          'Foto'=>'required|max:10000|mimes:jpeg,png,jpg',

        ];
        $mensaje=[
            'required'=>'El :attribute es obligatoria',
            'Foto.required'=>'La foto es obligatoria',
            
        ];

        $this->validate($request, $campos, $mensaje);

        $datosBanda = request()->except('_token'); 

        if($request->hasFile('Foto')) {
            $datosBanda['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Banda::insert($datosBanda);
        
       // return response()->json($datosBanda);
       return redirect('banda')->with('mensaje','Banda agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banda  $banda
     * @return \Illuminate\Http\Response
     */
    public function show(Banda $banda)
    {
        //
        return view ('banda.show',compact('banda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banda  $banda
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $banda=Banda::findOrFail($id);
        return view('banda.edit', compact('banda') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banda  $banda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $campos=[
            'Nombre'=>'required|string|max:100',
            'GeneroMusical'=>'required|string|max:100',
            'NumeroMiembros'=>'required|integer|max:100',
            'AnoFundacion'=>'required',
            'Hit'=>'required|string|max:100',
            
  
          ];
          $mensaje=[
              'required'=>'El :attribute es obligatoria',
              
          ];

          if($request->hasFile('Foto')) {
            $campos=['Foto'=>'required|max:10000|mimes:jpeg,png,jpg'];

            $mensaje=['Foto.required'=>'La foto es obligatoria'];
          }
  
          $this->validate($request, $campos, $mensaje);
  

        $datosBanda = request()->except(['_token','_method']);
        
        if($request->hasFile('Foto')) {
            $banda=Banda::findOrFail($id);

            Storage::delete('public/'.$banda->Foto);

            $datosBanda['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Banda::where('id','=',$id)->update($datosBanda);
        $banda=Banda::findOrFail($id);
        // return view('banda.edit', compact('banda') );
        return redirect('banda')->with('mensaje','Banda modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banda  $banda
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $banda=Banda::findOrFail($id);

        if(Storage::delete('public/'.$banda->Foto)){

            Banda::destroy($id);

        }

        
        return redirect('banda')->with('mensaje','Banda borrada con éxito');
    }
}
