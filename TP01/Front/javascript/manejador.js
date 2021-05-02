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
        this.Post = function (ruta, success, params, error) {
            if (params === void 0) { params = ""; }
            var parametros = "";
            if (params.length > 0)
                parametros = params;
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
    Main.EnviarFormulario = function (btnAccion) {
        var xhttp = new XMLHttpRequest();
        var nombre = Dom.ObtenerPorId("txtNombre");
        var apellido = Dom.ObtenerPorId("txtApellido");
        var dni = Dom.ObtenerPorId("txtDni");
        var sexo = Dom.ObtenerPorId("cboSexo");
        var legajo = Dom.ObtenerPorId("txtLegajo");
        var sueldo = Dom.ObtenerPorId("txtSueldo");
        var turno = document.querySelectorAll('input[name="rdoTurno"]');
        var foto = Dom.ObtenerPorId("txtFoto");
        var btnEnviar = Dom.ObtenerPorId("btnEnviar");
        var formulario = new FormData();
        var turnoSeleccionado;
        for (var _i = 0, turno_1 = turno; _i < turno_1.length; _i++) {
            var seleccionado = turno_1[_i];
            if (seleccionado.checked) {
                turnoSeleccionado = seleccionado.value;
                break;
            }
        }
        formulario.append('txtNombre', nombre.value);
        formulario.append('txtApellido', apellido.value);
        formulario.append('txtDni', dni.value);
        formulario.append('cboSexo', sexo.value);
        formulario.append('txtLegajo', legajo.value);
        formulario.append('txtSueldo', sueldo.value);
        formulario.append('rdoTurno', turnoSeleccionado);
        formulario.append('btnEnviar', btnAccion);
        formulario.append('txtFoto', foto.files[0]);
        xhttp.open('POST', '../Back/administracion.php', true);
        xhttp.setRequestHeader("enctype", "multipart/form-data");
        xhttp.send(formulario);
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200)
                Manejador(xhttp.responseText);
        };
    };
    Main.ModificarEmpleado = function () {
    };
    Main.ClickPost = function () {
        var nombre = Dom.ObtenerPorId("txtNombre");
        var apellido = Dom.ObtenerPorId("txtApellido");
        var dni = Dom.ObtenerPorId("txtDni");
        var sexo = Dom.ObtenerPorId("cboSexo");
        var legajo = Dom.ObtenerPorId("txtLegajo");
        var sueldo = Dom.ObtenerPorId("txtSueldo");
        var turno = document.querySelectorAll('input[name="rdoTurno"]');
        var foto = Dom.ObtenerPorId("txtFoto");
        var turnoSeleccionado;
        for (var _i = 0, turno_2 = turno; _i < turno_2.length; _i++) {
            var seleccionado = turno_2[_i];
            if (seleccionado.checked) {
                turnoSeleccionado = seleccionado.value;
                break;
            }
        }
        ajax.Post('../Back/administracion.php', Manejador, "txtNombre=" + nombre.value + "&txtApellido=" + apellido.value + "&txtDni=" + dni.value + "&txtLegajo=" + legajo.value + "&txtSueldo=" + sueldo.value + "&cboSexo=" + sexo.value + "&rdoTurno=" + turnoSeleccionado);
    };
    var Manejador = function (cadena) {
        console.log("nombre " + cadena + " mostrado por consola");
    };
})(Main || (Main = {}));
