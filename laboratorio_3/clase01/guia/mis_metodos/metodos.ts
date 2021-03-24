export let isLetter:Function = (str:string):boolean=>
{
    let retorno:boolean=false;
    let cantidadStr = str.length;

    //Toma como letras a las que van desde la a hasta la z y las vocales con acento
    //Además con el caracter especial \s tiene en cuenta los espacios.
    //Si pusiera \S no tendría en cuenta los espacios.
    //g: global, es decir que tiene en cuenta a toda la cadena.
    //i: Tiene en cuenta tanto las mayúsculas como las minúsculas

    let letrasIngresadas:RegExpMatchArray|null = str.match(/[A-ZÁ-Ú\s]/gi);
    if (letrasIngresadas != null)
        if (cantidadStr == letrasIngresadas.length)
            retorno = true;

    return retorno;
}

console.log(isLetter("Hoy estoy un tanto autodestructivo"));