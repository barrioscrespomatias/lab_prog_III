"use strict";
var fecha = "22-07-1990";
var obtenerSigno = function (cadena) {
    var strSalida = "";
    var dia = 0;
    var mes = 0;
    var signos = Array("Capricornio", "Acuario", "Piscis", "Aries", "Tauro", "Géminis", "Cáncer", "Leo", "Virgo", "Libra", "Escorpio", "Sagitario");
    var diaMesAnio = cadena.split("-", 3);
    dia = parseInt(diaMesAnio[0]);
    mes = parseInt(diaMesAnio[1]);
    //20
    if (mes == 2) {
        if (dia < 20)
            mes -= 1;
    }
    //21
    if (mes > 2 && mes < 6 || mes == 1) {
        if (dia < 21)
            mes -= 1;
    }
    //22
    else if (mes == 6 || mes == 12) {
        if (dia < 22)
            mes -= 1;
    }
    //23
    else if (mes == 7 || mes > 8 && mes < 12) {
        if (dia < 23)
            mes -= 1;
    }
    //24
    else if (mes == 8) {
        if (dia < 24)
            mes -= 1;
    }
    strSalida = signos[mes];
    return strSalida;
};
console.log("Sos de " + obtenerSigno(fecha));
//# sourceMappingURL=ej12.js.map