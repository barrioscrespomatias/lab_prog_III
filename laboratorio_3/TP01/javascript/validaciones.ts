let AdministrarValidaciones : Function = ():void=>
{
    console.log(`Corroborando que el campo DNI se encuentre vacío`);
    if(ValidarCamposVacios("txtDni"))
    console.log(`Ok...\n`);
    else
    console.log(`Error!!\n`);

    console.log(`Corroborando que el campo Apellido se encuentre vacío`);
    if(ValidarCamposVacios("txtApellido"))
    console.log(`Ok...\n`);
    else
    console.log(`Error!!\n`);

    console.log(`Corroborando que el campo Nombre se encuentre vacío`);
    if(ValidarCamposVacios("txtNombre"))
    console.log(`Ok...\n`);
    else
    console.log(`Error!!\n`);
    

    console.log(`Corroborando que el campo Legajo se encuentre vacío`);
    if(ValidarCamposVacios("txtLegajo"))
    console.log(`Ok...\n`);
    else
    console.log(`Error!!\n`);    
    
    console.log(`Corroborando que el campo Sueldo se encuentre vacío`);
    if(ValidarCamposVacios("txtSueldo"))
    console.log(`Ok...\n`);
    else
    console.log(`Error!!\n`);
}

// Corrobora que un campo esté vacío.
// Si está vacío retorna true, sino false.
let ValidarCamposVacios: Function = (cadena: string): boolean => 
{
    let retorno: boolean = false;
    let campoStr: string = (<HTMLInputElement>document.getElementById(cadena)).value;
    if (campoStr.length==0)
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

let ObtenerTurnoSeleccionado : Function = () : string =>
// let ObtenerTurnoSeleccionado : Function = () : void =>
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

    // alert(retorno);
    return retorno;
}

let ObtenerSueldoMaximo: Function = (turno: string): number =>
{
    let sueldoMaximo:number = 0;
    switch(turno)
    {
        case "Mañana":
            sueldoMaximo = 20000;
            break;
        case "Tarde":
            sueldoMaximo=18500;
        default:
            sueldoMaximo=25000;
            break;
    }
    return sueldoMaximo;
}