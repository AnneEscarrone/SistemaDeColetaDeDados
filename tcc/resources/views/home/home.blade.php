@extends('template.template')
@section('content')
<div id="conteudoPrincipal">
    <h3 id="bemVindo" class="post-title" tabindex="14">
        Seja Bem-vindo!
    </h3>
</div>
<img src="imagens/cafeQuente.jpg" alt=" Aqui tem café quentinho" id="cafeQuente" tabindex="15" ></div>
<script>
    window.onload = function () {      
        controlador.coletaEvento();
    };       
    
</script>

@endsection
