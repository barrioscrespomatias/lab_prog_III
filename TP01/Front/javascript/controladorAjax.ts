///<reference path="../../../laboratorio_3/ajaxClass/ajax.ts"/>
///<reference path="../../../laboratorio_3/domClass/dom.ts"/>

namespace Main {
    let ajax: Ajax = new Ajax();

    /* #region  Evniar formulario HORRIBLE */
    // export let EnviarFormulario: Function = (btnAccion: string): void => {
    //     let xhttp: XMLHttpRequest = new XMLHttpRequest();
    //     let nombre: HTMLInputElement = Dom.ObtenerPorId("txtNombre");
    //     let apellido: HTMLInputElement = Dom.ObtenerPorId("txtApellido");
    //     let dni: HTMLInputElement = Dom.ObtenerPorId("txtDni");
    //     let sexo: HTMLInputElement = Dom.ObtenerPorId("cboSexo");
    //     let legajo: HTMLInputElement = Dom.ObtenerPorId("txtLegajo");
    //     let sueldo: HTMLInputElement = Dom.ObtenerPorId("txtSueldo");
    //     let turno: any = document.querySelectorAll('input[name="rdoTurno"]');
    //     let foto: any = Dom.ObtenerPorId("txtFoto");
    //     let btnEnviar: HTMLInputElement = Dom.ObtenerPorId("btnEnviar");
    //     let formulario: FormData = new FormData();

    //     let turnoSeleccionado;

    //     for (const seleccionado of turno) {
    //         if (seleccionado.checked) {
    //             turnoSeleccionado = seleccionado.value;
    //             break;
    //         }
    //     }

    //     formulario.append('txtNombre', nombre.value);
    //     formulario.append('txtApellido', apellido.value);
    //     formulario.append('txtDni', dni.value);
    //     formulario.append('cboSexo', sexo.value);
    //     formulario.append('txtLegajo', legajo.value);
    //     formulario.append('txtSueldo', sueldo.value);
    //     formulario.append('rdoTurno', turnoSeleccionado);
    //     formulario.append('btnEnviar', btnAccion);
    //     formulario.append('hdnModificar', dni.value);
    //     formulario.append('txtFoto', foto.files[0]);


    //     xhttp.open('POST', '../Back/administracion.php', true);
    //     xhttp.setRequestHeader("enctype", "multipart/form-data");
    //     xhttp.send(formulario);

    //     xhttp.onreadystatechange = () => {
    //         if (xhttp.readyState == 4 && xhttp.status == 200)
    //             Manejador(xhttp.responseText);
    //     }


    // }

    /* #endregion */

