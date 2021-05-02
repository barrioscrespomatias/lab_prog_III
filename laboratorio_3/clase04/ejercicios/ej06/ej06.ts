///<reference path="../../../ajaxClass/ajax.ts"/>
///<reference path="../../../domClass/dom.ts"/>

namespace Main{

    export let ClickGet:Function = ():void=>{
        
        let nombre:HTMLInputElement = Dom.ObtenerPorId("nombre");
        let ajax:Ajax = new Ajax();
        ajax.Post('comprobarDisponibilidad.php', Succes,`nombre=${nombre.value},apellido=crespo`);
    }

    let Succes : Function = (cadena:string):void=>{
        alert(cadena);
    }

    

}