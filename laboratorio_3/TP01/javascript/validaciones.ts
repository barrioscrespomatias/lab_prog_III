let AdministrarValidaciones : Function = ():void=>
{

}

// Corrobora que un campo esté vacío.
// Si está vacío retorna true, sino false.
let ValidarCamposVacios: Function = (cadena: string): boolean => 
{
    let retorno: boolean = false;
    let campoStr: string = (<HTMLInputElement>document.getElementById(cadena)).value;
    if (campoStr.length > 0)
        retorno = true;

    return retorno;
}
//Valida un rango numérico. 
// Si el valor ingresado se encuentra dentro de los parámetros esperados
// del mínimo y el máximo, retorna true, sino false.
let ValidarRangoNumerico: Function = (valor:number, minimo:number, maximo:number):boolean=>
{
    let retorno : boolean = false;
    if(valor>=minimo && valor<=maximo && valor != null && valor != NaN)
        retorno = true;

    return retorno;
}

// let ObtenerTurnoSeleccionado : Function = () : string =>
let ObtenerTurnoSeleccionado : Function = () : void =>
{
    let retorno : string ="";
    let valorRdio:any = document.getElementsByName("rdoTurno");
    let i : number = 0;    
    
    for(i; i<valorRdio.length;i++)
    {
        if(valorRdio[i].checked == true)
        {
            retorno+= valorRdio[i].value;
            break;
        }           
        
    }  

    alert(retorno);
    // return retorno;
}