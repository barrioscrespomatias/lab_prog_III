/// <reference path="Persona.ts"/>

namespace Prueba {
    export class Alumno extends Persona {
        public legajo: number;

        public constructor(nombre: string, apellido: string, legajo: number) {
            super(nombre, apellido);
            this.legajo = legajo;
        }

        /* #region  Métodos Getter y Setter */
        public GetLegajo(): number {
            return this.legajo;
        }

        public SetLegajo(value: number) {
            this.legajo = value;
        }
        /* #endregion */


        public ToString(): string {
            let datos: string = "";
            datos += super.ToString();
            datos += " - Legajo :" + this.legajo;
            return datos;
        }

    }


}