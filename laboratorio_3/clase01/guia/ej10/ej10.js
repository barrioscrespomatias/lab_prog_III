"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.retornaMayusculas = exports.buscaMayusculas = void 0;
var cadena = "ááá´ÁBB";
var buscaMayusculas = function (cadena) {
    var retorno = 0;
    var letras = cadena.match(/[A-ZÁ-Ú]/g);
    if ((letras === null || letras === void 0 ? void 0 : letras.length) != undefined)
        retorno = letras.length;
    return retorno;
};
exports.buscaMayusculas = buscaMayusculas;
var retornaMayusculas = function (cadena) {
    var retorno = "";
    var letras = cadena.match(/[A-ZÁ-Ú]/g);
    if (letras != null)
        retorno = letras.toString();
    return retorno;
};
exports.retornaMayusculas = retornaMayusculas;
var buscaMinusculas = function (cadena) {
    var retorno = 0;
    var letras = cadena.match(/[a-zá-ú]/g);
    if ((letras === null || letras === void 0 ? void 0 : letras.length) != undefined)
        retorno = letras.length;
    return retorno;
};
var analizaMinusculasMayusculas = function (cadena) {
    var cantidadMayusculas = exports.buscaMayusculas(cadena);
    var cantidadMinusculas = buscaMinusculas(cadena);
    var strSalida = "";
    if (cantidadMayusculas > cantidadMinusculas && cantidadMinusculas == 0)
        strSalida += "Todas las letras son MAYUSCULAS";
    else if (cantidadMayusculas > cantidadMinusculas && cantidadMinusculas != 0)
        strSalida += "La mayor\u00EDa de las letras son MAYUSCULAS";
    else if (cantidadMayusculas == cantidadMinusculas)
        strSalida += "Hay la misma cantidad de may\u00FAsculas que min\u00FAsculas";
    else if (cantidadMinusculas > cantidadMayusculas && cantidadMayusculas == 0)
        strSalida += "Todas las letras son min\u00FAsculas";
    else
        strSalida += "La mayor\u00EDa de las letras son min\u00FAsculas";
    return strSalida;
};
// console.log(`Cantidad de mayúsculas: ${buscaMayusculas(cadena)}.`);
// console.log(`Cantidad de minusculas: ${buscaMinusculas(cadena)}.`);
// console.log(analizaMinusculasMayusculas(cadena));
//# sourceMappingURL=ej10.js.map