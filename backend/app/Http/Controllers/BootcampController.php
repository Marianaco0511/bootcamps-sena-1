<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bootcamp;
use Illuminate\Support\Facades\Hash;
use File;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreBootcampRequest;
use App\Http\Resources\BootcampResource;
use App\Http\Resources\BootcampCollection;

class BootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo "Aquí se va a mostrar todos los Bootcamp";
        //return Bootcamp::all();
        return response()->json(new BootcampCollection(Bootcamp::all())
                                , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBootcampRequest $request)
    {
             //Crear el curso 

            $curso = new Course();
            $curso->bootcamp_id = $id;
            $curso->save();

            //Enviar response
            return response()->json([
             "success" => true,
             "data" => $curso
         ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Mostrar un bootcamp cuyo id es: $id
        //echo "Mostrar un bootcamp cuyo id es: $id";
        //return Bootcamp::find($id);
        return response()->json(
            [
                "success" => true,
                "data" => new BootcampResource(Bootcamp::find($id))
            ],200
        );
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
        //Aquí se va a actualizar el bootcamp con id: $id
        // echo "Aquí se va a actualizar el bootcamp con id: $id";
        //1. Seleccionar Bootcamp por id 
        $bootcamp = Bootcamp::find($id);

        //2. Actualizarlo
        $bootcamp->update(
            $request->all()
        );

        //3. Hacer el response respectivo
        return response()->json(
            [
                "success" => true,
                "data" =>  new BootcampResource($bootcamp)
            ],200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Aquí se va a eliminar el bootcamp cuyo id es: $id
        //echo "Aquí se va a eliminar el bootcamp cuyo id es: $id";
        //1. Seleccionas el bootcamp
        $bootcamp = Bootcamp::find($id);

        //2. Eliminar ese bootcamp
        $bootcamp->delete();

        //3. Response:
        //return response()->json("Bootcamp eliminado con Id: $id");
        return response()->json(
            [
                "success" => true,
                "message" => "Bootcamp eliminado con Id: $id",
                "data" => $bootcamp -> $id
            ],200
        );
    }
}
