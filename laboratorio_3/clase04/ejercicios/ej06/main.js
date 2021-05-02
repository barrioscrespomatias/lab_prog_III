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
            var arrayParametros = new Array();
            arrayParametros = parametros.split(",");
            console.log(arrayParametros[0]);
            console.log(arrayParametros[1]);
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
///<reference path="../../../ajaxClass/ajax.ts"/>
///<reference path="../../../domClass/dom.ts"/>
var Main;
(function (Main) {
    Main.ClickGet = function () {
        var nombre = Dom.ObtenerPorId("nombre");
        var ajax = new Ajax();
        ajax.Post('comprobarDisponibilidad.php', Succes, "nombre=" + nombre.value + ",apellido=crespo");
    };
    var Succes = function (cadena) {
        alert(cadena);
    };
})(Main || (Main = {}));
