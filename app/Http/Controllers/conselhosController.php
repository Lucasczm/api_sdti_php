<?php

namespace App\Http\Controllers;

use App\Models\conselhos;
use App\Models\responsaveis_conselhos;
use Illuminate\Http\Request;

class conselhosController extends Controller
{
    public function index(Request $req)
    {
        $conselhos = responsaveis_conselhos::with('conselhos')->get();


        return view('conselhos.index' , [
            "conselhos" => $conselhos,
        ]);
    }
}
