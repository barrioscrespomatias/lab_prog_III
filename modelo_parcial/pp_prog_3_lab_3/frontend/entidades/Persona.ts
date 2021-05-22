
namespace Entidades {

    export class Persona {

        public nombre: string;
        public correo: string;
        public clave: string;

        public constructor(correo: string, clave: string, nombre?:string) {
            this.correo = correo;
            this.clave = clave;
            this.nombre = "";
            
        }

        public ToString(): string {
            let retorno: string = '';
            if(this.nombre != "")
            retorno = `{"nombre":${this.nombre}, "correo":${this.correo}, "clave":${this.clave}}`;
            else
            retorno = `"correo":${this.correo}, "clave":${this.clave}}`;
            return retorno;
        }

        public ToJSON(): JSON {
            return JSON.parse(this.ToString());
        }


    }




}