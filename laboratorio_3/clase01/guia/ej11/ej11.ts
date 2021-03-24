import * as mis_metodos from '../mis_metodos/metodos';
import * as ej10 from '../ej10/ej10';

var esPalindromo : Function = (cadena:string):boolean=>
{
    let retorno: boolean = true;
    var i: number = 0;
    let cantidad: number = 0;    

    //Se utiliza método isLetter del proyecto mis_metodos.
    if (mis_metodos.isLetter(cadena)) 
    {
        //Pasar todo a mayúsculas.
        cadena=cadena.toUpperCase();

        //Trae las letras mayúsculas que existen en una cadena, sin espacios.
        //El metodo retorna un array separado por comas
        cadena = ej10.retornaMayusculasSinEspacio(cadena);

        //Cantidad de letras actual de la cadena. (Sin espacios pero con comas)                
        cantidad=cadena.length;

        for (i; i < cantidad; i++) 
        {          
            if (cantidad > 0) 
            {
                //Recorre la cadena desde sus extremos.
                //compara por direcciones de memoria                
                if (cadena[i] != cadena[cantidad-1])
                {                 
                    retorno = false;
                    break;
                }                               
            }                     
            cantidad--;          
        }
    }
    return retorno;
}

console.log(esPalindromo("La ruta nos aporto otro paso natural"));