/// <reference path="./Ajax/ajax.ts"/>
/// <reference path="./Ajax/dom.ts"/>

namespace Entidades{

    export class Manejadora{

        public ajax:Ajax = new Ajax();

        /* 
            AgregarUsuarioJSON. Obtiene el nombre, el correo y la clave desde la página usuario_json.html y se enviará
            (por AJAX) hacia “./BACKEND/AltaUsuarioJSON.php” que invocará al método de instancia GuardarEnArchivo(), que
            agregará al usuario en ./backend/archivos/usuarios.json. Retornará un JSON que contendrá: éxito(bool) y mensaje(string) indicando
            lo acontecido.
            Informar por consola y alert el mensaje recibido.
        
        */


         public AgregarUsuarioJSON : Function = () : void =>
        {
            let nombre = Dom.ObtenerPorId ("nombre");
            let correo = Dom.ObtenerPorId ("correo");
            let clave = Dom.ObtenerPorId ("clave");
            
            this.ajax.Post('/BACKEND/AltaUsuarioJSON.php',this.MostrarMensaje,`nombre=${nombre}&correo=${correo}&clave=${clave}`);
        }

        //MostrarUsuariosJSON. Recuperará (por AJAX) todos los usuarios del archivo usuarios.json y generará un
        // listado dinámico, crear una tabla HTML con cabecera (en el FRONTEND) que mostrará toda la información de
        // cada uno de los usuarios. Invocar a “./BACKEND/ListadoUsuariosJSON.php”, recibe la petición (por GET) y retornará
        // el listado de todos los usuarios en formato JSON.

        public MostrarUsuariosJSON : Function = (): void =>
        {
            this.ajax.Get('./BACKEND/ListadoUsuariosJSON.php','',)

            let CargarDiv : Function = (cadena:string) : void =>
            {
                let divTable = Dom.ObtenerPorId("divTabla");
                divTable.innerHTML ="";

                let usuarioJson:any = JSON.parse(cadena);



                let usuario : Usuario = new Usuario(
                    usuarioJson.correo,
                    usuarioJson.clave,
                    usuarioJson.id,
                    usuarioJson.perfil,
                    usuarioJson.nombre);
                
           


            }

            
        }

        public MostrarMensaje : Function = (cadena:string) : void =>
        {
            let jsonRecibido: any = JSON.stringify(cadena);

            console.log(jsonRecibido);
            alert(jsonRecibido);            
        }

    }
}