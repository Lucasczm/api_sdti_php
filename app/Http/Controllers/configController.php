<?php

namespace App\Http\Controllers;

use App\Models\app_config;
use App\Models\responsaveis_conselhos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class configController extends Controller
{
    public function index(Request $req)     
    {
        $config = app_config::get();
        $mensagem = $req->session()->get('mensagem');
        return view('config.index' , 
        ['mensagem'=> $mensagem,
         'configuracoes' => $config,
        'raio' => $config[0]->raio_espaco]);
    }

    public function store(Request $req)
    {       
        
        if($req->tipo_form == "conselho"){

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
                "email" => $req->emailCon,
                "nome" => $req->nomeCon,
                "tel" => $req->telefoneCon,
                "endereco" => $req->enderecoCon,
            ]);
            DB::commit();
            
            $req->session()->flash('mensagem' , "Conselho Nº $resp->id criado com sucesso!");
            return redirect()->route('configuracoes');
        }
        elseif($req->tipo_form == "raio")
        {
            DB::beginTransaction();

            $raio = app_config::get();
            $raio[0]->raio_espaco = $req->valor;
            $raio[0]->save();
            DB::commit();
            $req->session()->flash('mensagem' , "Valor do raio de circulos alterado com sucesso!");


        }
        elseif($req->tipo_form == "trigger")
        {
            DB::beginTransaction();

            $trigger = app_config::get();
            $trigger[0]->trigger_denuncias = $req->valor;
            $trigger[0]->save();
            DB::commit();
            $req->session()->flash('mensagem' , "Valor de trigger alterado com sucesso!");


        }
    }
}
