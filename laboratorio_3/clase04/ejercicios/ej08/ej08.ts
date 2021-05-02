///<reference path="../../../ajaxClass/ajax.ts"/>
///<reference path="../../../domClass/dom.ts"/>

window.onload = (): void => {
    
        
 
    
};

namespace Main {

    
    let ajax: Ajax = new Ajax();
    var stop: boolean = false;
    let noticiaActual: number = Math.floor(Math.random() * 5) + 1;

    export let MostrarNoticias: Function = (): void => {

        ajax.Post('servidor.php', Manejadora, `noticia=${noticiaActual}`);
        console.log(noticiaActual);
    }

    export let ClickAnterior: Function = (): void => {
        ajax.Post('servidor.php', Manejadora, `noticia=${noticiaActual - 1}`);
        console.log(noticiaActual);
    }

    let Manejadora: Function = (cadena: string): void => {
        let divNoticias: HTMLInputElement = Dom.ObtenerPorId("divNoticias");
        divNoticias.innerHTML = "";
        divNoticias.innerHTML += cadena;
        console.log(cadena);
    }

    export let Comenzar : Function = () : void=>{
        while(stop!=true){
            setInterval(Main.MostrarNoticias(), 2000);
        }
        
    }

    export let Stop : Function = () :void =>{
        stop = true;
    }

}