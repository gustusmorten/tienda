<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\producto;
class productosController extends Controller
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
        $productos = producto::orderBy('id','ASC')->paginate(5);
        return view('admin.productos.productos')->with('productos',$productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productos.createProducto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('image')) {
            $file = $request->file('image');
            $name = 'lb_'.time().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/products_images/';
            $file->move($path, $name);
        }else
        {
            $name=null;
        }



        $producto = new producto($request->all());
        $producto->image = $name;
        $producto->save();
        flash("Se ha registrado: ".$producto->nombre." de forma existosa.")->success();
        return redirect()->route('producto.index');
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
        $producto = producto::find($id);
        return view('admin.productos.editProducto')->with('producto',$producto);
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
        $producto = producto::find($id);
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        if ($request->image == null) {
        //
        } else {
            $producto->image = $request->image;
        }

        $producto->save();
        flash("El producto".$producto->nombre." a sido editada con exito.")->success();
        return redirect()->route('producto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto=producto::find($id);
        $producto->delete();
        flash("El usuario ".$producto->nombre." a sido borrado de forma existosa.")->error()->important();
        return redirect()->route('producto.index');
    }
}
