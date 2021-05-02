namespace People {
    class Fabrica {
        private _empleados: Array<Empleado>;
        private _razonSocial: string;

        public constructor(razonSocial: string) {
            this._razonSocial = razonSocial;
            this._empleados = new Array<Empleado>();
        }

        //Agrega al empleado a la fábrica siempre que no exista.
        public AgregarEmpleado(persona: Empleado): boolean {
            let retorno:boolean = false;
            let existe:boolean = this.BuscarEmpleado(persona);
            if(!existe){
                this._empleados.push(persona);               
                retorno=true;
            }
            return retorno;            
        }

        //Si el empleado está, retorna true sino false.
        public BuscarEmpleado(persona: Empleado): boolean {
            let retorno: boolean = false;
            for (const empleado of this._empleados) {
                if (empleado.GetDni == persona.GetDni) {
                    retorno = true;
                    break;
                }

            }
            return retorno;
        }

        //retorna los sueldos de los empleados.
        public CalcularSueldos():number{
            let retorno:number=0;
            for (const empleado of this._empleados) {
                retorno+=empleado.GetSueldo();
            }
            return retorno;
        }

        public EliminarEmpleado(persona:Empleado):boolean{
            let retorno:boolean = false;
            let existe:boolean = this.BuscarEmpleado(persona);
            let index:number;
            if(existe){
                index = this._empleados.indexOf(persona);
                this._empleados.splice(index);
                retorno=true;
            }
            return retorno;            
        }


    }
}