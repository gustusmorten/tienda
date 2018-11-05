<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\venta;
use App\tienda;
use App\cliente;
use App\detalle;
use App\detallesProductos;
use App\producto;

class cartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:cliente');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total=0;
        $tiendas = tienda::orderBy('nombre','ASC')->pluck('nombre','id');
        $usuarios = cliente::orderBy('name','ASC')->pluck('name','id');
        $productos = producto::orderBy('nombre','ASC')->paginate(10);

        $cartCollection = \Cart::getContent();
        $cartTotalQuantity = \Cart::getTotalQuantity();
        $subTotal = \Cart::getSubTotal();
        //dd($subTotal);
        return view('shopingcart')
        ->with('tiendas',$tiendas)
        ->with('usuarios',$usuarios)
        ->with('productos',$productos)
        ->with('total',$total)
        ->with('cartProducts',$cartCollection)
        ->with('cartTotalProducts',$cartTotalQuantity)
        ->with('cartTotal',$subTotal);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $items = \Cart::getContent();

        $venta = new venta($request->all());
        $venta->cliente_id  = auth()->user()->id;
        $venta->fecha = \Carbon\Carbon::Now()->toDateTimeString();;
        $venta->save();

        $detalle=new detalle();
        $detalle->venta_id = $venta->id;
        $detalle->total = \Cart::getSubTotal();;
        $detalle->save();

        foreach ($items as  $item) {
            $arItems = $item->id;
            $detalleProductos=new detallesProductos();
            $detalleProductos->detalle_id = $detalle->id;
            $detalleProductos->producto_id = $item->id;
            $detalleProductos->cantidad = $item->quantity;
            $detalleProductos->save();
        }

        \Cart::clear();
        flash("Se a registrado el pedido No. ".$venta->id." de forma existosa.")->success();
        return redirect()->route('shopingCart.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }




    public function add($id)
    {
        $producto = producto::find($id);

        if(\Cart::get($producto->id)==null){

            \Cart::add(array(
                'id' => $producto->id,
                'name' => $producto->nombre,
                'price' => $producto->precio,
                'quantity' => 1,
                'attributes' => array()
            ));

        }else{

            \Cart::update($producto->id, array(
                'quantity' => 1,
              ));

        }
        return redirect()->route('shopingCart.index');
    }
    public function less($id)
    {

        $producto = producto::find($id);
        $cartProduct = \Cart::get($producto->id);

        if($cartProduct->quantity==1){

            \Cart::remove($producto->id);

        }else{

            \Cart::update($producto->id, array(
                'quantity' => -1,
              ));

        }
        return redirect()->route('shopingCart.index');
    }

    public function delete($id)
    {
        $producto = producto::find($id);
        \Cart::remove($producto->id);
        return redirect()->route('shopingCart.index');

    }

    public function clearCart($id)
    {


        \Cart::clear();
        return redirect()->route('shopingCart.index');

    }
}
