<?php

namespace App\Http\Controllers;

use App\Models\pontos as ModelsPontos;
use Illuminate\Http\Request;


class pontosController extends Controller
{
    public function index(Request $req)
    {
        $pontos = ModelsPontos::query()->orderBy('total')->get();

        return view('pontos.index' , [
            "pontos" => $pontos,
        ]);
    }
}
