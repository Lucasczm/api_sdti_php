<?php

namespace App\Http\Controllers;

use App\Mail\SendMailUser;
use App\Models\pontos as ModelsPontos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class testeController extends Controller
{
    public function index()
    {
        Mail::to("vinicius.piovezan@eniac.edu.br")->send(new SendMailUser());
    }

     function mapa()
    {

        $pontos = ModelsPontos::query()->orderBy('total')->get();


        return view('testes.testes' , [ 
            "pontos" => $pontos,
        ]);
    }
}
