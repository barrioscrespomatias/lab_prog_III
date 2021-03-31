let obtenerValoracion : Function = ():void=>
{
    alert("Ingresa");
    let nombre:string = (<HTMLInputElement>document.getElementById("nombre")).value;
    let valoracion:string = (<HTMLInputElement>document.getElementById("rdo")).value;

    alert(valoracion);
}