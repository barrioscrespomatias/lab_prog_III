"use strict";
var AdministrarValidaciones = function () {
    console.log("Corroborando que el campo DNI se encuentre vac\u00EDo");
    if (ValidarCamposVacios("txtDni"))
        console.log("Ok...\n");
    else
        console.log("Error!!\n");
    console.log("Corroborando que el campo Apellido se encuentre vac\u00EDo");
    if (ValidarCamposVacios("txtApellido"))
        console.log("Ok...\n");
    else
        console.log("Error!!\n");
    console.log("Corroborando que el campo Nombre se encuentre vac\u00EDo");
    if (ValidarCamposVacios("txtNombre"))
        console.log("Ok...\n");
    else
        console.log("Error!!\n");
    console.log("Corroborando que el campo Legajo se encuentre vac\u00EDo");
    if (ValidarCamposVacios("txtLegajo"))
        console.log("Ok...\n");
    else
        console.log("Error!!\n");
    console.log("Corroborando que el campo Sueldo se encuentre vac\u00EDo");
    if (ValidarCamposVacios("txtSueldo"))
        console.log("Ok...\n");
    else
        console.log("Error!!\n");
};
// Corrobora que un campo esté vacío.
// Si está vacío retorna true, sino false.
var ValidarCamposVacios = function (cadena) {
    var retorno = false;
    var campoStr = document.getElementById(cadena).value;
    if (campoStr.length == 0)
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
    // alert(retorno);
    return retorno;
};
var ObtenerSueldoMaximo = function (turno) {
    var sueldoMaximo = 0;
    switch (turno) {
        case "Mañana":
            sueldoMaximo = 20000;
            break;
        case "Tarde":
            sueldoMaximo = 18500;
        default:
            sueldoMaximo = 25000;
            break;
    }
    return sueldoMaximo;
};
//# sourceMappingURL=validaciones.js.map