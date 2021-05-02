///<reference path="empleado.ts" />


namespace Main{

    let p1:People.Empleado = new People.Empleado("Juan","Fernandez",1111,"M",1111,10000);
    console.log(`Datos del empleado:`);
    console.log(p1.ToString());

    let idioma:string = "Italiano";
    p1.Hablar(idioma);

    console.log(`Nombre:`);
    console.log(p1.GetNombre());

    
    console.log(`Sueldo:`);
    console.log(p1.GetSueldo());



}