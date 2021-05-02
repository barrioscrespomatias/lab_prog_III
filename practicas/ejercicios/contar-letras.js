"use strict";
var letraExistente = function (str, letra) {
    var retorno = false;
    if (str.length > 0) {
        for (i = 0; i < str.length; i++) {
            if (letra == str[i]) {
                retorno = true;
                break;
            }
        }
    }
    return retorno;
};
var i = 0;
var contador = 0;
var cadena = "AABA";
var letra = "";
var cadenaAuxiliar = "";
var letraExiste;
//Recorro las letras desde la primera
for (i; i < cadena.length; i++) {
    letra = cadena[i];
    letraExiste = letraExistente(cadenaAuxiliar, letra);
    if (letraExiste == false)
        cadenaAuxiliar += letra;
}
console.log(cadenaAuxiliar);
//# sourceMappingURL=contar-letras.js.map