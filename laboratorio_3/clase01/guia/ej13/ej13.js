"use strict";
// Numero de Smith:
// 1- Descomponer numero ingresado (factorizar) : array con los números descomprimidos.
// 2- Sumar las cantidades de un término : number con la suma.
// 3- Comparar dos términos.
var factorizar = function (numeroIngresado) {
    //Auxiliar para no trabajar en la variable retorno.
    var auxiliarString = Array();
    var i = 1;
    do {
        if (numeroIngresado / i != numeroIngresado) {
            if (numeroIngresado % i == 0) {
                auxiliarString.push(i.toString());
                numeroIngresado /= i;
                i = 1;
            }
        }
        i++;
    } while (numeroIngresado > 1);
    if (auxiliarString.length < 2)
        //esto no me gusta ni un poquito.
        auxiliarString = [];
    return auxiliarString;
};
var sumaDeTerminos = function (numeroStr) {
    var suma = 0;
    for (var i = 0; i < numeroStr.length; i++) {
        suma += parseInt(numeroStr[i]);
    }
    return suma;
};
var comparaTerminos = function (terminoUno, terminoDos) {
    var retorno = false;
    if (terminoUno === terminoDos)
        retorno = true;
    return retorno;
};
// factoriza y obtiene la descomposición en forma de array<string>.
// El proble está en que al devolver el numero factorizado de 22
// da 2 dos numeros. 2 y 11. Entonces al querer sumar 2+11=13 != 2+2 = 4 
// Deberia poder descomponer nuevamente el segundo numero (11) así la suma da 
// como resultado el numero 4 = 2+1+1 que es igual a 2+2 = 4
var numero = 13;
console.log(factorizar(numero));
// for (numero; contador < 10; numero++) {    
// let sumaTerminosFactorizado: number = sumaDeTerminos(strFactorizado);
// let sumaTerminosOriginal: number = sumaDeTerminos(numero.toString());
// // if (comparaTerminos(sumaTerminosFactorizado, sumaTerminosOriginal)) {
// //     console.log(numero);
// //     contador++;
// // }
// console.log(comparaTerminos(sumaTerminosFactorizado, sumaTerminosOriginal));
// }
//# sourceMappingURL=ej13.js.map