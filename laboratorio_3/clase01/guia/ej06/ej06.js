"use strict";
var elCuboDeUnNumero = function (numero) {
    var retorno = 0;
    if (numero != null)
        retorno = numero * numero;
    else
        console.log("Debe ingresar un n\u00FAmero!");
    return retorno;
};
var mostrarCubo = function (numero) {
    var numeroStr = String(elCuboDeUnNumero(numero));
    return numeroStr;
};
console.log(mostrarCubo(10));
console.log(typeof (mostrarCubo(11)));
//# sourceMappingURL=ej06.js.map