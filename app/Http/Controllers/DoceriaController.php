<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doceria;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

class DoceriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dadosDoceria = Doceria::All();
        
        return 'Doceria Encontradas'.$dadosDoceria;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dadosDoceria = $request->All();
        $valida = Validator::make($dadosDoceria,[
            'titulo' => 'required',
            'conteudo' => 'required'
        ]);

        if($valida->fails()){
            return 'Dados incompletos '.$valida->errors(true). 500;
        }
        $RegistroDoceria = Doceria::create($dadosDoceria);
        if($RegistroDoceria){
            return 'Dados cadastrados com sucesso.';
        }else{
            return 'Dados não cadastrados no banco de dados';
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dadosDoceria = Doceria::find($id);
        $contador = $dadosDoceria->count();

        if($dadosDoceria){
            return 'Doceria encontradas: '.$contador.' - '.$dadosNoticias.response()
            ->json([],Response::HTTP_NO_CONTENT);
        }else{
            return 'Doceria não localizadas.'.response()->json([], Response::HTTP_NO_CONTENT);
        }
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dadosDoceria = $request->All();

        $valida = validator::make($dadosDoceria,[
            'titulo' => 'required',
            'conteudo' => 'required'
        ]);

        if($valida->fails()){
            return "Erro validação!!".$valida->$errors();
        }
        $dadosDoceriaBanco = Doceria::find($id);
        $dadosDoceriaBanco->titulo = $dadosDoceria['titulo'];
        $dadosDoceriaBanco->conteudo = $dadosDoceria['conteudo'];

        $enviarDoceria = $dadosDoceriaBanco->save();
        
        if($enviarDoceria){
            return 'O dado foi alterado com sucesso.' .response()->json([],
            Response::HTTP_NO_CONTENT);
        }else{
            return 'O dado não foi alterado.' .response()->json([],
            Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        /*$dadosDoceria = Doceria::all();*/
        $dadosDoceria = Doceria::find($id);
        if($dadosDoceria){
            $dadosDoceria->delete();
            return 'rr'.response()->json([], Response::HTTP_NO_CONTENT);
        }else{
            return 'rr'.response()->json([], Response::HTTP_NO_CONTENT);
        }
    }
}
