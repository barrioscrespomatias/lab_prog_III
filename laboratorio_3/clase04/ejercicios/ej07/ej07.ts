///<reference path="../../../ajaxClass/ajax.ts"/>
///<reference path="../../../domClass/dom.ts"/>

namespace Main {

    export let ClickPost: Function = (): void => {
        let ajax: Ajax = new Ajax();
        let nombre = Dom.ObtenerPorId("nombre");
        ajax.Post('servidor.php', ModificarParrafo, `nombre=${nombre.value}`);
    }

    //Funcion manejadora que actualiza un div.
    let ModificarParrafo: Function = (cadena: string): void => {
        let parrafo: HTMLInputElement = <HTMLInputElement>document.getElementById("divNombres");
        parrafo.innerHTML = '';
        parrafo.innerHTML += cadena;
    }
}