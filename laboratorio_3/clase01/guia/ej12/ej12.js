"use strict";
var fecha = "22-07-1990";
var obtenerSigno = function (cadena) {
    var strSalida = "";
    var dia = 0;
    var mes = 0;
    var anio = 0;
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
    /* #region  CODIGO FEO */
    //Resolución con muchos if else.
    // if(fechaDate.getMonth() == 0)//enero
    // {
    //     if(fechaDate.getDate()>0 && fechaDate.getDate()<=20)
    //     strSalida = "Capricornio";
    //     else 
    //     strSalida = "Acuario";        
    // }
    // else if(fechaDate.getMonth() == 1)//febrero
    // {
    //     if(fechaDate.getDate()>0 && fechaDate.getDate()<=19)
    //     strSalida = "Acuario";
    //     else
    //     strSalida = "Piscis";
    // }
    // else if(fechaDate.getMonth() == 2)//marzo
    // {
    //     if(fechaDate.getDate()>0 && fechaDate.getDate()<=20)
    //     strSalida = "Piscis";
    //     else
    //     strSalida = "Aries";
    // }
    // else if(fechaDate.getMonth() == 3)//Abril
    // {
    //     if(fechaDate.getDate()>0 && fechaDate.getDate()<=20)
    //     strSalida = "Aries";
    //     else
    //     strSalida = "Tauro";
    // }
    // else if(fechaDate.getMonth() == 4)//Mayo
    // {
    //     if(fechaDate.getDate()>0 && fechaDate.getDate()<=20)
    //     strSalida = "Tauro";
    //     else
    //     strSalida = "Géminis";
    // }
    // else if(fechaDate.getMonth() == 5)//Junio
    // {
    //     if(fechaDate.getDate()>0 && fechaDate.getDate()<=21)
    //     strSalida = "Géminis";
    //     else
    //     strSalida = "Cáncer";
    // }
    // else if(fechaDate.getMonth() == 6)//Julio
    // {
    //     if(fechaDate.getDate()>0 && fechaDate.getDate()<=22)
    //     strSalida = "Cáncer";
    //     else
    //     strSalida = "Leo";
    // }
    // else if(fechaDate.getMonth() == 7)//Agosto
    // {
    //     if(fechaDate.getDate()>0 && fechaDate.getDate()<=23)
    //     strSalida = "Leo";
    //     else
    //     strSalida = "Virgo";
    // }
    // else if(fechaDate.getMonth() == 8)//Septiembre
    // {
    //     if(fechaDate.getDate()>0 && fechaDate.getDate()<=22)
    //     strSalida = "Virgo";
    //     else
    //     strSalida = "Libra";
    // }
    // else if(fechaDate.getMonth() == 9)//Octubre
    // {
    //     if(fechaDate.getDate()>0 && fechaDate.getDate()<=22)
    //     strSalida = "Libra";
    //     else
    //     strSalida = "Escorpio";
    // }
    // else if(fechaDate.getMonth() == 10)//Noviembre
    // {
    //     if(fechaDate.getDate()>0 && fechaDate.getDate()<=22)
    //     strSalida = "Escorpio";
    //     else
    //     strSalida = "Sagitario";
    // }
    // else if(fechaDate.getMonth() == 11)//Diciembre
    // {
    //     if(fechaDate.getDate()>0 && fechaDate.getDate()<=21)
    //     strSalida = "Sagitario";
    //     else
    //     strSalida = "Capricornio";
    // }
    /* #endregion */
    return strSalida;
};
console.log("Sos de " + obtenerSigno(fecha));
//# sourceMappingURL=ej12.js.map