"use strict";
//FACTORIAL
Object.defineProperty(exports, "__esModule", { value: true });
exports.factorial = void 0;
var factorial = function (numeroIngresado) {
    var retorno = 0;
    var i = numeroIngresado;
    for (i; i > 1; i--) {
        if (i == numeroIngresado) {
            retorno = i * (i - 1);
        }
        ///Se rompe en i=2 ya que sino muestra dos veces el último valor.
        //Se trabaja con la resta de la variable i. El valor local de i va a ser
        //menor que el valor de iteracion en el bucle for.
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
exports.factorial = factorial;
// factorial(5);
//# sourceMappingURL=ej08.js.map