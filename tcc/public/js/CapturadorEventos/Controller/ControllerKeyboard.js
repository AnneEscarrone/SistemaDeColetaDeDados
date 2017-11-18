function ControllerKeyboard() {
    var pressTeclaCapsLock = false, pressTeclaInsert = false, pressTeclaShift = false;
    this.verificaTeclaPressionada = function (e, evento) {

        var teclado = {
            'backspace': 8, "tab": 9, 'enter': 13, 'shift': 16, 'crtl': 17, 'alt': 18, 'pause/break': 19, 'capsLock': 20,
            'escape': 27, 'page up': 33, 'page down': 34, 'end': 35, 'home': 36, 'left arrow': 37, 'up arrow': 38, 'right arrow': 39, 'down arrow': 40
            , 'insert': 45, 'delete': 46, 0: 48, 1: 49, 2: 50, 3: 51, 4: 52, 5: 53, 6: 54, 7: 55, 8: 56, 9: 57, 'a': 65, 'b': 66, 'c': 67, 'd': 68,
            'e': 69, 'f': 70, 'g': 71, 'h': 72, 'i': 73, 'j': 74, 'k': 75, 'l': 76, 'm': 77, 'n': 78, 'o': 79, 'p': 80, 'q': 81, 'r': 82, 's': 83
            , 't': 84, 'u': 85, 'v': 86, 'w': 87, 'x': 88, 'y': 89, 'z': 90, 'left window key': 91, 'right window key': 92, 'select key': 93,
            'numpad 0': 96, 'numpad 1': 97, 'numpad 2': 98, 'numpad 3': 99, 'numpad 4': 100, 'numpad 5': 101, 'numpad 6': 102, 'numpad 7': 103,
            'numpad 8': 104, 'numpad 9': 105, 'multiply': 106, 'soma': 107, '.': 108, 'subtract': 109, 'decimal point': 110, 'divide': 111,
            'f1': 112, 'f2': 113, 'f3': 114, 'f4': 115, 'f5': 116, 'f6': 117, 'f7': 118, 'f8': 119, 'f9': 120, 'f10': 121, 'f11': 122, 'f12': 123,
            'num lock': 144, 'scroll lock': 145, 'semi-colon': 186, 'equal sign': 187, 'comma': 188, 'dash': 189, 'period': 190, 'forward slash': 191,
            'grave accent': 192, 'open bracket': 219, 'back slash': 220, 'close braket': 221, 'single quote': 222
        };
        for (var code in teclado) {

            if (e.keyCode === teclado[code]) {
                //control+alt, insert true                
                if (e.keyCode === 20) {
                    pressTeclaCapsLock = true;
                    console.log("caps");
                } else if (e.keyCode === 45) {
                    pressTeclaInsert = true;
                    console.log("insert");
                } else if (e.keyCode === 16) {
                    pressTeclaShift = true;
                    console.log("shift");
                }
                if (pressTeclaCapsLock === true) {
                    console.log("entrou capslock");
                    switch (e.keyCode) {
                        case 84:
                            console.log("capsLock+t");
                            evento.teclado.keyCode = 0;
                            evento.teclado.tecla = "capsLock+t";
                            pressTeclaCapsLock = false;
                            break;
                        case 66:
                            console.log("capslock+b");
                            evento.teclado.keyCode = 0;
                            evento.teclado.tecla = "capsLock+b";
                            pressTeclaCapsLock = false;
                            break;
                        case 9:
                            console.log("capsLock+tab");
                            evento.teclado.keyCode = 0;
                            evento.teclado.tecla = "capsLock+tab";
                            pressTeclaCapsLock = false;
                            break;
                    }
                } else if (pressTeclaInsert === true) {
                    switch (e.keyCode) {
                        case 84:
                            console.log("insert+t");
                            evento.teclado.keyCode = 0;
                            evento.teclado.tecla = "insert+t";
                            pressTeclaInsert = false;
                            break;
                        case 66:
                            console.log("insert+b");
                            evento.teclado.keyCode = 0;
                            evento.teclado.tecla = "insert+b";
                            pressTeclaInsert = false;
                            break;
                        case 9:
                            console.log("insert+tab");
                            evento.teclado.keyCode = 0;
                            evento.teclado.tecla = "insert+tab";
                            pressTeclaInsert = false;
                            break;
                    }
                } else if (pressTeclaShift === true) {
                    if (e.keyCode === 9) {
                        evento.teclado.keyCode = 0;
                        evento.teclado.tecla = "shift+tab";
                        pressTeclaShift = false;
                        console.log("shift+tab");
                    }
                } else if (evento.teclado.keyCode === undefined) {                    
                    evento.teclado.keyCode = e.keyCode;
                    evento.teclado.tecla = code;
                }
            }
        }

    };

}


