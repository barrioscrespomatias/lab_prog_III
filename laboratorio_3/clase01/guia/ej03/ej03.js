"use strict";
var myFunction = function (requerido, opcional) {
    var retorno = requerido;
    if (opcional) {
        for (var i = 0; i < requerido; i++) {
            console.log(opcional);
        }
    }
    else {
        retorno = requerido * -1;
        console.log(retorno);
    }
    return retorno;
};
myFunction(10, "Gato");
//# sourceMappingURL=ej03.js.map