<?php

namespace App\Http\Controllers;

use App\Models\responsaveis_conselhos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class configController extends Controller
{
    public function index(Request $req)     
    {

        $mensagem = $req->session()->get('mensagem');
        return view('config.index' , 
        ['mensagem'=> $mensagem]);
    }

    public function store(Request $req)
    {   
        DB::beginTransaction();
        $resp = responsaveis_conselhos::create([
            "nome" => $req->nomeResp,
            "email" => $req->emailResp,
            "tel" => $req->telefoneResp,
            "endereco" => $req->enderecoCon,
        ]);

        $resp->conselhos()->create([
            "lat" => $req->lat,
            "lon" => $req->lon,
            "email_con" => $req->emailCon,
            "nome_con" => $req->nomeCon,
            "tel_con" => $req->telefoneCon,
            "endereco_con" => $req->enderecoCon,
        ]);
        DB::commit();
        
        $req->session()->flash('mensagem' , "Conselho Nº $resp->id criado com sucesso!");
        return redirect()->route('configuracoes');
    }
}
