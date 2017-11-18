@extends('template.template')
@section('content')
<link rel="stylesheet" href="css/tabela/css/normalize.min.css">
<link rel="stylesheet" href="css/tabela/css/style.css">
<div id="conteudoPrincipal">
    <h3 id="promocoesSemana" class="post-title" tabindex="14">Promoções da Semana</h3>
</div>
<br>
<article class="post">
    <table class="responstable"  sumary="Promoções da semana de segunda a sábado">
        <caption tabindex="15">Promoções de Semana</caption>        
        <tr>
            <th id="produtos"><p id="produto"> </p></th>
            <th tabindex="16" id="nomes" scope="col" ><p id="nome">Nome</p></th>
            <th tabindex="17" id="descricoes" scope="col" ><p id="descricao">Descrição</p></th>
            <th tabindex="18" id="precos" scope="col" ><p id="preco">Preço</p></th>                
        </tr>   
        <tbody>
            <tr> 
                <th tabindex="19" id="segunda-feira"  scope="row"><p id="segunda">Segunda</p>
                    <img class="imagem" id="imagemCafeExpresso" src="imagens/cafeExpresso.jpg" alt=" " ></th>
                <td tabindex="20" header="nomes"><p id="cafeEspresso" class="texto">Espresso</p></td>               
                <td tabindex="21" header="descricoes"><p id="descrocaoEspresso" class="texto">A verdadeira assência do café na sua forma mais concentrada.</p></td>
                <td tabindex="22" header="precos"><p id="precoEspresso" class="texto"> R$ 2,00 </p></td>               
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th tabindex="23" id="terca-feira"  scope="row"><p id="terca">Terça</p>
                    <img class="imagem" id="imagemCafeCappuccino" src="imagens/cappuccino.jpg" alt=" "></td>
                <td tabindex="24" header="nomes"><p id="cafeCappucino" class="texto">Cappuccino</p></td>
                <td tabindex="25" header="descricoes"><p id="descricaoCappucino" class="texto" >Combinação do café espresso, do leite cremoso vaporizado, com uma pitada de canela</p></td>
                <td tabindex="26" header="precos"><p id="precoCappucino" class="texto"> R$ 2,00</p></td>               
            </tr>
        </tbody>
        <tbody>
            <tr>                
                <th tabindex="27" id="quarta-feira" scope="row"><p id="quarta">Quarta</p>
                    <img class="imagem" id="imagemCafeCappuccinoEspecial" src="imagens/cappuccinoEspecial.jpg" alt=" ">
                </th>                                
                <td tabindex="28" header="nomes"><p id="cafeCappucinoEspecial" class="texto">Cappuccino Especial</p></td>
                <td tabindex="29" header="descricoes"><p id="descricaoCappucinoEspecial" class="texto">Combinação do café expresso, do leite cremoso vaporizado e do chocolate, com uma pitada de canela.</p></td>
                <td tabindex="30" header="precos"><p id="precoCappucinoEspecial"class="texto" >R$ 5,00</p></td>               
            </tr>
        </tbody>        
        <tbody>
            <tr>
                <th tabindex="31" id="quinta-feira" scope="row"><p id="quinta">Quinta</p>
                    <img class="imagem" id="imagemCafeMocca" src="imagens/cafeMocha.jpg" alt=" ">
                </th>
                <td tabindex="32" header="nomes"><p id="cafeMocca" class="texto" >Café Mocca</p></td>
                <td tabindex="33" header="descricoes"><p id="descricaoCafeMocca" class="texto" >Deliciosa calda de chocolate com leite cremoso vaporizado e um expresso rico e encorpado</p></td>
                <td tabindex="34" header="precos"><p id="precoCafeMocca" class="texto" > R$ 3,00</p></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th tabindex="35" id="sexta-feira" scope="row"><p id="sexta">Sexta</p>
                    <img class="imagem" id="imagemExpressoMacchiatto" src="imagens/cafeMacchinatto.jpg" alt=" ">
                </th>
                <td tabindex="36" header="nomes"><p id="cafeExpressoMacchiatto" class="texto" >Expresso Macchiatto</p></td>
                <td tabindex="37" header="descricoes"><p id="descricaoExpressoMacchiatto" class="texto" >Saboroso café expresso com um toque de espuma do leite vaporizado.</p></td>
                <td tabindex="38" header="precos"><p id="precoExpressoMacchiatto" class="texto" > R$ 2,20</p></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th tabindex="39" id="sab" scope="row"><p id="sabado">Sábado</p>
                    <img class="imagem" id="imagemChocolateQuente" src="imagens/chocolateQuente.jpg" alt=" ">
                </th>
                <td tabindex="40" header="nomes"><p id="cafeChocolateQuente" class="texto" >Chocolate Quente</p></td>
                <td tabindex="41" header="descricoes"><p id="descricaoChocolateQuente" class="texto" >Cremoso chocolate tipo Europeu servido na temperatura ideal.</p></td>
                <td tabindex="42" header="precos"><p id="precoChocolateQuente"class="texto" > R$ 4,50</p></td>
            </tr>
        </tbody>
    </table>
    <script src='js/respond.js'></script>

    <!-- /.post-content -->
</article>
<script>
    window.onload = function () {      
        controlador.coletaEvento();
    };
</script>

@endsection
