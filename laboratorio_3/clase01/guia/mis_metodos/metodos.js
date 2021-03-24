"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.isLetter = void 0;
var isLetter = function (str) {
    var retorno = false;
    var cantidadStr = str.length;
    //Toma como letras a las que van desde la a hasta la z y las vocales con acento
    //Además con el caracter especial \s tiene en cuenta los espacios.
    //Si pusiera \S no tendría en cuenta los espacios.
    //g: global, es decir que tiene en cuenta a toda la cadena.
    //i: Tiene en cuenta tanto las mayúsculas como las minúsculas
    var letrasIngresadas = str.match(/[A-ZÁ-Ú\s]/gi);
    if (letrasIngresadas != null)
        if (cantidadStr == letrasIngresadas.length)
            retorno = true;
    return retorno;
};
exports.isLetter = isLetter;
console.log(exports.isLetter("Hoy estoy un tanto autodestructivo"));
//# sourceMappingURL=metodos.js.map