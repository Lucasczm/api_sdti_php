@extends('layout')

@section('cabecalho')
Lista conselhos tutelares cadastrados:
@endsection

@section('conteudo')

@foreach ($conselhos as $conselho)
    

<div class="row p-4" >
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Nome do conselho:  {{$conselho->conselhos->nome}} </li>
        <li class="list-group-item">Endereço do conselho: {{$conselho->conselhos->endereco}} </li>
        <li class="list-group-item">Nome do responsável: {{$conselho->nome}} </li>
        <li class="list-group-item">Latitude e longitude : {{$conselho->conselhos->lat}} , {{$conselho->conselhos->lon}} </li>
    </ul>
    
</div>

@endforeach

@endsection