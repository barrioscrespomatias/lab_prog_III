///<reference path="../ajaxClass/ajax.ts" />

namespace Main {

    /**
     * Llama a la funcion ajax.Get
     */
    export let ClickGet: Function = (): void => {

        let ajax: Ajax = new Ajax();
        ajax.Get('pagina.php', Succes, 'name=Matias&apellido=Crespo&edad=30');
    }

    /**
     * Llama a la funcion ajax.Post
     */
    export let ClickPost: Function = (): void => {

        let ajax: Ajax = new Ajax();
        ajax.Post('pagina.php', Succes, 'apellido=Crespo');

    }
    /**
     * Llama a la funcion SubirFotoPost
     */
    export let ClickFoto: Function = (): void => {

        let ajax: Ajax = new Ajax();
        ajax.SubirFotoPost('pagina.php', Succes, 'foto', 'imgFoto');
    }

    /**
     * Muestra un mensaje por alert.
     * @param cadena mensaje a ser mostrado
     */
    let Succes: Function = (cadena: string): void => {
        alert(cadena);
    }




}