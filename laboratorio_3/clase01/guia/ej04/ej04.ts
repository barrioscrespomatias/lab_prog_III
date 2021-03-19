let parImpar:Function=(numero:number):string=>
{
    let str:string=`El numero es ${numero} y es `;
    let esPar:boolean=false;

    if (numero % 2 == 0)
        str += `par.`;

    else
        str += `impar.`;    

    return str;
}


console.log(parImpar(4));