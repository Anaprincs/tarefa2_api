<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function store (Request $request){
        $tarefa = Tarefa::create([
            'titulo'=>$request->titulo,
            'descricao'=>$request->descricao
    
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Cadastrado',
            'data' => $tarefa
        ]);

    }

    public function findById($id)
    {
        $tarefa= Tarefa::find($id);

        if($tarefa==null){
            return response ()->json( [
                'status' => false,
                'message' => 'Tarefa não encontrada'
            ]);
        }
    

     return response ()->json( [
        'status' => true,
        'message' => 'Cadastrado',
        'data' => $tarefa
    ]);
}

    public function findByIdRequest(Request $request){
        $tarefa= Tarefa::find($request->id);

        if($tarefa==null){
            return response ()->json( [
                'status' => false,
                'message' => 'Tarefa não encontrada'
            ]);
        }
    

     return response ()->json( [
        'status' => true,
        'message' => 'Cadastrado',
        'data' => $tarefa
    ]);
}

    public function getAll()
    {
        $tarefa = Tarefa::all();

        return response()->json([
            'status' => false,
            'data' => $tarefa
        ]);
    }

    public function delete(Request $request)
    {
        $tarefa = Tarefa::find($request->id);

        $tarefa->delete();

        return response()->json([
            'status' => false,
            'message' => 'Tarefa deletada com sucesso'
            
        ]);
    }


    public function update($id)
    {
        $tarefa = Tarefa::find($id);

        if (isset($request-> titulo)){
        $tarefa->titulo= $request->titulo;
    }

        if (isset($request->descricao)){
        $tarefa->descricao=$request->descricao;
        
    }

        if (isset($request->status)){
        $tarefa->status = $request->status;
    }

        $tarefa->update();
        return response()->json([
            'status' => true,
            'message' => 'Atualizado com sucesso'
        ]);


    }

        public function pesquisa(Request $request){
            $tarefa=Tarefa::whereDay ('created_at', '=', $request->dia )->wheremonth ('created_at', '=', $request->mes )-> get();
            if ($tarefa->isEmpty()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Erro ao pesquisar',
                   
                ]);
            }
    
    
            return response()->json([
                'status' => true,
                'data' => $tarefa
            ]);
        }
}

