let cadena: string = 'Es TRUE!!';
let esVerdad: boolean = true;

let nombre:string = 'Matías';
let apellido:string ='B Crespo';
let edad:number = 30;

function Mostrar2(str:string):void{

}

// let mostrar = (str: string): void => {    
//     if(esVerdad)
//         console.log(str);
// }
// mostrar(cadena);

let opcionales = (nombre:string,apellido:string,edad:number=33):void=>
{
    
    if(edad)
    console.log(`Su nombre es: ${nombre}, su apellido es : ${apellido}. Edad: ${edad}`);
    else
    console.log(`Su nombre es: ${nombre}, su apellido es : ${apellido}.`);
}

opcionales(nombre,apellido);
opcionales(nombre,apellido,30);


