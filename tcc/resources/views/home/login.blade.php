@extends('template.template')
@section('content')

<div class="row" style="margin-left: 250px;" >
    <div id="div4" class="span8">
        <div id="conteudoPrincipal">
        <h3 id="informeUsuarioSenha" tabindex="14">Logue com seu usuário e senha</h3>
        </div>
        <br><br>
        <form id='conteudoPrincipal' >
            <label id="usuario" for="email" tabindex="16">Usuário:</label>
            <input id="emailOuUsuario" type="text" title="Dígite seu usuário" tabindex="17">
            <br><br>
            <label id="senha" for="senha" tabindex="18">Senha:</label>
            <input id="informeSenha" type="password" title="Dígite sua senha" tabindex="19">            
            <br><br>            
        </form>
        <input id="botaoLogar" tabindex="20" type="submit" value="Entrar" title="Pressione para entrar" style="margin-left: 50px;">
    </div>
</div>
<script>
    window.onload = function () {       
        controlador.coletaEvento();
    };
</script>
@endsection