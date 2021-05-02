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
            //Jugando a obtener los parámetros.
            // let arrayParametros:Array<string> = new Array<string>();
            // arrayParametros = parametros.split(",");
            // let parametrosObtenidos : string = "";
            // let contador = 0;
            // for(let i = 0 ; arrayParametros.length;i++){
            //     contador++;
            //     parametrosObtenidos+=arrayParametros[i];
            //     if(contador<arrayParametros.length)
            //     parametrosObtenidos+='&';
            // }
            // console.log(parametrosObtenidos);
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
///<reference path="../../../ajaxClass/ajax.ts"/>
var ajax = new Ajax();
var Funcion = function () {
    ajax.Post('servidor.php', Manejador, "accion=traerAuto");
};
var Manejador = function (cadena) {
    var auto = JSON.parse(cadena);
    console.log(auto.Marca + "-" + auto.Precio);
};
