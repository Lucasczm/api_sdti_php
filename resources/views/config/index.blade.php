@extends('layout')

@section('cabecalho')
Configurações API TBR
@endsection

@if (!@empty($mensagem))

        <div class="alert alert-primary">
                {{$mensagem}}
        </div>
@endif

@section('conteudo')

<h3>cadastrar novo conselho tutelar:</h3>

<form method="post">
    @csrf

    Dados do conselho: 
    <div class="container mb-5 mt-2">
        <div class="row">
            <div class="col col-5 ">
                <label for="nome" class="form-label">*Nome conselho:</label>
                <input type="text" class="form-control" id="nomeCon"   name="nomeCon" value="{{ old('nomeCon') }}">
            </div>

            <div class="col col-3">
                <label for="email" class="form-label">*Email conselho:</label>
                <input type="email" class="form-control" id="emailCon"   name="emailCon" value="{{ old('emailCon') }}">
            </div>

            <div class="col col-3">
                <label for="telefone" class="form-label">*Telefone conselho:</label>
                <input type="text" class="form-control" id="telefoneCon"   name="telefoneCon" value="{{ old('telefoneCon') }}">
            </div>

            <div class="col col-3">
                <label for="telefone" class="form-label">*Endereço conselho:</label>
                <input type="text" class="form-control" id="enderecoCon"   name="enderecoCon" value="{{ old('enderecoCon') }}">
            </div>

            <div class="col col-3">
                <label for="telefone" class="form-label">*latitude conselho:</label>
                <input type="text" class="form-control" id="lat"   name="lat" value="{{ old('lat') }}">
            </div>
            <div class="col col-3">
                <label for="telefone" class="form-label">*longitude conselho:</label>
                <input type="text" class="form-control" id="lon"   name="lon" value="{{ old('lon') }}">
            </div>
            
            
        </div>
    </div>


        Dados do responsável pelo conselho: 
        <div class="container mb-5 mt-2">
            <div class="row">
                <div class="col col-5 ">
                    <label for="nome" class="form-label">*Nome responsável:</label>
                    <input type="text" class="form-control" id="nomeResp"   name="nomeResp" value="{{ old('nomeResp') }}">
                </div>

                <div class="col col-3">
                    <label for="email" class="form-label">*Email responsável:</label>
                    <input type="email" class="form-control" id="emailResp"   name="emailResp" value="{{ old('emailResp') }}">
                </div>

                <div class="col col-3">
                    <label for="telefone" class="form-label">*Telefone responsável:</label>
                    <input type="text" class="form-control" id="telefoneResp"   name="telefoneResp" value="{{ old('telefoneResp') }}">
                </div>
                
                
            </div>
        </div>


        <button class="btn btn-success" type="submit" id="enviar">Cadastrar</button>
</form>


@endsection