@extends('template.template')
@section('content')
<div class="row">
    <div id="div1" class="span8">
        <div id="conteudoPrincipal">
            <h3 id="faleConosco" tabindex="14" class="post-title">Fale conosco!</h3>
        </div>
        <br><br>
        <form id='form' method="post">
            <label id="nome" for="nome"tabindex="15">Nome Completo:</label>
            <input id="informeNome" tabindex="16"type="text" title="Dígite seu nome completo" >
            <br><br>
            <label id="email" tabindex="17" for="email">E-mail:</label>
            <input id="informeEmail" tabindex="18" type="text" title="Dígite seu e-mail" >
            <br><br>           
            <label id="estado" tabindex="23" for="estado">Estado:</label>
            <select id="informeEstado" title="selecione seu estado" tabindex="24">
                <option id="selecione" value="">Selecione</option>
                <option id="acre" value="AC">Acre</option>
                <option id="alagoas" value="AL">Alagoas</option>
                <option id="amapa" value="AP">Amapá</option>
                <option id="amazonas" value="AM">Amazonas</option>
                <option id="bahia" value="BA">Bahia</option>
                <option id="ceara" value="CE">Ceará</option>
                <option id="distritoFederal" value="DF">Distrito Federal</option>
                <option id="espiritoSanto" value="ES">Espirito Santo</option>
                <option id="goias" value="GO">Goiás</option>
                <option id="maranhao" value="MA">Maranhão</option>
                <option id="matoGrossoSul" value="MS">Mato Grosso do Sul</option>
                <option id="matoGrosso" value="MT">Mato Grosso</option>
                <option id="minasGerais" value="MG">Minas Gerais</option>
                <option id="para" value="PA">Pará</option>
                <option id="paraiba" value="PB">Paraíba</option>
                <option id="parana" value="PR">Paraná</option>
                <option id="pernambuco" value="PE">Pernambuco</option>
                <option id="piaui" value="PI">Piauí</option>
                <option id="rioDeJaneiro" value="RJ">Rio de Janeiro</option>
                <option id="rioGrandeDoNorte" value="RN">Rio Grande do Norte</option>
                <option id="rioGrandeDoSul" value="RS">Rio Grande do Sul</option>
                <option id="rondonia" value="RO">Rondônia</option>
                <option id="roraima" value="RR">Roraima</option>
                <option id="santaCatarina" value="SC">Santa Catarina</option>
                <option id="saoPaulo" value="SP">São Paulo</option>
                <option id="sergipe" value="SE">Sergipe</option>
                <option id="tocantins" value="TO">Tocantins</option>
            </select> 
            <br><br>
            <label id="sexo" tabindex="25" for="radio">Sexo:</label>
            <input id="feminino" tabindex="26" type="radio" name="opcap" value="op1" title="feminino" > Feminino
            <input id="masculino" tabindex="27" type="radio" name="opcap" value="op2" title="masculino" > Masculino 
            <br><br>
            <label id="mensagem" tabindex="28" for="msg">Mensagem:</label>
            <textarea id="textoMsg" title="digite sua mensangem" tabindex="29"></textarea>
            <br><br>
            <input id="aceitoReceberInformacao" tabindex="30" title="selecione se deseja receber e-mails com promoções" type="checkbox" name="receber_info" checked> 
            <label id="checkbox" for="checkbox">Desejo receber e-mails com promoções:</label>
            <br><br>            
        </form>
        <input id="botaoEnviar" tabindex="32" type="submit" value="Enviar" title="Pressione para enviar">
    </div>
</div>
<script>
    window.onload = function () {       
        controlador.coletaEvento();
    };
</script>
@endsection
