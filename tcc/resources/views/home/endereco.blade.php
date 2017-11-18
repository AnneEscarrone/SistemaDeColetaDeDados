@extends('template.template')
@section('content')
<div id="dv2" class="row" style="margin-left: 250px;">
    <div id="div3" class="span8">
        <div id="conteudoPrincipal">
        <h3 id="tituloEndereco" tabindex="14">Esperamos Você!</h3>
        </div>
        <br>        
            <div id='endereco'>            
                <h4 id="telefone" tabindex="15">Telefone: (55) 3274 25556</h4>                                     
                <h4 id="sede" tabindex="16">Sede: Rua Vasco Alves, 227</h4>
                <h4 id="cidade" tabindex="17">Alegrete - RS</h4>
            </div>       
        <img id="imgCafeEndereco" src="imagens/cafe-endereco.jpg" alt=" ">
    </div>
</div>
<script>
    window.onload = function () {       
        controlador.coletaEvento();
    };
</script>
@endsection