let fecha: string = "22-08-1990";

let obtenerSigno: Function = (cadena: string): string => {
    
    let strSalida: string = "";
    let dia: number = 0;
    let mes: number = 0;
    let anio: number = 0;
    let fechaDate;

    let signos = Array
        (
            "Capricornio",
            "Acuario",
            "Piscis",
            "Aries",
            "Tauro",
            "Géminis",
            "Cáncer",
            "Leo",
            "Virgo",
            "Libra",
            "Escorpio",
            "Sagitario",
        );

    let diaMesAnio = cadena.split("-", 3);

    dia = parseInt(diaMesAnio[0]);
    mes = parseInt(diaMesAnio[1]);
    anio = parseInt(diaMesAnio[2]);

    //Resolución simple -> NO ES EFECTIVA.
    //21
    if (mes > 1 && mes < 5 && mes == 0) {
        if (dia < 21)
            strSalida = signos[mes - 1];
        else
            strSalida = signos[mes];
    }
    //22
    else if (mes == 5 || mes == 11) {
        if (dia < 22)
            strSalida = signos[mes - 1];
        else
            strSalida = signos[mes];
    }
    //23
    else if (mes == 6 || mes > 7 && mes < 11) {
        if (dia < 23)
            strSalida = signos[mes - 1];
        else
            strSalida = signos[mes];
    }
    //24
    else if (mes == 7) {
        if (dia < 24)
            strSalida = signos[mes - 1];
        else
            strSalida = signos[mes];
    }
    else 
    {
        if (dia < 20)
            strSalida = signos[mes - 1];
        else
            strSalida = signos[mes];
    }

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
}

console.log("Sos de " + obtenerSigno(fecha));