    /* #region  Administrar modificar */
    export let AdministrarModificar: Function = (dniEmpleado: string): void => {

        let xhttp: XMLHttpRequest = new XMLHttpRequest();
        let formulario: FormData = new FormData();
        formulario.append('inputHidden', dniEmpleado);


        xhttp.open('POST', '../Back/administracion.php', true);
        xhttp.setRequestHeader("enctype", "multipart/form-data");
        xhttp.send(formulario);

        xhttp.onreadystatechange = () => {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                Manejador(xhttp.responseText);
                console.log("formularioHidden enviado hacia index.php!!");
            }
        }
    }
    /* #endregion */

    /* #region  envio mediante post SIN FORMULARIO */
    // export let ClickPost: Function = (): void => {

    //     let nombre: HTMLInputElement = Dom.ObtenerPorId("txtNombre");
    //     let apellido: HTMLInputElement = Dom.ObtenerPorId("txtApellido");
    //     let dni: HTMLInputElement = Dom.ObtenerPorId("txtDni");
    //     let sexo: HTMLInputElement = Dom.ObtenerPorId("cboSexo");
    //     let legajo: HTMLInputElement = Dom.ObtenerPorId("txtLegajo");
    //     let sueldo: HTMLInputElement = Dom.ObtenerPorId("txtSueldo");
    //     let turno: any = document.querySelectorAll('input[name="rdoTurno"]');
    //     let foto: any = Dom.ObtenerPorId("txtFoto");

    //     let turnoSeleccionado;

    //     for (const seleccionado of turno) {
    //         if (seleccionado.checked) {
    //             turnoSeleccionado = seleccionado.value;
    //             break;
    //         }
    //     }

    //     ajax.Post('../Back/administracion.php', Manejador, `txtNombre=${nombre.value}&txtApellido=${apellido.value}&txtDni=${dni.value}&txtLegajo=${legajo.value}&txtSueldo=${sueldo.value}&cboSexo=${sexo.value}&rdoTurno=${turnoSeleccionado}`);

    // }

    /* #endregion */

    /* #region  Manejador */
    let Manejador: Function = (cadena: string): void => {
        console.log(`nombre ${cadena} mostrado por consola`);
    }
    /* #endregion */

    /* #region  JSON - AJAX */
    
    export let TomarDatos : Function = (accion:string) : void =>{
        //Toma de datos
        let nombre : string = (Dom.ObtenerPorId("txtNombre")).value;
        let apellido : string = (Dom.ObtenerPorId("txtApellido")).value;
        let dni : string = (Dom.ObtenerPorId("txtDni")).value;
        let sexo : string = (Dom.ObtenerPorId("cboSexo")).value;
        let legajo : string = (Dom.ObtenerPorId("txtLegajo")).value;
        let sueldo : string = (Dom.ObtenerPorId("txtSueldo")).value;
        // let turno : string = Dom.ObtenerPorId("rdoTurno").selected;


        //ARCHIVO
        let archivo : any = Dom.ObtenerPorId("txtFoto");

        let turno: any = document.querySelectorAll('input[name="rdoTurno"]');
        let turnoSeleccionado;

        for (const seleccionado of turno) {
            if (seleccionado.checked) {
                turnoSeleccionado = seleccionado.value;
                break;
            }
        }  



        //Creacion Json
        let jsonEmpleado = {"nombre":nombre,"apellido":apellido,"dni":dni,"sexo":sexo,"legajo":legajo,"sueldo":sueldo,"turno":turnoSeleccionado};
        let jsonParametros = {"opcion":accion,"idFile":"txtFoto"};

        let parametros : Array<any> = new Array<any>();
        parametros = [jsonEmpleado,jsonParametros]
        
        
        

        //Envio por Ajax Post        
        // ajax.Post('../Back/pdo/administracion_pdo.php', Succes, `empleado=${JSON.stringify(jsonEmpleado)}&opcion=${accion}`,"txtFile");
        ajax.EnviarFormulario('../Back/pdo/administracion_pdo.php', Succes, parametros);
        
              
    }
    
    export let MostrarEmpleados : Function = () : void =>{
        
        ajax.Post('../Back/pdo/administracion_pdo.php', Succes,`opcion=TraerTodos`);        
    }

    /**
     * Modifica mediante Id recibido como parámetro desde el HTML dinámico
     * recibe como parámetro el DNI del empleado.
     */
    export let PedirDatos : Function = (dni:string) : void =>{
        ajax.Post('../Back/pdo/administracion_pdo.php', CargarPaginaPrincipal,`dniModificar=${dni}&opcion=EnviarDatos`);

    }

    let CargarPaginaPrincipal:Function = (datosEmpleado:string) : void =>{
        let empleado : any = JSON.parse(datosEmpleado);
        
        Dom.ObtenerPorId("txtNombre").value = empleado.nombre;
        Dom.ObtenerPorId("txtApellido").value = empleado.apellido;
        Dom.ObtenerPorId("txtDni").value = empleado.dni;
        Dom.ObtenerPorId("cboSexo").value = empleado.sexo;
        Dom.ObtenerPorId("txtLegajo").value = empleado.legajo;
        Dom.ObtenerPorId("txtSueldo").value = empleado.sueldo;
        //cargo el hdnModificar
        (<HTMLInputElement>document.getElementById('inputHidden')).value = empleado.dni;
        

        //Radio buttom.. ¿?
        // Dom.ObtenerPorId("rdoTurno").value = empleado.turno;

        //Path...
        // Dom.ObtenerPorId("txtFoto").value = empleado.pathFoto;
        
        ajax.Post('../Front/index.php', SuccesConsole,`inputHidden=${empleado.dni}`);
        
   
                
        
    }

    // let CargarDatosEnDom : Function = (datosEmpleado:string) : void =>{
    //     let empleado : any = JSON.parse(datosEmpleado);

    let ModificarOpcion : Function = () : void =>{
        Dom.ObtenerPorId("btnEnviar").onclick = function () { Main.PedirDatos('Modificar'); };
        
    }


    // }

    /**
     * Elimna al empleado que se coincide con el
     * Dicho link enviará (por GET) a la página eliminar.php
     * el número de legajo del empleado a ser eliminado.
     * Se deberá eliminar del archivo de texto al empleado que coincida 
     * con el legajo recibido     
     */
    export let EliminarEmpleado : Function = (dni:string) : void =>{
        ajax.Post('../Back/pdo/administracion_pdo.php', Succes,`dniEliminar=${dni}&opcion=Eliminar`);
    }

    /**
     * Funcion que muestra por consola el Json recibido desde servidor.
     * @param cadena 
     */
    let Succes:Function = (cadena:string) :void =>{
        //Muestra en formato JSON.
        // let empleado:any = JSON.parse(cadena);
        // console.log(cadena);

        let divMostrar: HTMLInputElement = Dom.ObtenerPorId("divMostrar");
        divMostrar.innerHTML = "";
        divMostrar.innerHTML+=cadena;      

    }

    let SuccesConsole:Function = (cadena:string) :void =>{
        // Muestra en formato JSON.
        // let empleado:any = JSON.parse(cadena);
        console.log(cadena);

        

    }
    
    /* #endregion */

}
