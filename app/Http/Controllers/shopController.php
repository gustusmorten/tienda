<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\producto;

class shopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */


    public function index()
    {
        $productos = producto::orderBy('id','DEC')->get();
        return view('shop')
        ->with('productos',$productos);
    }
    public function indexProducto($id)
    {

        $producto = producto::find($id);
        return view('item')->with('producto',$producto);
    }



}
