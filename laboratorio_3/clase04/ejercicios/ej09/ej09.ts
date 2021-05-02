///<reference path="../../../ajaxClass/ajax.ts"/>
///<reference path="../../../domClass/dom.ts"/>



namespace Main {

    let ajax: Ajax = new Ajax();
    let selectProvincia: HTMLSelectElement = <HTMLSelectElement>Dom.ObtenerPorId("provincias");
    
    export let CargarProvincias: Function = (): void => {

        ajax.Post('servidor.php', Manejadora, `accion=cargar`);

    }

    let Manejadora: Function = (cadena: string): void => {
        selectProvincia.innerHTML = "";
        selectProvincia.value = cadena;        
        let opcion : string = "<option value='0'> "+selectProvincia.innerHTML+"</option>"; 
        (<HTMLSelectElement>document.getElementById("provincias")).innerHTML+=opcion;
    }


}