"use strict";
var __createBinding = (this && this.__createBinding) || (Object.create ? (function(o, m, k, k2) {
    if (k2 === undefined) k2 = k;
    Object.defineProperty(o, k2, { enumerable: true, get: function() { return m[k]; } });
}) : (function(o, m, k, k2) {
    if (k2 === undefined) k2 = k;
    o[k2] = m[k];
}));
var __setModuleDefault = (this && this.__setModuleDefault) || (Object.create ? (function(o, v) {
    Object.defineProperty(o, "default", { enumerable: true, value: v });
}) : function(o, v) {
    o["default"] = v;
});
var __importStar = (this && this.__importStar) || function (mod) {
    if (mod && mod.__esModule) return mod;
    var result = {};
    if (mod != null) for (var k in mod) if (k !== "default" && Object.prototype.hasOwnProperty.call(mod, k)) __createBinding(result, mod, k);
    __setModuleDefault(result, mod);
    return result;
};
Object.defineProperty(exports, "__esModule", { value: true });
var mis_metodos = __importStar(require("../mis_metodos/metodos"));
var ej10 = __importStar(require("../ej10/ej10"));
var esPalindromo = function (cadena) {
    var retorno = true;
    var i = 0;
    var cantidad = 0;
    cantidad = cadena.length;
    if (mis_metodos.isLetter(cadena)) {
        cadena = cadena.toUpperCase();
        cadena = ej10.retornaMayusculas(cadena);
        cantidad = cadena.length;
        console.log(cadena);
        for (i; i < cantidad; i++) {
            console.log(cadena[i]);
            console.log(cadena[cantidad - 1]);
            if (cantidad > 0) {
                if (cadena[i] != cadena[cantidad - 1]) {
                    console.log(cadena[i]);
                    console.log(cadena[cantidad - 1]);
                    retorno = false;
                    break;
                }
            }
            cantidad--;
        }
    }
    return retorno;
};
console.log(esPalindromo("La ruta nos aporto otro paso natural"));
//# sourceMappingURL=ej11.js.map