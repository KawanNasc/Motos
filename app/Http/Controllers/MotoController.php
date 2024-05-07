<?php

namespace App\Http\Controllers;

use App\Models\Moto;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
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

        return 'N° de Motos: ' . $contador . '<br>'.  $motos.Response()->json([], Response::HTTP_NO_CONTENT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $motos = $request::All();

        $validacao = Validator::make($motos, [
            'marca' =>  'required',
            'modelo' =>  'required',
            'cor' =>  'required', 
            'ano' =>  'required'
        ]);

        if ($validacao->fails()) { return 'Dados inválidos' . $validacao->error(true) . 500; }

        $cadastro = Moto::create($motos);

        if ($cadastro) { return 'Dados cadastrados com sucesso' . Response()->json([], Response::HTTP_NO_CONTENT); }
        else { return 'Dados não cadastrados' . Response()->json([], Response::HTTP_NO_CONTENT); }
    }

    /**
     * Display the specified resource.
     */
    public function show(Moto $moto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Moto $moto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Moto $moto)
    {
        //
    }
}
