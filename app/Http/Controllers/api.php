<?php

namespace App\Http\Controllers;

use App\Models\app_config;
use App\Models\conselhos;
use App\Models\pontos;
use App\Models\responsaveis_conselhos;
use App\Services\MedirDistancia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class api extends Controller
{
    public function calcular(Request $req)
    {   
        $lat = $req->lat;
        $lon = $req->lon;

        $pontos = pontos::get();
        $config = app_config::get();
        $conselhos = responsaveis_conselhos::with('conselhos')->get();
    
        

        if(!$pontos->isEmpty()) //Se já existir algum ponto
        {
            $flag = false;

            foreach($pontos as $ponto)
            {
                $dist = MedirDistancia::distancia($lat , $lon, $ponto->lat , $ponto->lon); //Verifico dentro desses pontos existentes se o local recebido está próximo

                if($dist < $config[0]->raio_espaco) //Indica que a denuncia feita pertence a esse ponto
                {   
                    DB::beginTransaction();
                    $ponto_novo  = $ponto->denuncias()->create([
                        'lat' => strval($lat),
                        'lon' => strval($lon)
                        ]);
                    
                    if($config[0]->trigger_denuncias <= $ponto->var )
                    {
                        $ponto->var =  1;
                        //Gera denuncia formal
                        $id_conselho_escolhido  = -1;
                        $distancia_temp_conselho = 9999999999; 
                        foreach($conselhos as $conselho){
                            $dist = MedirDistancia::distancia($conselho->conselhos->lat , $conselho->conselhos->lat, $ponto->lat , $ponto->lon); //Verifico dentro desses pontos existentes se o local recebido está próximo
                            if($dist < $distancia_temp_conselho)
                            {
                                $id_conselho_escolhido = $conselho->id;
                                $distancia_temp_conselho = $dist;
                            }
                        }                        
                        if($id_conselho_escolhido != -1)
                        {
                            //Envia email para o conselho X
                            //Envia mensagem no telegram
                            $mensagem = "Muitas denuncias estão sendo feitas no ponto nº : $ponto->id %0AFoi verificado que o conselho tutelar {$conselho->conselhos->nome} é o mais próximo desse ponto. %0AAs coordenadas desse ponto são:%0ALat: $ponto->lat %0ALon:$ponto->lon. %0AO Endereço do conselho é : {$conselho->conselhos->endereco}";
                             $req = file_get_contents("https://api.telegram.org/bot2032416402:AAF2aKJ1uCvgfq8yHSJQ_0i8T2k8UUqqAug/sendMessage?chat_id=-790989297&text=$mensagem");
                            
                        }
                    }
                    else{
                        $ponto->var =  $ponto->var+1;
                    }
                    $ponto->total =  $ponto->total+1;
                    $ponto->save();
                    DB::commit();

                    $flag = true;
                    break;
                }
                
            }

            if(!$flag)
            {
                DB::beginTransaction();

                $ponto = pontos::create([ 
                    "lat" => strval($lat),
                    "lon" => strval($lon),
                    "var" => 1,
                    "total" => 1,
                ]);
                $ponto_novo  = $ponto->denuncias()->create([
                    'lat' => strval($lat),
                    'lon' => strval($lon)
                    ]);
                DB::commit();
            }
        }
        else{
            DB::beginTransaction();

                $ponto = pontos::create([ 
                    "lat" => strval($lat),
                    "lon" => strval($lon),
                    "var" => 1,
                    "total" => 1,
                ]);
                $ponto_novo  = $ponto->denuncias()->create([
                    'lat' => strval($lat),
                    'lon' => strval($lon)
                    ]);
                DB::commit();
        }
        return "Denuncia feita com sucesso!";
        //dd(pontos::get());
        //return (""$lat  $lon"");
        //return  medir_distancia::distancia(-23.483799381412894, -46.54102231241273,-23.47298679215245, -46.53109207139506);
    }
}
