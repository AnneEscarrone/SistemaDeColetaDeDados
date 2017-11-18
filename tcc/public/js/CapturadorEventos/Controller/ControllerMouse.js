function ControllerMouse() {

    this.verificarBotaoMouse = function (event) {
        switch (event.which) {
            case 1:
                return "esquerdo";
                break;
            case 2:
                return "meio";
                break;
            case 3:
                return "direito";
                break;
        }
    };

}

