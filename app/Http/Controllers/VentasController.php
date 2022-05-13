<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Venta;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ventas.create', [
            'productos' => Producto::all()
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

        $producto = Producto::find($request->producto_id);

        $warnings = $this->validateProductos($request, $producto);
        if (count($warnings) !== 0){
            return view('ventas.create', [
                'productos' => Producto::all(),
                'warnings' => $warnings
            ]);
        }

        $factura = Venta::create([
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
        ]);

        $producto->stock = ($producto->stock - $request->cantidad);
        $producto->save();

        return redirect(route('ventas.create'));
    }

    private function validateStore(Request $request){
        $this->validate($request, [
            'producto_id' => 'required',
            'cantidad' => 'required',
        ], [
            "producto_id.required" => "El producto es obligatorio !!!",
            "cantidad.required" => "La cantidad es obligatoria !!!",
        ]);
    }

    private function validateProductos(Request $request, Producto $producto){
        $errors = array();

        if ($producto->stock == 0){
            $errors[] = "No se puede realizar la venta, debido a que el producto está agotado.";
        } else {
            if ($producto->stock < $request->cantidad){
                $errors[] = "La cantidad requerida no está disponible.";
            }
        }


        return $errors;
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
}
