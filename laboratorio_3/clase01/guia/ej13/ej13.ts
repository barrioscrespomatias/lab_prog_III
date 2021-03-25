// Numero de Smith:

// 1- Descomponer numero ingresado (factorizar) : array con los números descomprimidos.
// 2- Sumar las cantidades de un término : number con la suma.
// 3- Comparar dos términos.


let factorizar : Function = (numeroIngresado : number ) : Array<number> =>
{
    
    //Auxiliar para no trabajar en la variable retorno.
    let auxiliarString : string = "";
    let numeroaFactorear : number=0;
    let i : number = 1;
    let factoresPrimos : Array<number> =[];    

    //Obtener número entero.
    auxiliarString = numeroIngresado.toString();
    auxiliarString = auxiliarString.split(".",1).toString();

    numeroaFactorear = parseInt(auxiliarString);

    do {
        if (numeroaFactorear / i != numeroaFactorear) 
        {
            if (numeroaFactorear % i == 0) 
            {
                factoresPrimos.push(i)
                numeroaFactorear = numeroaFactorear / i;
                i = 1;
            }
        }
        i++;
    } while (numeroaFactorear > 1);
    console.log(factoresPrimos);

    if (factoresPrimos.length == 0)
        console.log("No se ha podido factorizar");

    return factoresPrimos;
}


let sumaDeTerminos : Function = (listaDeNumeros:Array<number>):number=>
{
    var suma: number = 0;
   
    {
        for (let i = 0; i < listaDeNumeros.length; i++) {
            suma += listaDeNumeros[i];
        }       

    }
   
    
    return suma;
}

let comparaTerminos : Function = (terminoUno:number, terminoDos:number):boolean=>
{
    let retorno : boolean = false;
    if(terminoUno == terminoDos)
        retorno = true;

    return retorno;
}

let covertirArrayNumeros: Function = (numero: number): Array<number> =>
{
    let retorno : Array<number> = Array();
    let numeroToString = numero.toString();
    
    let i:number=0;
    for(i;i<numeroToString.length;i++)
    {
        retorno.push(parseInt(numeroToString[i]));
        console.log(retorno);
    } 

    return retorno;
    
} 


let numero:number = 4;

let factores : Array<number> = Array();
factores = factorizar(numero);

let numeroConvertidoArray: Array<number> = Array();
numeroConvertidoArray = covertirArrayNumeros(numero);

let sumaTerminosDelNumero:number = sumaDeTerminos(numeroConvertidoArray);
let sumaTerminosDelFactoreo:number = sumaDeTerminos(factores);

console.log(comparaTerminos(sumaTerminosDelNumero,sumaTerminosDelFactoreo));


