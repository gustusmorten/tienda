<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//
use App\venta;
use App\tienda;
use App\cliente;
use App\detalle;
use App\detallesProductos;
use App\producto;
class ventasController extends Controller
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
        $total=0;
        $ventas = venta::orderBy('id','ASC')->paginate(10);
        $ventas->each(function($ventas, $venta){

            $ventas->cliente;
            $ventas->tienda;
            $ventas->detalle->detallesProductos;
            foreach($ventas->detalle->detallesProductos as $ventas2)
            {
                $ventas2->producto;

            }
        });
       // dd($ventas);
        return view('admin.ventas.ventas',['ventas'=>$ventas,'total'=>$total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $total=0;
        $tiendas = tienda::orderBy('nombre','ASC')->pluck('nombre','id');
        $usuarios = cliente::orderBy('name','ASC')->pluck('name','id');
        $productos = producto::orderBy('nombre','ASC')->paginate(10);

        $cartCollection = \Cart::getContent();
        $cartTotalQuantity = \Cart::getTotalQuantity();
        $subTotal = \Cart::getSubTotal();

        return view('admin.ventas.createVenta')
        ->with('tiendas',$tiendas)
        ->with('usuarios',$usuarios)
        ->with('productos',$productos)
        ->with('total',$total)
        ->with('cartProducts',$cartCollection)
        ->with('cartTotalProducts',$cartTotalQuantity)
        ->with('cartTotal',$subTotal);

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

        return redirect()->route('venta.index');
    }


    public function destroy($id)
    {
        $venta=venta::find($id);
        $venta->delete();
        flash("La venta a sido borrada de forma existosa.")->error()->important();
        return redirect()->route('venta.index');
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
        return redirect()->route('venta.create');
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
        return redirect()->route('venta.create');
    }

    public function delete($id)
    {
        $producto = producto::find($id);
        \Cart::remove($producto->id);
        return redirect()->route('venta.create');

    }

    public function clearCart($id)
    {

        \Cart::clear();
        return redirect()->route('venta.create');

    }

}
