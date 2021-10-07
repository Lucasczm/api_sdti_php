@extends('layout')

@section('cabecalho')
Lista de pontos com denuncias feitas:
@endsection

@section('conteudo')

@foreach ($pontos as $ponto)
    

<div class="row p-5" >
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Ponto nº  {{$ponto->id}} /  {{$ponto->total}} denuncias feitas</li>
        <li class="list-group-item">Localização: Lat : {{$ponto->lat}} / Lon : {{$ponto->lon}} </li>
        <li class="list-group-item">Conselho tutelar mais próximo: x </li>
        <li class="list-group-item">Chamados feitos para esse ponto: {{explode('.' , ($ponto->total/10))[0]}} </li>
    </ul>
    
</div>

@endforeach

@endsection