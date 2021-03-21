"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.numerosPrimos = void 0;
var numerosPrimos = function (cantidad) {
    var i = 1;
    var contadorNumeros = 0;
    for (i; contadorNumeros < cantidad; i++) {
        if (i % 2 != 0) {
            console.log(i);
            contadorNumeros++;
        }
    }
};
exports.numerosPrimos = numerosPrimos;
// numerosPrimos(20);
//# sourceMappingURL=ej07.js.map