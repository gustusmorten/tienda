<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tienda;
class tiendasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiendas = tienda::orderBy('id','ASC')->paginate(5);
        return view('admin.tiendas.tiendas')->with('tiendas',$tiendas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tiendas.createTienda');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'direccion' => 'unique:tiendas,direccion',
        ]);

        $tienda = new tienda($request->all());
        $tienda->save();
        flash("Se ha registrado: ".$tienda->nombre." de forma existosa.")->success();
        return redirect()->route('tienda.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tienda = tienda::find($id);
        return view('admin.tiendas.editTiendas')->with('tienda',$tienda);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tienda = tienda::find($id);
        $tienda->nombre = $request->nombre;
        $tienda->direccion = $request->direccion;
        $tienda->save();
        flash("La tienda ".$tienda->nombre." a sido editada con exito.")->success();
        return redirect()->route('tienda.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tienda=tienda::find($id);
        $tienda->delete();
        flash("El usuario ".$tienda->nombre." a sido borrado de forma existosa.")->error()->important();
        return redirect()->route('tienda.index');
    }
}
