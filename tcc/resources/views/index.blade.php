<html>
    <head>
        <meta name="csrf-token" content="{{csrf_token()}}"/>
    </head>
    <link href="{{ asset('css/teste.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" language="javascript" src="js/CapturadorEventos/Model/CoordenadasMouse.js"></script>
    <script type="text/javascript" language="javascript" src="js/CapturadorEventos/Model/Elemento.js"></script>
    <script type="text/javascript" language="javascript" src="js/CapturadorEventos/Model/Mouse.js"></script>
    <script type="text/javascript" language="javascript" src="js/CapturadorEventos/Model/Teclado.js"></script>
    <script type="text/javascript" language="javascript" src="js/CapturadorEventos/Model/Evento.js"></script>
    <script type="text/javascript" language="javascript" src="js/CapturadorEventos/Model/Sessao.js"></script>
    <script type="text/javascript" language="javascript" src="js/CapturadorEventos/Controller/Controlador.js"></script>
    <body onload="controlador.coletaEvento()">
        <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
        <h1 id="oi">Oiiii</h1>

        <p id="ola">olá</p>
        <p id="qq" onclick=" controlador.isAtiveSecao = true;"> Coloca sessão true</p>
        <p id="testeSessao" onclick="controlador.coletaEvento();return false;" >inicia sessao</p>

        <p id="testeSessaoaaa" onclick="controlador.finalizaSecao();">Teste finaliza sessao</p>
        <p id="resposta"></p>
        <h4 id="hahah">h4sasas</h4>
        <h1 id="hahah1">h1sasas</h1>

        <a>aaa</a>

        <form name="form">
            <input type="text" name="cronometro" value="00:00:00" id="testek" />
            <br />
        </form>

        <input type="text" name="teste"  id="teste"/>

        <a href="#">Clique-me</a>

    </body>
</html>