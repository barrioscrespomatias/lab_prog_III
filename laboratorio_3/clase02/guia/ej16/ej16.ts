let mostrarDatos : Function = ():void=>
{
   
    let nombre:string = (<HTMLInputElement> document.getElementById("nombre")).value;
    let email:string = (<HTMLInputElement> document.getElementById("email")).value;
    let dni:string = (<HTMLInputElement> document.getElementById("dni")).value;
    let cv:string = (<HTMLInputElement> document.getElementById("cv")).value;

   
    console.log(`Nombre: ${nombre}\nE-Mail: ${email}\nDni: ${dni}\n\nCv: ${cv}`);
    alert(`Nombre: ${nombre}\nE-Mail: ${email}\nDni: ${dni}\n\nCv: ${cv}`);

}