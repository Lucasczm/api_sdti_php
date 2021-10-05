<?php

namespace App\Http\Controllers;

use App\Models\responsaveis_conselhos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class configController extends Controller
{
    public function index(Request $req)     
    {
        return view('config.index');
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

        $resp->conselho()->create([
            "lat" => $req->lat,
            "lon" => $req->lon,
        ]);
        DB::commit();
        dd($req);
    }
}
