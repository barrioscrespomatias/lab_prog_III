/// <reference path="Alumno.ts"/>

namespace TestPrueba{

    let main:Function = ():void=>{

        let personas: Array<Prueba.Alumno>=[
            new Prueba.Alumno("Juan", "Fernandez", 25),
            new Prueba.Alumno("Andrés", "Rodriguez", 30),
            new Prueba.Alumno("Charly", "García", 30),
        ];
        
        personas.forEach(element => {
            console.log(element.ToString()+"\n");
        });     

    }
    
    main();

}

