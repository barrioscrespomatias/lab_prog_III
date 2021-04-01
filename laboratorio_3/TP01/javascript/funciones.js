/* #region  VALIDACIONES */
var AdministrarValidaciones = function () {
    /* #region  DNI */
    console.log("Corroborando que el campo DNI no se encuentre vac\u00EDo");
    if (!ValidarCamposVacios("txtDni")) {
        console.log("Ok...\n");
        var valorDni = parseInt(document.getElementById("txtDni").value);
        console.log("Corroborando que el valor del DNI se encuentre entre los parámetros correctos");
        if (ValidarRangoNumerico(valorDni, 1000000, 55000000))
            console.log("Ok...\n");
        else
            alert("El dni " + valorDni + " se encuentra fuera de los par\u00E1metros correctos: 1.000.000 - 55.000.000");
    }
    else
        alert("Error\nEl campo DNI est\u00E1 vac\u00EDo");
    /* #endregion */
    /* #region  APELLIDO */
    console.log("Corroborando que el campo Apellido no se encuentre vac\u00EDo");
    var apellido = document.getElementById("txtApellido").value;
    if (!ValidarCamposVacios("txtApellido")) {
        console.log("Ok...\n");
        console.log("Corroborando que el campo Apellido contenga solo letras");
        if (!ValidarLetras(apellido))
            alert("Error\nEl campo Apellido no contiene solo letras");
        else
            console.log("Ok...\n");
    }
    else
        alert("Error\nEl campo Apellido est\u00E1 vac\u00EDo");
    /* #endregion */
    /* #region  NOMBRE */
    console.log("Corroborando que el campo Nombre no se encuentre vac\u00EDo");
    var nombre = document.getElementById("txtNombre").value;
    if (!ValidarCamposVacios("txtNombre")) {
        console.log("Ok...\n");
        console.log("Corroborando que el campo Nombre contenga solo letras");
        if (!ValidarLetras(nombre))
            alert("Error\nEl campo Nombre no contiene solo letras");
        else
            console.log("Ok...\n");
    }
    else
        alert("Error\nEl campo Nombre est\u00E1 vac\u00EDo");
    /* #endregion */
    /* #region  LEGAJO */
    console.log("Corroborando que el campo Legajo no se encuentre vac\u00EDo");
    if (!ValidarCamposVacios("txtLegajo")) {
        console.log("Ok...\n");
        var valorLegajo = parseInt(document.getElementById("txtLegajo").value);
        console.log("Corroborando que el valor del Legajo se encuentre entre los parámetros correctos");
        if (ValidarRangoNumerico(valorLegajo, 100, 550))
            console.log("Ok...\n");
        else
            alert("El LEGAJO " + valorLegajo + " se encuentra fuera de los par\u00E1metros correctos: 100 - 550");
    }
    else
        alert("Error\nEl campo Legajo est\u00E1 vac\u00EDo");
    /* #endregion */
    /* #region  SUELDO y TURNO */
    console.log("Corroborando que el campo Sueldo se encuentre vac\u00EDo");
    if (!ValidarCamposVacios("txtSueldo")) {
        console.log("Ok...\n");
        var valorSueldo = parseInt(document.getElementById("txtSueldo").value);
        var valorCboTurno = ObtenerTurnoSeleccionado();
        var sueldoMaximo = ObtenerSueldoMaximo(valorCboTurno);
        console.log("Corroborando que el valor del Sueldo se encuentre entre los parámetros correctos");
        if (ValidarRangoNumerico(valorSueldo, 8000, sueldoMaximo))
            console.log("Ok...\n");
        else
            alert("El SUELDO " + valorSueldo + " se encuentra fuera de los par\u00E1metros correctos segun el turno " + valorCboTurno + ": $8000 - $" + sueldoMaximo);
    }
    else
        alert("Error\nEl campo Sueldo est\u00E1 vac\u00EDo");
    /* #endregion */
    /* #region  SEXO */
    console.log("Corroborando que el campo Sexo sea correcto");
    var valorCombo = document.getElementById("cboSexo").value;
    if (ValidarCombo(valorCombo, "---"))
        console.log("Ok...\n");
    else
        alert("Error\nEl campo Sexo no se ha seleccionado");
    /* #endregion */
    /* #endregion */
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
//Valida que el valor seleccionado del combobox sea distinto de un valor pasado como parámetro
// retorna true si es distinto, sino false
var ValidarCombo = function (valorCombo, valorComboIncorrecto) {
    var retorno = false;
    if (valorCombo != valorComboIncorrecto)
        retorno = true;
    return retorno;
};
var ObtenerTurnoSeleccionado = function () {
    var retorno = "";
    var valorRdio = document.getElementsByName("rdoTurno");
    valorRdio.forEach(function (element) {
        if (element.checked)
            retorno += element.value;
    });
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
            break;
        case "Noche":
            sueldoMaximo = 25000;
            break;
    }
    return sueldoMaximo;
};
///Valida que un string ingresa sea solo letras.
var ValidarLetras = function (str) {
    var retorno = false;
    var cantidadStr = str.length;
    //Toma como letras a las que van desde la a hasta la z y las vocales con acento
    //Además con el caracter especial \s tiene en cuenta los espacios.
    //Si pusiera \S no tendría en cuenta los espacios.
    //g: global, es decir que tiene en cuenta a toda la cadena.
    //i: Tiene en cuenta tanto las mayúsculas como las minúsculas
    var letrasIngresadas = str.match(/[A-ZÁ-Ú\s]/gi);
    if (letrasIngresadas != null)
        if (cantidadStr == letrasIngresadas.length)
            retorno = true;
    return retorno;
};
