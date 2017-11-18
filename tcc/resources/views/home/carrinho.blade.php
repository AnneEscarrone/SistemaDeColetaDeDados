@extends('template.template')
@section('content')
<div id="conteudoPrincipal">
    <h3 id="carrinhoCompras" class="post-title" tabindex="14">Carrinho de Compras</h3>
    </div>
    <br><br>
    <article class="post">
        <figure class="post-image"><img id="imagemChocolateQuente" src="imagens/chocolateQuente.jpg" alt=" " height="137" width="158"></figure>			  
        <div id="post-content1" class="post-content" >       
            <h3 id="espresso" class="post-title"tabindex="16">Chocolate Quente</h3>       
            <p id="descricaoProduto1" tabindex="17">Cremoso chocolate tipo Europeu servido na temperatura ideal.</p>
            <p id="precoProduto1" style="color: green" tabindex="18">Preço: R$ 6,50 </p>
            <input id="botaoComprar" type="submit" value="Comprar" tabindex="19">
        </div>       
    </article>
    
<script>
    window.onload = function () {      
        controlador.coletaEvento();
    };
</script>

@endsection
