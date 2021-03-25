"use strict";
// Numero de Smith:
// 1- Descomponer numero ingresado (factorizar) : array con los números descomprimidos.
// 2- Sumar las cantidades de un término : number con la suma.
// 3- Comparar dos términos.
var factorizar = function (numeroIngresado) {
    //Auxiliar para no trabajar en la variable retorno.
    var auxiliarString = "";
    var numeroaFactorear = 0;
    var i = 1;
    var factoresPrimos = [];
    //Obtener número entero.
    auxiliarString = numeroIngresado.toString();
    auxiliarString = auxiliarString.split(".", 1).toString();
    numeroaFactorear = parseInt(auxiliarString);
    do {
        if (numeroaFactorear / i != numeroaFactorear) {
            if (numeroaFactorear % i == 0) {
                factoresPrimos.push(i);
                numeroaFactorear = numeroaFactorear / i;
                i = 1;
            }
        }
        i++;
    } while (numeroaFactorear > 1);
    console.log(factoresPrimos);
    if (factoresPrimos.length == 0)
        console.log("No se ha podido factorizar");
    return factoresPrimos;
};
var sumaDeTerminos = function (listaDeNumeros) {
    var suma = 0;
    {
        for (var i = 0; i < listaDeNumeros.length; i++) {
            suma += listaDeNumeros[i];
        }
    }
    return suma;
};
var comparaTerminos = function (terminoUno, terminoDos) {
    var retorno = false;
    if (terminoUno == terminoDos)
        retorno = true;
    return retorno;
};
var covertirArrayNumeros = function (numero) {
    var retorno = Array();
    var numeroToString = numero.toString();
    var i = 0;
    for (i; i < numeroToString.length; i++) {
        retorno.push(parseInt(numeroToString[i]));
        console.log(retorno);
    }
    return retorno;
};
var numero = 4;
var factores = Array();
factores = factorizar(numero);
var numeroConvertidoArray = Array();
numeroConvertidoArray = covertirArrayNumeros(numero);
var sumaTerminosDelNumero = sumaDeTerminos(numeroConvertidoArray);
var sumaTerminosDelFactoreo = sumaDeTerminos(factores);
console.log(comparaTerminos(sumaTerminosDelNumero, sumaTerminosDelFactoreo));
//# sourceMappingURL=ej13.js.map