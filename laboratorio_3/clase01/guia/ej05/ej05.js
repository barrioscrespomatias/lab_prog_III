"use strict";
var nombre = "BENITO";
var apellido = "FERNANDEZ";
var nombreApellido = function (nombre, apellido) {
    var contador = 0;
    var nombreMinuscula = "";
    for (var _i = 0, nombre_1 = nombre; _i < nombre_1.length; _i++) {
        var iterator = nombre_1[_i];
        if (contador > 0 && contador < nombre.length) {
            nombreMinuscula += nombre[contador];
        }
        contador++;
    }
    var str = "";
    if (nombre && apellido) {
        str += apellido.toUpperCase() + ", " + nombre[0].toUpperCase() + nombreMinuscula.toLocaleLowerCase() + ".";
    }
    console.log(str);
};
nombreApellido(nombre, apellido);
//# sourceMappingURL=ej05.js.map