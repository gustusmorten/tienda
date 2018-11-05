<?php

namespace App\Http\Controllers;
//use laracast\Flash\Flash;
use Illuminate\Http\Request;
use App\User;
use App\cliente;
class clientesController extends Controller
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

        $usuarios = User::orderBy('id','ASC')->paginate(5);
        $clientes = cliente::orderBy('id','ASC')->paginate(5);
        return view('admin.usuarios')
        ->with('users',$usuarios)
        ->with('cliente',$clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
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
            'email' => 'unique:users,email',
            'email' => 'unique:clientes,email',
        ]);
        //dd($request->type);
        if ($request->type == 'admin') {
            $cliente = new User($request->all());
            $cliente->password = bcrypt($request->password);

        } else {
            $cliente = new cliente($request->all());
            $cliente->password = bcrypt($request->password);

        }

        $cliente->save();

        flash("Se ha registrado: ".$cliente->name." de forma existosa.")->success();
        return redirect()->route('cliente.index');


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

        $user = cliente::find($id);
        return view('admin.editClientes')->with('user',$user);
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



        $user = cliente::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        //$user->type = $request->type;
        $user->save();
        flash("El usuario ".$user->name." a sido editado con exito.")->success();
        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=cliente::find($id);
        $user->delete();
        flash("El usuario ".$user->name." a sido borrado de forma existosa.")->error()->important();
        return redirect()->route('cliente.index');
    }
}
