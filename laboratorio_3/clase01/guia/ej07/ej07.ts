export let numerosPrimos:Function =(cantidad:number):void=>
{
    let i:number=1;
    var contadorNumeros:number=0;
    for(i;contadorNumeros<cantidad;i++)
    {
        if(i%2!=0)
        {
            console.log(i);
            contadorNumeros++;
        }              
    }
}

// numerosPrimos(20);