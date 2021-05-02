

namespace Prueba {
    export class Persona {
        protected nombre: string;
        protected apellido: string;

        public constructor(nombre: string, apellido: string) {
            this.nombre = nombre;
            this.apellido = apellido;
        }
       
        /* #region  Métodos Getter y Setter */
        public GetNombre(): string {
            return this.nombre;
        }

        public SetNombre(value: string) {
            this.nombre = value;
        }

        public GetApellido(): string {
            return this.apellido;
        }

        public SetApellido(value: string) {
            this.apellido = value;
        }

        /* #endregion */

        public ToString(): string {
            return this.nombre + ", " + this.apellido;
        }

    }


}
