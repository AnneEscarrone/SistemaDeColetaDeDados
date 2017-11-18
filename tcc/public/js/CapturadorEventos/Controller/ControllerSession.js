function ControllerSession() {
    var controllerTeclado = new ControllerKeyboard();
    var controllerElemento = new ControllerElement();
    var controllerMouse = new ControllerMouse();
    this.sessao = new Session();
    this.isAtiveSecao = false;
    var pressiona = false;
    data = new Date();
   
    this.formataHoraSessao = function (hora) {
        var minutos;
        var segundos;
        if (hora.getMinutes() < 10) {
            minutos = "0" + hora.getMinutes();
        } else {
            minutos = hora.getMinutes();
        }
        if (hora.getSeconds() < 10) {
            segundos = "0" + hora.getSeconds();
        } else {
            segundos = hora.getSeconds();
        }
        return hora.getHours() + ":" + minutos + ":" + segundos;
    };
    this.coletaEvento = function () {
        if (this.isAtiveSecao !== true) {
            sessao.data = data.toISOString().substring(0, 10);
            sessao.inicio = this.formataHoraSessao(data);
            this.isAtiveSecao = true;
        }
        var url_atual = window.location.href;
        var elemento = null;
        if (elemento !== null) {
            var evento = new Evento();
        }
        var coordenadasMouse = new CoordenadasMouse();
        $("html").mousemove(function (mouse) {
            coordenadasMouse.posicaox = mouse.pageX;
            coordenadasMouse.posicaoy = mouse.pageY;           
            coordenadasMouse = new CoordenadasMouse();
            sessao.coordenadasMouse.push(coordenadasMouse);
        });
        var cont = true;
        segundos = 0;

        $(document).ready(function () {
            console.log("pegando informação");
            var tipo = ["img", "button", "h1", "h2", "h3", "h4", "p", "span", "label", "input", "small", "a"];
            var i;
            for (i in tipo) {
                //quando clica sobre um elemento                        
                var intervalo;
                var segundos;
                $(tipo[i]).mousedown(function () {
                    evento = new Event();
                    segundos = 0;
                    intervalo = setInterval(function () {
                        segundos += 1;
                    }, 1000);
                });
                $(tipo[i]).mouseup(function () {
                    clearInterval(intervalo);
                    evento.duracao = 0;
                    evento.duracao = segundos;
                });
                $(tipo[i]).click(function (e) {
                    var id = $(this).attr("id");
                    console.log(id);
                    if (!id.match('link')) {
                        elemento = controllerElemento.informacaoElemento($(this).offset().top, $(this).offset().left,
                                $("#" + $(this).attr("id")).get(0).nodeName, url_atual, $(this).attr("id"));
                        evento.elemento = elemento;

                        botaoMouse = controllerMouse.verificarBotaoMouse(event);
                        evento.mouse.posicaoTop = e.pageX;
                        evento.mouse.posicaoLeft = e.pageY;
                        evento.mouse.botao = botaoMouse;
                        evento.url = url_atual;
                        sessao.eventos.push(evento);
                        evento = new Event();
                    }
                });
                $(tipo[i]).keydown(function (e) {
                    pressiona = true;
                    var id = $(this).attr("id");
                    evento = new Event();
                    controllerTeclado.verificaTeclaPressionada(e, evento);
                    if (!id.match('link')) {
                        elemento = controllerElemento.informacaoElemento($(this).offset().top, $(this).offset().left,
                                $("#" + $(this).attr("id")).get(0).nodeName, url_atual, $(this).attr("id"));
                        if (cont === true) {
                            intervalo = setInterval(function () {
                                segundos += 1;
                            }, 1000);
                            cont = false;
                        }
                        evento.elemento = elemento;
                    }
                });
                $(tipo[i]).keyup(function () {
                    if (pressiona === true) {
                        cont = true;
                        segundos = 0;
                        clearInterval(intervalo);
                        evento.duracao = 0;
                        evento.duracao = segundos;
                        evento.url = url_atual;
                        sessao.eventos.push(evento);
                        evento = new Event();
                        pressiona = false;
                    }
                });
            }
            pressionaAtalho = false;
            $(document).keydown(function (e) {
                if (pressiona === false) {
                    pressionaAtalho = true;
                    evento = new Event();
                    controllerTeclado.verificaTeclaPressionada(e, evento);
                    evento.duracao = 0;
                    evento.url = url_atual;
                }
            });
            $(document).keyup(function () {
                if (pressionaAtalho === true) {
                    sessao.eventos.push(evento);
                    evento = new Event();
                    pressionaAtalho = false;
                }
            });

        });
    };
    this.finalizaSecao = function () {
        if (this.isAtiveSecao === true) {
            sessao.fim = null;
        } else {
            var fimSessao = new Date();
            sessao.fim = this.formataHoraSessao(fimSessao);
        }
        this.armazenaSecao(sessao);

    };
    this.armazenaSecao = function (sessao) {
        console.log('objSalvo: ', JSON.stringify(sessao));
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/controllerSession',
            type: 'post',
            data: {
                'sessao': JSON.stringify(sessao)
            }

        }).done(function (data) {
        });
    };
}

var controlador = new ControllerSession();