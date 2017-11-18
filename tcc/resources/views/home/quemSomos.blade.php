@extends('template.template')
@section('content')
<div id="dv2" class="row" style="margin-left: 250px;">
    <div id="dv3" class="span8">
        <div id='conteudoPrincipal'>
            <h3 id="titulo" tabindex="14">Café Aqui</h3>
        </div>
        <br>       
        <p id="segundoParagrafo" tabindex="15"> Buscando sempre a excelência, o Café Aqui se tornou sinônimo de qualidade e estamos sempre em busca das melhores práticas de gestão, desenvolvimento da marca 
            e aperfeiçoamento da experiência do cliente. Acreditamos que a melhor forma de atrair e
            manter clientes satisfeitos é sempre trabalhar de forma justa e sincera.
        </p>
        <p id="primeiroParagrafo" tabindex="16">Fundado em 2017 na cidade de Alegrete, o Café Aqui 
            rapidamente se consolidou no mercado de cafeterias através de três pilares essenciais: 
            alta qualidade dos produtos, preço justo e atendimento diferenciado.
        </p>            

        <p id="terceiroParagrafo" tabindex="17">Missão:
            A missão do Café Aqui é oferecer aos seus clientes 
            atendimento e produtos de alta qualidade. Nós existimos para atrair, 
            satisfazer e manter clientes com um atendimento cordial e simpático, 
            fazendo do nosso ambiente um lugar agradável de modo que clientes e funcionários sintam conforto 
            e acolhimento ao serem recebidos. A adoção rigorosa dessa missão garantirá nosso sucesso.
            Nosso atendimento e produtos superarão as expectativas dos clientes.
        </p>
        <p id="quartoParagrafo" tabindex="18">Visão:
            Até 2018 ser uma das 5 maiores redes de cafeterias do Brasil e ter presença internacional
        </p>        
    </div>
</div> 
<script>
    window.onload = function () {       
        controlador.coletaEvento();
    };
</script>
@endsection