<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Aula;

class AulaController extends Controller
{
    //abri o formulario de cadastro
    public function mostrarFormAula(){
        return view('cad_aula');
    }

    public function index(){
        return view('index');
    }

    public function cadastroAula(Request $request){
        //verifica se existe algo na variável 
        $registroAula = $request->validate([
            'idcurso' => 'numeric|required',
            'tituloaula'=> 'string|required',
            'urlaula'=> 'string|required',
        ]);
        //Esta linha é que grava o registro no banco
        Aula::create($registroAula);
        return Redirect::route('index');
    }

    public function showManipulationCategory(){
        $registroAula = Aula::All();
    
        return view('manipula_aula', ['registrosAula' => $registroAula]);
    }
}