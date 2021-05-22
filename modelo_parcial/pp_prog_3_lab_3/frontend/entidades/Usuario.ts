/// <reference path="Persona.ts"/>


namespace Entidades{
    export class Usuario extends Persona{

        public id : number;
        public id_perfil : number;
        public perfil : string;


        public constructor (correo: string, clave:string,  id : number, id_perfil : number, perfil : string, nombre ?: string)
        {
            super(correo,clave);

            this.id = id;
            this.id_perfil = id_perfil
            this.perfil = perfil;;
        }

        public ToString(): string 
        {
            let retorno : string ="";
            retorno +=  super.ToString();
            retorno += `{"id":${this.id}, "id_perfil":${this.id_perfil}, "perfil":${this.perfil}}`;

            return retorno;
        }

        public ToJSON():JSON
        {
            // let json:JSON += super.ToJSON();
            return JSON.parse(this.toString());
        }

    }

}