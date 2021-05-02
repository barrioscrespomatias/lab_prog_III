///<reference path="../../../ajaxClass/ajax.ts"/>
    
let ajax : Ajax = new Ajax();
let Funcion : Function = () : void =>{

    ajax.Post('servidor.php', Manejador,`accion=traerAuto`);
}

let Manejador : Function = (cadena:string) : void =>{
    let auto : any = JSON.parse(cadena);
    console.log(auto.Marca + "-" +auto.Precio);
}