"use strict";
var mostrarPeliculas = function () {
    var strRetorno = "";
    var opcionUno = document.getElementById("chB1").checked;
    var opcionDos = document.getElementById("chB2").checked;
    var opcionTres = document.getElementById("chB3").checked;
    var opcionCuatro = document.getElementById("chB4").checked;
    var opcionCinco = document.getElementById("chB5").checked;
    var opcionSeis = document.getElementById("chB6").checked;
    var i = 1;
    var opciones = Array();
    opciones.push(opcionUno);
    opciones.push(opcionDos);
    opciones.push(opcionTres);
    opciones.push(opcionCuatro);
    opciones.push(opcionCinco);
    opciones.push(opcionSeis);
    opciones.forEach(function (element) {
        if (element == true) {
            // alert("Se ha elegido la película numero "+i);
            console.log("Se ha elegido la película numero " + i);
        }
        i++;
    });
};
//# sourceMappingURL=ej17.js.map