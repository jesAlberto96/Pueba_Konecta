<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('productos.index', [
            'productos' => Producto::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create', [
            'categorias' => Categoria::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateStore($request);

        $factura = Producto::create([
            'nombre' => $request->nombre,
            'referencia' => $request->referencia,
            'precio' => $request->precio,
            'peso' =>  $request->peso,
            'stock' =>  $request->stock,
            'categoria_id' =>  $request->categoria_id,
        ]);

        return redirect('/productos');
    }

    private function validateStore(Request $request){
        $this->validate($request, [
            'nombre' => 'required',
            'referencia' => 'required',
            'precio' => 'required',
            'peso' => 'required',
            'stock' => 'required',
            'categoria_id' => 'required',
        ], [
            "nombre.required" => "El nombre es obligatorio !!!",
            "referencia.required" => "La referencia es obligatoria !!!",
            "precio.required" => "El precio es obligatorio !!!",
            "peso.required" => "El peso es obligatorio !!!",
            "stock.required" => "El stock es obligatorio !!!",
            "categoria_id.required" => "La categoría es obligatoria !!!"
        ]);
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
    public function edit(Producto $producto)
    {
        return view('productos.edit', [
            'producto' => $producto,
            'categorias' => Categoria::all()
        ]);
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
        $this->validateStore($request);

        $data = Producto::find($id);

        $data->nombre = $request->nombre;
        $data->referencia = $request->referencia;
        $data->precio = $request->precio;
        $data->peso = $request->peso;
        $data->stock = $request->stock;
        $data->categoria_id = $request->categoria_id;
        $data->save();

        return redirect(route('productos.edit', $data));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect(route('productos.index'));
    }
}
