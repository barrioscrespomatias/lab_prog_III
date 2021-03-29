"use strict";
var AdministrarValidaciones = function () {
};
// Corrobora que un campo esté vacío.
// Si está vacío retorna true, sino false.
var ValidarCamposVacios = function (cadena) {
    var retorno = false;
    var campoStr = document.getElementById(cadena).value;
    if (campoStr.length > 0)
        retorno = true;
    return retorno;
};
//Valida un rango numérico. 
// Si el valor ingresado se encuentra dentro de los parámetros esperados
// del mínimo y el máximo, retorna true, sino false.
var ValidarRangoNumerico = function (valor, minimo, maximo) {
    var retorno = false;
    if (valor >= minimo && valor <= maximo && valor != null && valor != NaN)
        retorno = true;
    return retorno;
};
// let ObtenerTurnoSeleccionado : Function = () : string =>
var ObtenerTurnoSeleccionado = function () {
    var retorno = "";
    var valorRdio = document.getElementsByName("rdoTurno");
    var i = 0;
    for (i; i < valorRdio.length; i++) {
        if (valorRdio[i].checked == true) {
            retorno += valorRdio[i].value;
            break;
        }
    }
    alert(retorno);
    // return retorno;
};
//# sourceMappingURL=validaciones.js.map