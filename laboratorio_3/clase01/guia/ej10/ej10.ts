var cadena:string = "ááá´ÁBB";

export var buscaMayusculas: Function = (cadena: string): number => {
    let retorno: number = 0;
    let letras: RegExpMatchArray | null = cadena.match(/[A-ZÁ-Ú]/g);
    if (letras?.length != undefined)
        retorno = letras.length;

    return retorno;
}

export var retornaMayusculasSinEspacio: Function = (cadena: string): string => {
    let retorno: string = "";
    let letras: RegExpMatchArray | null = cadena.match(/[A-ZÁ-Ú]/g);

    if(letras!=null)
        retorno= letras.toString();
    
    return retorno;

    
}

var buscaMinusculas: Function = (cadena: string): number => {
    let retorno: number = 0;
    let letras: RegExpMatchArray | null = cadena.match(/[a-zá-ú]/g);
    if (letras?.length != undefined)
        retorno = letras.length;

    return retorno;
}

var analizaMinusculasMayusculas : Function = (cadena:string):string=>
{    
    let cantidadMayusculas : number = buscaMayusculas(cadena);
    let cantidadMinusculas :number = buscaMinusculas(cadena);
    let strSalida:string="";

    if (cantidadMayusculas > cantidadMinusculas && cantidadMinusculas == 0)
        strSalida += `Todas las letras son MAYUSCULAS`;
    else if (cantidadMayusculas > cantidadMinusculas && cantidadMinusculas != 0)
        strSalida += `La mayoría de las letras son MAYUSCULAS`;
    else if (cantidadMayusculas == cantidadMinusculas)
        strSalida += `Hay la misma cantidad de mayúsculas que minúsculas`;
    else if (cantidadMinusculas > cantidadMayusculas && cantidadMayusculas == 0)
        strSalida += `Todas las letras son minúsculas`;
    else
        strSalida += `La mayoría de las letras son minúsculas`;

    return strSalida;

}

// console.log(`Cantidad de mayúsculas: ${buscaMayusculas(cadena)}.`);
// console.log(`Cantidad de minusculas: ${buscaMinusculas(cadena)}.`);
// console.log(analizaMinusculasMayusculas(cadena));
