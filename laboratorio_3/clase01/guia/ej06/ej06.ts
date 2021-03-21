let elCuboDeUnNumero:Function = (numero:number):number=>
{
    let retorno:number=0;
    if(numero!=null)
    retorno=numero*numero;
    else
    console.log(`Debe ingresar un número!`);

    return retorno;
}

//CASTEO A STRING
let mostrarCubo:Function = (numero:number):string=>{
    let numeroStr:string = String(elCuboDeUnNumero(numero));
    return numeroStr;
}

console.log(mostrarCubo(10));
console.log(typeof(mostrarCubo(11)));


