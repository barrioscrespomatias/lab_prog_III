
let nombre:string="BENITO";
let apellido:string="FERNANDEZ";

let nombreApellido:Function = (nombre:string,apellido:string):void=>
{
    var contador=0;
    var nombreMinuscula:string="";
    for (let iterator of nombre)
    {
        if(contador>0&&contador<nombre.length)
        {
            nombreMinuscula+=nombre[contador];
        }
        contador++;        
    }
    console.log("NOMBRE MINUSCULA "+nombreMinuscula+"\n");

    let str:string="";
    if(nombre && apellido)
    {        
        str+=`${apellido.toUpperCase()}, ${nombre[0].toUpperCase()}${nombreMinuscula.toLocaleLowerCase()}.`
    }
    
    console.log(str);    
} 

nombreApellido(nombre,apellido);