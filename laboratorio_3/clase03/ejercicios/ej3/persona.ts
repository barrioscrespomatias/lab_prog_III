namespace People {

    export abstract class Persona {
        private _apellido: string;
        private _dni: number;
        private _nombre: string;
        private _sexo: string;

        public constructor(nombre: string, apellido: string, dni: number, sexo: string) {
            this._apellido = apellido;
            this._dni = dni;
            this._nombre = nombre;
            this._sexo = sexo;
        }

        public GetApellido(): string {
            return this._apellido;
        }

        public GetNombre(): string {
            return this._nombre;
        }

        public GetSexo(): string {
            return this._sexo;
        }

        public GetDni(): number {
            return this._dni;
        }

        public abstract Hablar(idioma: string): string;

        //retorna los datos de la persona.
        public ToString(): string {
            let cadena: string = "";
            cadena += this._apellido + "-" + this._nombre + "-" + this._dni + "-" + this._sexo;
            return cadena;
        }

    }
}