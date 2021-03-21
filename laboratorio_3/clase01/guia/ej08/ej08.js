"use strict";
//FACTORIAL
var factorial = function (numeroIngresado) {
    var retorno = 0;
    var i = numeroIngresado;
    for (i; i > 1; i--) {
        if (i == numeroIngresado) {
            retorno = i * (i - 1);
        }
        else if (i == 2) {
            break;
        }
        else {
            retorno *= (i - 1);
        }
        console.log(retorno);
    }
    return retorno;
};
factorial(5);
//# sourceMappingURL=ej08.js.map