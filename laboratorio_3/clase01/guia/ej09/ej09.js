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
var ej07 = __importStar(require("../ej07/ej07.js"));
var ej08 = __importStar(require("../ej08/ej08.js"));
var factorialCubo = function (numero) {
    var retorno = 0;
    if (numero != null) {
        if (numero > 0)
            retorno = ej08.factorial(numero);
        else
            retorno = ej07.numerosPrimos(numero * -1);
    }
    if (retorno > 0)
        console.log(retorno);
};
factorialCubo(5);
//# sourceMappingURL=ej09.js.map