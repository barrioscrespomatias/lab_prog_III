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
/// <reference path="./Ajax/ajax.ts"/>
/// <reference path="./Ajax/dom.ts"/>
var Entidades;
(function (Entidades) {
    var Manejadora = /** @class */ (function () {
        function Manejadora() {
            var _this = this;
            this.ajax = new Ajax();
            /*
                AgregarUsuarioJSON. Obtiene el nombre, el correo y la clave desde la página usuario_json.html y se enviará
                (por AJAX) hacia “./BACKEND/AltaUsuarioJSON.php” que invocará al método de instancia GuardarEnArchivo(), que
                agregará al usuario en ./backend/archivos/usuarios.json. Retornará un JSON que contendrá: éxito(bool) y mensaje(string) indicando
                lo acontecido.
                Informar por consola y alert el mensaje recibido.
            
            */
            this.AgregarUsuarioJSON = function () {
                var nombre = Dom.ObtenerPorId("nombre");
                var correo = Dom.ObtenerPorId("correo");
                var clave = Dom.ObtenerPorId("clave");
                _this.ajax.Post('/BACKEND/AltaUsuarioJSON.php', _this.MostrarMensaje, "nombre=" + nombre + "&correo=" + correo + "&clave=" + clave);
            };
            this.MostrarMensaje = function (cadena) {
                var jsonRecibido = JSON.stringify(cadena);
                console.log(jsonRecibido);
                alert(jsonRecibido);
            };
        }
        return Manejadora;
    }());
    Entidades.Manejadora = Manejadora;
})(Entidades || (Entidades = {}));
