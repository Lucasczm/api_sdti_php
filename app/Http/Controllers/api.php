<?php

namespace App\Http\Controllers;

use App\Models\app_config;
use App\Models\pontos;
use App\Services\medir_distancia;
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
        

        if(!$pontos->isEmpty()) //Se já existir algum ponto
        {
            $flag = false;

            foreach($pontos as $ponto)
            {
                $dist = medir_distancia::distancia($lat , $lon, $ponto->lat , $ponto->lon); //Verifico dentro desses pontos existentes se o local recebido está próximo

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

        dd(pontos::get());
        //return (""$lat  $lon"");
        //return  medir_distancia::distancia(-23.483799381412894, -46.54102231241273,-23.47298679215245, -46.53109207139506);
    }
}
