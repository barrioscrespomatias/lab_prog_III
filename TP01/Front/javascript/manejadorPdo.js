/**
 * Genera objeto de tipo Ajax. Métodos GET, POST y SubirFotoPost
 */
var Ajax = /** @class */ (function () {
    function Ajax() {
        var _this = this;
        /**
         *
         * @param ruta ruta del servidor backend php
         * @param success funcion mediante la cual se muestra un mensaje
         * @param params parametros que se van a enviar por POST. 'atributo=valor&...'
         * @param error funcion que se utiliza en caso de error para mostra un mensaje.
         */
        this.Get = function (ruta, success, params, error) {
            if (params === void 0) { params = ""; }
            var parametros = "";
            if (params.length > 0) {
                parametros = params;
                ruta += "?" + parametros;
            }
            _this.xhttp.open("GET", ruta, true);
            _this.xhttp.send();
            _this.xhttp.onreadystatechange = function () {
                if (_this.xhttp.readyState == 4) {
                    if (_this.xhttp.status == 200) {
                        success(_this.xhttp.responseText);
                    }
                    else if (error !== undefined) {
                        error(_this.xhttp.status);
                    }
                }
            };
        };
        /**
        *
        * @param ruta ruta del servidor backend php
        * @param success funcion mediante la cual se muestra un mensaje
        * @param params parametros que se van a enviar por POST. 'atributo=valor&...'
        * @param error funcion que se utiliza en caso de error para mostra un mensaje.
        */
        this.Post = function (ruta, success, params, error, idFile) {
            var parametros = "";
            if (params.length > 0)
                parametros = params;
            console.log(parametros);
            _this.xhttp.open("POST", ruta, true);
            _this.xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            _this.xhttp.send(parametros);
            _this.xhttp.onreadystatechange = function () {
                if (_this.xhttp.readyState == 4) {
                    if (_this.xhttp.status == 200) {
                        success(_this.xhttp.responseText);
                    }
                    else if (error !== undefined) {
                        error(_this.xhttp.status);
                    }
                }
            };
        };
        /**
         *
         * @param ruta ruta del servidor backend php
         * @param success funcion mediante la cual se muestra un mensaje
         * @param params parametros que se van a enviar por POST. 'atributo=valor&...'
         * @param error funcion que se utiliza en caso de error para mostra un mensaje.
         */
        this.EnviarFormulario = function (ruta, success, params, error, idFile) {
            var form = new FormData();
            var archivo = document.getElementById("txtFoto");
            //Agregar atributos al formulario
            // form.append('nombre', params[0].nombre);
            // form.append('apellido', params[0].apellido);
            // form.append('dni', params[0].dni);
            // form.append('sexo', params[0].sexo);
            // form.append('legajo', params[0].legajo);
            // form.append('sueldo', params[0].sueldo);
            // form.append('turno', params[0].turno);
            //Atributos en forma de Json.
            form.append('empleado', JSON.stringify(params[0]));
            form.append('txtFoto', archivo.files[0]);
            form.append('opcion', params[1].opcion);
            //Envio de peticiones mediante Ajax
            _this.xhttp.open('POST', ruta, true);
            //Al ser post se debe enviar la informacion en el encabezado
            _this.xhttp.setRequestHeader("enctype", "multipart/form-data");
            _this.xhttp.send(form);
            // this.xhttp.open("POST", ruta, true);
            // this.xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            // this.xhttp.send(parametros);
            _this.xhttp.onreadystatechange = function () {
                if (_this.xhttp.readyState == 4) {
                    if (_this.xhttp.status == 200) {
                        success(_this.xhttp.responseText);
                    }
                    else if (error !== undefined) {
                        error(_this.xhttp.status);
                    }
                }
            };
        };
        /**
         * Envia un file de tipo IMG al servidor.
         * @param ruta ruta del servidor
         * @param success funcion que informa por consola/alert
         * @param idFile ID del atributo FILE del HTML
         * @param idImg ID del atributo IMG del HTML
         * @param error Funcion que se llama en caso de error. Opcional
         */
        this.SubirFotoPost = function (ruta, success, idFile, idImg, error) {
            var foto = document.getElementById(idFile);
            var form = new FormData();
            //Agregar atributos al formulario
            form.append('foto', foto.files[0]);
            form.append('opcion', "subirFoto");
            //Envio de peticiones mediante Ajax
            _this.xhttp.open('POST', ruta, true);
            //Al ser post se debe enviar la informacion en el encabezado
            _this.xhttp.setRequestHeader("enctype", "multipart/form-data");
            _this.xhttp.send(form);
            //funcion callback
            _this.xhttp.onreadystatechange = function () {
                if (_this.xhttp.readyState == 4 && _this.xhttp.status == 200) {
                    console.log(_this.xhttp.responseText);
                    var responseText = _this.xhttp.responseText;
                    var retArray = responseText.split("-");
                    if (retArray[0] == "false") {
                        console.log("Error, no se ha podido subir la foto");
                    }
                    else {
                        console.log("Foto subida!");
                        //Establece la direccion el src desde el path que se envia desde el servidor.
                        //Ret[1] sale del split de la respuesta del servidor.
                        document.getElementById(idImg).src = retArray[1];
                    }
                }
            };
        };
        this.ModificarParrafo = function (cadena) {
        };
        this.xhttp = new XMLHttpRequest();
    }
    return Ajax;
}());
var Dom = /** @class */ (function () {
    function Dom() {
    }
    /**
     * Toma por id desde el html y retorna un elemento de tipo HTMLInputElement
     * @param id ID del HTML
     * @returns retorna un HTMLInputElement
     */
    Dom.ObtenerPorId = function (id) {
        var valor = document.getElementById(id);
        return valor;
    };
    return Dom;
}());
///<reference path="../../../laboratorio_3/ajaxClass/ajax.ts"/>
///<reference path="../../../laboratorio_3/domClass/dom.ts"/>
var Main;
(function (Main) {
    var ajax = new Ajax();
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
    Main.AdministrarModificar = function (dniEmpleado) {
        var xhttp = new XMLHttpRequest();
        var formulario = new FormData();
        formulario.append('inputHidden', dniEmpleado);
        xhttp.open('POST', '../Back/administracion.php', true);
        xhttp.setRequestHeader("enctype", "multipart/form-data");
        xhttp.send(formulario);
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                Manejador(xhttp.responseText);
                console.log("formularioHidden enviado hacia index.php!!");
            }
        };
    };
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
    var Manejador = function (cadena) {
        console.log("nombre " + cadena + " mostrado por consola");
    };
    /* #endregion */
    /* #region  JSON - AJAX */
    Main.TomarDatos = function (accion) {
        //Toma de datos
        var nombre = (Dom.ObtenerPorId("txtNombre")).value;
        var apellido = (Dom.ObtenerPorId("txtApellido")).value;
        var dni = (Dom.ObtenerPorId("txtDni")).value;
        var sexo = (Dom.ObtenerPorId("cboSexo")).value;
        var legajo = (Dom.ObtenerPorId("txtLegajo")).value;
        var sueldo = (Dom.ObtenerPorId("txtSueldo")).value;
        // let turno : string = Dom.ObtenerPorId("rdoTurno").selected;
        //ARCHIVO
        var archivo = Dom.ObtenerPorId("txtFoto");
        var turno = document.querySelectorAll('input[name="rdoTurno"]');
        var turnoSeleccionado;
        for (var _i = 0, turno_1 = turno; _i < turno_1.length; _i++) {
            var seleccionado = turno_1[_i];
            if (seleccionado.checked) {
                turnoSeleccionado = seleccionado.value;
                break;
            }
        }
        //Creacion Json
        var jsonEmpleado = { "nombre": nombre, "apellido": apellido, "dni": dni, "sexo": sexo, "legajo": legajo, "sueldo": sueldo, "turno": turnoSeleccionado };
        var jsonParametros = { "opcion": accion, "idFile": "txtFoto" };
        var parametros = new Array();
        parametros = [jsonEmpleado, jsonParametros];
        //Envio por Ajax Post        
        // ajax.Post('../Back/pdo/administracion_pdo.php', Succes, `empleado=${JSON.stringify(jsonEmpleado)}&opcion=${accion}`,"txtFile");
        ajax.EnviarFormulario('../Back/pdo/administracion_pdo.php', Succes, parametros);
    };
    Main.MostrarEmpleados = function () {
        ajax.Post('../Back/pdo/administracion_pdo.php', Succes, "opcion=TraerTodos");
    };
    /**
     * Modifica mediante Id recibido como parámetro desde el HTML dinámico
     * recibe como parámetro el DNI del empleado.
     */
    Main.PedirDatos = function (dni) {
        ajax.Post('../Back/pdo/administracion_pdo.php', CargarPaginaPrincipal, "dniModificar=" + dni + "&opcion=EnviarDatos");
    };
    var CargarPaginaPrincipal = function (datosEmpleado) {
        var empleado = JSON.parse(datosEmpleado);
        Dom.ObtenerPorId("txtNombre").value = empleado.nombre;
        Dom.ObtenerPorId("txtApellido").value = empleado.apellido;
        Dom.ObtenerPorId("txtDni").value = empleado.dni;
        Dom.ObtenerPorId("cboSexo").value = empleado.sexo;
        Dom.ObtenerPorId("txtLegajo").value = empleado.legajo;
        Dom.ObtenerPorId("txtSueldo").value = empleado.sueldo;
        //cargo el hdnModificar
        document.getElementById('inputHidden').value = empleado.dni;
        //Radio buttom.. ¿?
        // Dom.ObtenerPorId("rdoTurno").value = empleado.turno;
        //Path...
        // Dom.ObtenerPorId("txtFoto").value = empleado.pathFoto;
        ajax.Post('../Front/index.php', SuccesConsole, "inputHidden=" + empleado.dni);
    };
    // let CargarDatosEnDom : Function = (datosEmpleado:string) : void =>{
    //     let empleado : any = JSON.parse(datosEmpleado);
    var ModificarOpcion = function () {
        Dom.ObtenerPorId("btnEnviar").onclick = function () { Main.PedirDatos('Modificar'); };
    };
    // }
    /**
     * Elimna al empleado que se coincide con el
     * Dicho link enviará (por GET) a la página eliminar.php
     * el número de legajo del empleado a ser eliminado.
     * Se deberá eliminar del archivo de texto al empleado que coincida
     * con el legajo recibido
     */
    Main.EliminarEmpleado = function (dni) {
        ajax.Post('../Back/pdo/administracion_pdo.php', Succes, "dniEliminar=" + dni + "&opcion=Eliminar");
    };
    /**
     * Funcion que muestra por consola el Json recibido desde servidor.
     * @param cadena
     */
    var Succes = function (cadena) {
        //Muestra en formato JSON.
        // let empleado:any = JSON.parse(cadena);
        // console.log(cadena);
        var divMostrar = Dom.ObtenerPorId("divMostrar");
        divMostrar.innerHTML = "";
        divMostrar.innerHTML += cadena;
    };
    var SuccesConsole = function (cadena) {
        // Muestra en formato JSON.
        // let empleado:any = JSON.parse(cadena);
        console.log(cadena);
    };
    /* #endregion */
})(Main || (Main = {}));
