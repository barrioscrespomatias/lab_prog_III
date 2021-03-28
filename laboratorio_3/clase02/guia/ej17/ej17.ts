let mostrarPeliculas : Function = ():void=>
{
    let strRetorno : string=""; 

    let opcionUno : boolean =  (<HTMLInputElement>document.getElementById("chB1")).checked;
    let opcionDos : boolean =  (<HTMLInputElement>document.getElementById("chB2")).checked;
    let opcionTres : boolean =  (<HTMLInputElement>document.getElementById("chB3")).checked;
    let opcionCuatro : boolean =  (<HTMLInputElement>document.getElementById("chB4")).checked;
    let opcionCinco : boolean =  (<HTMLInputElement>document.getElementById("chB5")).checked;
    let opcionSeis : boolean =  (<HTMLInputElement>document.getElementById("chB6")).checked;

    var i : number = 1;
   

    let opciones : boolean [] = Array();
    opciones.push(opcionUno);
    opciones.push(opcionDos);
    opciones.push(opcionTres);
    opciones.push(opcionCuatro);
    opciones.push(opcionCinco);
    opciones.push(opcionSeis);



    opciones.forEach(element => {
        if(element == true)
        {
            // alert("Se ha elegido la película numero "+i);
            console.log("Se ha elegido la película numero "+i);
            
        }       

        i++;

    });

    
    
    
    

  
    
    
    
    
    
}