function ControllerElement() {
    
    this.informacaoElemento = function (posicaoTop, posicaoLeft, tipo, url, id) {
        var elemento = new Element();
        elemento.posicaoTop = posicaoTop;
        elemento.posicaoLeft = posicaoLeft;
        elemento.tipo = tipo;
        elemento.url = url;
        elemento.focus = true;
        var texto = document.getElementById(id).value;
        if (texto !== null && texto !== '' && texto !== undefined) {
            elemento.texto = document.getElementById(id).value;
        } else {
            elemento.texto = " ";
        }
        if (id !== null && id !== '' && id !== undefined) {
            elemento.id = id;
        } else {
            elemento.id = null;
        }
        return elemento;
    };
}