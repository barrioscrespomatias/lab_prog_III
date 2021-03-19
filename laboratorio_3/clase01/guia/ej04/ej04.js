"use strict";
var parImpar = function (numero) {
    var str = "El numero es " + numero + " y es ";
    var esPar = false;
    if (numero % 2 == 0)
        str += "par.";
    else
        str += "impar.";
    return str;
};
console.log(parImpar(4));
//# sourceMappingURL=ej04.js.map