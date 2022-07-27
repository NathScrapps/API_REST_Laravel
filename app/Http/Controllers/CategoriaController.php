<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function getCategoría(){
        return response()->json(categoria::all(),200);
    }

    public function getCategoriaId($id){
        $categoria = categoria::find($id);
        if (is_null($categoria)) {
            return response()->json(["Mensaje"=>"Regístro no encontrado"],404);
        }
        return response()->json($categoria::find($id),200);
    }

    public function insertCategoria(Request $request){
        $categoria = categoria::create($request->all());
        return response($categoria,200);
    }

    public function updateCategoria(Request $request, $id){
        $categoria = categoria::find($id);
        if (is_null($categoria)) {
            return response()->json(["Mensaje"=>"Regístro no encontrado"],404);
        }
        $categoria->update($request->all());
        return response($categoria,200);
    }
    public function deleteCategoria($id){
        $categoria = categoria::find($id);
        if (is_null($categoria)) {
            return response()->json(["Mensaje"=>"Regístro no encontrado"],404);
        }
        $categoria->delete();
        return response()->json(["Mensaje"=>"Regístro eliminado exitosamente!"],200);
    }
}
