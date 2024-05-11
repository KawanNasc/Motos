<?php

namespace App\Http\Controllers;

use App\Models\Moto;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class MotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motos = Moto::All();

        $contador = $motos->count();

        return 'N° de Motos: ' . $contador . '<br>' .  $motos . Response()->json([], Response::HTTP_NO_CONTENT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $motos = $request->All();

        $validacao = Validator::make($motos, [
            'marca' =>  'required',
            'modelo' =>  'required',
            'cor' =>  'required',
            'ano' =>  'required'
        ]);

        if ($validacao->fails()) {
            return 'Dados inválidos' . $validacao->error(true) . 500;
        }

        $cadastro = Moto::create($motos);

        if ($cadastro) {
            return 'Dados cadastrados com sucesso'  . Response()->json([], Response::HTTP_NO_CONTENT);
        } else {
            return 'Dados não cadastrados ' . Response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $motos = Moto::find($id);

        if ($motos) {
            return 'Moto localizada ' . $motos;
        } else {
            return 'Moto não localizada ' . Response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $motos = $request->all();

        $validacao = Validator::make($motos, [
            'marca' =>  'required',
            'modelo' =>  'required',
            'cor' =>  'required',
            'ano' =>  'required'
        ]);

        if ($validacao->fails()) {
            return 'Dados inválidos' . $validacao->error(true) . 500;
        }

        $alteracao = Moto::find($id);
        $alteracao->marca = $motos['marca'];
        $alteracao->modelo = $motos['modelo'];
        $alteracao->cor = $motos['cor'];
        $alteracao->ano = $motos['ano'];

        $retorno = $alteracao->save();

        if ($retorno) {
            return 'Dados atualizados com sucesso ' . Response()->json([], Response::HTTP_NO_CONTENT);
        } else {
            return 'Dados não atualizados ' . Response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $motos = Moto::find($id);

        if ($motos->delete()) {
            return 'A moto foi deletada ' . response()->json([], Response::HTTP_NO_CONTENT);
        }

        return 'A moto não foi deletada ' . response()->json([], Response::HTTP_NO_CONTENT);
    }
}
