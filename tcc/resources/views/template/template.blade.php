<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Café Aqui</title>
        <meta name="csrf-token" content="{{csrf_token()}}"/>
    </head>
    <link href="{{ asset('css/teste.css') }}" rel="stylesheet">

    <!--<link href="{{ asset('css/template/teste.css') }}" rel="stylesheet">-->
    <link rel="stylesheet" id="themify-styles-css" href="{{ asset('css/template/style.css') }}" type="text/css" media="all">
    <link rel="stylesheet" id="themify-media-queries-css" href="{{ asset('css/template/media-queries.css') }}"  type="text/css" media="all">    
    <body class ="home blog">
        <input id="token" type="hidden" name="_token" value="{{csrf_token()}}" id="token">
        <div id="pagewrap">
            <div id="headerwrap">
                <br>
               
                <header id="header" class="pagewidth">
                     <a id="irConteudoPrincipal" href="#conteudoPrincipal" style="margin-left:45%; font-size:140%" tabindex="1">ir para o conteúdo principal</a>
                    <hgroup>
                        <h1 id="site-logo"tabindex="2" >Café Aqui</h1>	
                        <h2 id="site-description" tabindex="3">Experimente o melhor café da internet</h2>
                    </hgroup>                    
                    <div id="login" class="social-widget">                                                   
                        <a id="entrar" tabindex="4"  href="/Login" ><button id="entrarBotao" onclick="controlador.finalizaSecao(); this.disabled = true;">Entrar</button></a>                                                                
                    </div>     
                    <a id="linkfinalizaTarefa" tabindex="5" style="color: white" href="#" >
                        <button id="finalizaSessao" type="button" onclick="controlador.isAtiveSecao = false; controlador.finalizaSecao(); this.disabled = true" >Finalizar Tarefa</button>
                    </a>

                    <nav id="nav">
                        <ul id="main-nav" class="main-nav clearfix">
                            <li><a id="inicio" onclick="controlador.finalizaSecao(); $('#inicio').removeAttr('onclick');" href='/Home' tabindex="6">Início</a></li>
                            <li><a id="quemSomosNos" onclick="controlador.finalizaSecao(); $('#quemSomosNos').removeAttr('onclick');" href="/QuemSomos" tabindex="7">Quem Somos Nós</a>                                
                            <li id="pai1"><a id="nossosCafes" href="#" tabindex="8">Nossos Cafés</a>
                                <ul class="children" id="children1">
                                    <li id="cardapioli"><a tabindex="9" id="cardapioSubMenu" onclick="controlador.finalizaSecao(); $('#cardapioSubMenu').removeAttr('onclick');" href="/Cardapio">Cardápio</a></li>
                                    <li id="promocoesSemanali"><a tabindex="10" id="promocoesSemanaSubMenu" onclick="controlador.finalizaSecao(); $('#promocoesSemanaSubMenu').removeAttr('onclick');" href="/PromocoesDaSemana">Promoções da Semana</a></li>
                                </ul>
                            </li>
                            <li id="pai2"><a id="contato" href="#" tabindex="11">Contato</a>
                                <ul class="children" id="children2">
                                    <li id="enderecoli"><a tabindex="12" id="enderecoSubMenu" onclick="controlador.finalizaSecao(); $('#enderecoSubMenu').removeAttr('onclick'); "  href="/Endereco" >Endereço</a></li>
                                    <li id="faleConoscoli"><a tabindex="13" id="faleConosSubMenu" onclick="controlador.finalizaSecao(); $('#faleConosSubMenu').removeAttr('onclick');"  href="/Contato">Fale Conosco</a></li>
                                </ul>
                            </li>
                        </ul><!-- /#main-nav --> 
                    </nav>   
                </header>
            </div>                           

            <div id="layout" class="pagewidth clearfix sidebar1">
                <div id="content">
                    <div id="list" class="loops-wrapper list-thumb-image">
                        @yield('content') 
                    </div>
                </div>

            </div>

        </div>

        <script type="text/javascript" language="javascript" src="jquery/jquery.min.js"></script>
        <script type="text/javascript" language="javascript" src="css/template/template.js"></script>
        <script type="text/javascript" language="javascript" src="js/CapturadorEventos/Model/Element.js"></script>
        <script type="text/javascript" language="javascript" src="js/CapturadorEventos/Model/Mouse.js"></script>
        <script type="text/javascript" language="javascript" src="js/CapturadorEventos/Model/Keyboard.js"></script>
        <script type="text/javascript" language="javascript" src="js/CapturadorEventos/Model/Event.js"></script>
        <script type="text/javascript" language="javascript" src="js/CapturadorEventos/Model/CoordenadasMouse.js"></script>
        <script type="text/javascript" language="javascript" src="js/CapturadorEventos/Model/Session.js"></script>
        <script type="text/javascript" language="javascript" src="js/CapturadorEventos/Controller/ControllerKeyboard.js"></script>
        <script type="text/javascript" language="javascript" src="js/CapturadorEventos/Controller/ControllerElement.js"></script>
        <script type="text/javascript" language="javascript" src="js/CapturadorEventos/Controller/ControllerMouse.js"></script>
        <script type="text/javascript" language="javascript" src="js/CapturadorEventos/Controller/ControllerSession.js"></script>
        <script>
                                        desbloqueiaSubMenu();
                                        
        </script>
    </body>


</html>
