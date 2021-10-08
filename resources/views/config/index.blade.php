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
                <input type="text" name="tipo_form" id="tipo_form" hidden value="conselho" > 
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

<h3  class="mt-5 mb-4">Configurações de funcionamento:</h3>

<div class="container mb-5">
    
    <ul class="list-group">
        <div class="col col-6 ">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Raio:
            <span id="raio">{{$configuracoes[0]->raio_espaco}}</span>

            <div class="input-group w-55" hidden id="input_raio">   
                <input type="text" class="form-control" value="" id="input_raio_valor">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="confirmarEdicao('raio')" >
                            <i class="fas fa-check"></i>
                        </button>
                        @csrf
                    </div>
            </div>

            <span class="d-flex">
                <button class="btn btn-info btn-sm me-2" onclick="editar('raio')" id="btn_editar_raio">
                    <i class="fas fa-edit"></i>
                </button>

            </span> 
        </li>

        <li class="list-group-item d-flex justify-content-between align-items-center">
            Trigger:
            <span id="trigger">{{$configuracoes[0]->trigger_denuncias}}</span>

            <div class="input-group w-55" hidden id="input_trigger">   
                <input type="text" class="form-control" value="" id="input_trigger_valor">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="confirmarEdicao('trigger')" >
                            <i class="fas fa-check"></i>
                        </button>
                        @csrf
                    </div>
            </div>

            <span class="d-flex">
                <button class="btn btn-info btn-sm me-2" onclick="editar('trigger')" id="btn_editar_trigger">
                    <i class="fas fa-edit"></i>
                </button>

            </span> 
        </li>
    
    </ul>
</div>

<script>

    raio_ = document.getElementById(`raio`).textContent;
    trigger_ = document.getElementById(`trigger`).textContent;

function editar(tipo)
    {
        console.log(tipo);
        switch(tipo)
        {
            case 'raio':
                document.getElementById('raio').hidden = true;
                document.getElementById('btn_editar_raio').hidden = true;
                document.getElementById('input_raio_valor').value = raio_;
                document.getElementById('input_raio').removeAttribute('hidden');
            break;

            case 'trigger':

                document.getElementById('trigger').hidden = true;
                document.getElementById('btn_editar_trigger').hidden = true;
                document.getElementById('input_trigger_valor').value =  trigger_;
                document.getElementById('input_trigger').removeAttribute('hidden');


            break;
        }
    }

    function confirmarEdicao(tipo)
    {

        switch(tipo)
        {
            case 'raio':
                valor = document.getElementById('input_raio_valor').value;
                if(raio_ == valor){

                    document.getElementById('raio').removeAttribute('hidden');
                    document.getElementById('btn_editar_raio').removeAttribute('hidden');
                    document.getElementById('input_raio').hidden = true;
                }
                else{
                    let formData = new FormData(); //Vai ser um fomulario enviado pelo javascript
                    formData.append('valor', valor); 
                    formData.append('tipo_form', 'raio'); 
                    formData.append('_token', document.querySelector(`input[name="_token"]`).value); 

                    fetch(document.URL, {
                    method: 'POST', 
                    body: formData
                    }).then(() => {
                    document.location.reload(true);
                    });
                }
            break;

            case 'trigger':

            valor = document.getElementById('input_trigger_valor').value;
                if(trigger_ == valor){

                    document.getElementById('trigger').removeAttribute('hidden');
                    document.getElementById('btn_editar_trigger').removeAttribute('hidden');
                    document.getElementById('input_trigger').hidden = true;
                }
                else{
                    let formData = new FormData(); //Vai ser um fomulario enviado pelo javascript
                    formData.append('valor', valor); 
                    formData.append('tipo_form', 'trigger'); 
                    formData.append('_token', document.querySelector(`input[name="_token"]`).value); 

                    fetch(document.URL, {
                    method: 'POST', 
                    body: formData
                    }).then(() => {
                    document.location.reload(true);
                    });
                }


            break;
        }

    }

</script>

@endsection
