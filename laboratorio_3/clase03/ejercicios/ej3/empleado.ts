///<reference path="persona.ts" />

namespace People {

    export class Empleado extends Persona {

        protected _legajo: number;
        protected _sueldo: number;

        public constructor(nombre: string, apellido: string, dni: number, sexo: string, legajo: number, sueldo: number) {
            super(nombre, apellido, dni, sexo);
            this._legajo = legajo;
            this._sueldo = sueldo;
        }

        /* #region  METODOS GETTERS */
        public GetLegajo(): number {
            return this._legajo;
        }

        public GetSueldo(): number {
            return this._sueldo;
        }
        /* #endregion */

        public Hablar(idioma: string): string {
            let cadena: string = "";
            cadena += `El empleado habla ${idioma}.`;
            return cadena;
        }

        public ToString(): string {
            let cadena: string = "";
            cadena = super.ToString();
            cadena += `-${this._legajo}-${this._sueldo}.`;
            return cadena;
        }

    }
}