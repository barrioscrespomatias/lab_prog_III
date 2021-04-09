///<reference path="Alumno.ts"/>
namespace Manejador{
    export let CrearAlumno:Function = ():void=>{
        let nombre:string = (<HTMLInputElement>document.getElementById("nombre")).value;
        let apellido:string = (<HTMLInputElement>document.getElementById("apellido")).value;
        let legajo:number = (Number)((<HTMLInputElement>document.getElementById("legajo")).value);

        let alumno:Prueba.Alumno = new Prueba.Alumno(nombre,apellido,legajo);
        alert(alumno.ToString());        
    }


}