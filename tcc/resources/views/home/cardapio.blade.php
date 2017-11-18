@extends('template.template')
@section('content')
<div id="conteudoPrincipal">
    <h3 id="cardapio" class="post-title" tabindex="14">Cardápio</h3>
    </div>
    <br><br>
    <article class="post">
        <figure class="post-image "><img id="imagemCafeExpresso" src="imagens/cafeExpresso.jpg" alt=" " height="137" width="158"></figure>			  
        <div id="post-content1" class="post-content" >       
            <h3 class="post-title"tabindex="15" id='espresso'>Espresso</h3>       
            <p id="descricaoProduto1" tabindex="16">A verdadeira assência do café na sua forma mais concentrada.</p>
            <p id="precoProduto1" style="color: green" tabindex="17">Preço: R$ 4,00 </p>
            <a id="linkCarrinhoprod1" href="#">
                Faça seu pedido: 
                <input id="botaoCarrinhoprod1" type="submit" value="Comprar" tabindex="18" ></a>
        </div>
    </article>
    <article class="post">
        <figure class="post-image"><img id="imagemCafeCappuccino" src="imagens/cappuccino.jpg" alt=" " height="137" width="158"></figure>			  
        <div id="post-content2" class="post-content" >       
            <h3 id="cappuccino" class="post-title"tabindex="20">Cappuccino</h3>       
            <p id="descricaoProduto2" tabindex="21">Clássica combinação do café espresso, do leite cremoso vaporizado, com uma pitada de canela.</p>
            <p id="precoProduto2" style="color: green" tabindex="22">Preço:  R$ 7,00</p>
            <a id="linkCarrinhoprod2" href="#"> 
                Faça seu pedido: 
                <input id="botaoCarrinhoprod2" type="submit" value="Comprar" tabindex="23" ></a>
        </div>
    </article>
    <article class="post">
        <figure class="post-image " ><img id="imagemCafeCappuccinoEspecial" src="imagens/cappuccinoEspecial.jpg" alt=" " width="158"></figure>			  
        <div id="post-content3" class="post-content" >       
            <h3 id ="cappucinoEspecial" class="post-title"tabindex="25">Cappuccino Especial</h3>       
            <p id="descricaoProduto3" tabindex="26">Cappuccino tradicional com raspas de chocolate no fundo da taça e um delicioso toque de chantilly.</p>
            <p id="precoProduto3" style="color: green" tabindex="27">Preço: R$ 7,00</p>
            <a id="linkCarrinhoprod3" href="#">
                Faça seu pedido: 
                <input id="botaoCarrinhoprod3" type="submit" value="Comprar" tabindex="28" ></a>
        </div>
    </article>
    <article class="post">
        <figure class="post-image "><img id="imagemChocolateQuente" src="imagens/chocolateQuente.jpg" alt="" height="137" width="158"></figure>			  
        <div id="post-content4" class="post-content" >       
            <h3 id="chocolateQuente" class="post-title"tabindex="30">Chocolate Quente</h3>       
            <p id="descricaoProduto4" tabindex="31">Cremoso chocolate tipo Europeu servido na temperatura ideal.</p>
            <p id="precoProduto4" style="color: green" tabindex="32">Preço: R$ 6,50 </p>
            <a id="linkCarrinhoprod4" href="/Carrinho" onclick="controlador.finalizaSecao(); $('#linkCarrinhoprod4').removeAttr('onclick');">
                Faça seu pedido: 
                <input id="botaoCarrinhoprod4" type="submit" value="Comprar" tabindex="33" ></a>
        </div>
    </article>
    <article class="post">
        <figure class="post-image "><img id="imagemCafeMocca" src="imagens/cafeMocha.jpg" alt=" " height="137" width="158"></figure>			  
        <div id="post-content5" class="post-content" >       
            <h3 id="cafeMocca" class="post-title"tabindex="35">Café Mocca</h3>       
            <p id="descricaoProduto5" tabindex="36">Combinação de uma deliciosa calda de chocolate com leite cremoso vaporizado e um expresso rico e encorpado.</p>
            <p id="precoProduto5" style="color: green" tabindex="37">Preço: R$ 6,00 </p>
            <a id="linkCarrinhoprod5" href="#">
                Faça seu pedido: 
                <input id="botaoCarrinhoprod5" type="submit" value="Comprar" tabindex="38" ></a>
        </div>
    </article>
    <article class="post">
        <figure class="post-image " ><img id="imagemCafeSubmarino" src="imagens/submarino.jpg" alt=" " height="137" width="158"></figure>			  
        <div id="post-content6" class="post-content" >       
            <h3 id="cafeSubmarino" class="post-title"tabindex="40">Submarino</h3>       
            <p id="descricaoProduto6" tabindex="41">União saborosa do leite vaporizado com uma barra de chocolate submersa em um toque especial de Chantilly.</p>
            <p id="precoProduto6" style="color: green" tabindex="42">Preço: R$ 6,90 </p>
            <a id="linkCarrinhoprod6" href="#">
                Faça seu pedido: 
                <input id="botaoCarrinhoprod6" type="submit" value="Comprar" tabindex="43" ></a>
        </div>
    </article>
    <article class="post">
        <figure class="post-image " ><img id="imagemCafeLatte" src="imagens/cafeLatte.jpg" alt=" " height="137" width="158"></figure>			  
        <div id="post-content7" class="post-content" >       
            <h3 id="cafeLatte" class="post-title"tabindex="45">Café Latte</h3>       
            <p id="descricaoProduto7" tabindex="46">Clássico café com leite: leite valorizado e café expresso, delicadamente coberto por espuma de leite.</p>
            <p id="precoProduto7" style="color: green" tabindex="47">Preço: R$ 3,90 </p>
            <a id="linkCarrinhoprod7" href="#">
                Faça seu pedido: 
                <input id="botaoCarrinhoprod7" type="submit" value="Comprar" tabindex="48" ></a>
        </div>
    </article>
    <article class="post">
        <figure class="post-image " ><img id="imagemExpressoMacchiatto" src="imagens/cafeMacchinatto.jpg" alt=" " height="137" width="158"></figure>			  
        <div id="post-content8" class="post-content" >       
            <h3 id="cafeExpressoMacchiatto" class="post-title"tabindex="50">Expresso Macchiatto</h3>       
            <p id="descricaoProduto8" tabindex="51">Saboroso café expresso com um toque de espuma do leite vaporizado.</p>
            <p id="precoProduto8" style="color: green" tabindex="52">Preço: R$ 3,20 </p>
            <a id="linkCarrinhoprod8" href="#">
                Faça seu pedido: 
                <input id="botaoCarrinhoprod8" type="submit" value="Comprar" tabindex="53" ></a>
        </div>
    </article>

<script>
    window.onload = function () {        
        controlador.coletaEvento();

    };
</script>

@endsection
