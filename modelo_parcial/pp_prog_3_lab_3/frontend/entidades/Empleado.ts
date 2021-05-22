/// <reference path="Usuario.ts"/>

namespace Entidades{
    export class Empleado extends Usuario
    {
        public sueldo : number;
        public foto : string;

        public constructor(correo:string, clave:string, id:number, id_perfi: number, perfil: string, sueldo: number, foto: string, nombre ?: string)
        {
            super(correo, clave, id, id_perfi, perfil);
            this.sueldo = sueldo;
            this.foto = foto; 
        }

        public toString():string
        {
            let retorno : string = "";

            retorno += super.toString();
            retorno += `{"sueldo" : ${this.sueldo}, "foto" : ${this.foto}}`;
            return retorno;

        }

        public ToJSON():JSON
        {
            return JSON.parse(this.toString()); 
        }


    }
}