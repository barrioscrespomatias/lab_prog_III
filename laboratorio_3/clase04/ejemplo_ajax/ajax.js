"use strict";
var TestAjax;
(function (TestAjax) {
    var xhttp = new XMLHttpRequest();
    TestAjax.AjaxNombre = function () {
        var nombre = document.getElementById("nombre").value;
        var divNombre = document.getElementById("divNombre");
        divNombre.innerHTML = '';
        xhttp.open("GET", "test.php?nombre=" + nombre, true);
        xhttp.send();
        xhttp.onreadystatechange = function () {
            // console.log(xhttp.readyState + " - "+xhttp.status);
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                console.log(xhttp.responseText);
                divNombre.innerHTML = xhttp.responseText;
            }
        };
    };
    TestAjax.AjaxApellido = function () {
        var apellido = document.getElementById("apellido").value;
        var divApellido = document.getElementById("divApellido");
        divApellido.innerHTML = '';
        xhttp.open("GET", "test.php?apellido=" + apellido, true);
        xhttp.send();
        xhttp.onreadystatechange = function () {
            // console.log(xhttp.readyState + " - "+xhttp.status);
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                console.log(xhttp.responseText);
                divApellido.innerHTML = xhttp.responseText;
            }
        };
    };
    TestAjax.SubirFoto = function () {
        var xhttp = new XMLHttpRequest();
        var foto = document.getElementById("foto");
        var form = new FormData();
        //Agregar atributos al formulario
        form.append('foto', foto.files[0]);
        form.append('opcion', "subirFoto");
        //Envio de peticiones mediante Ajax
        xhttp.open('POST', 'test.php', true);
        //Al ser post se debe enviar la informacion en el encabezado
        xhttp.setRequestHeader("enctype", "multipart/form-data");
        xhttp.send(form);
        //funcion callback
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                console.log(xhttp.responseText);
                var responseText = xhttp.responseText;
                var retArray = responseText.split("-");
                if (retArray[0] == "false") {
                    console.log("Error, no se ha podido subir la foto");
                }
                else {
                    console.log("Foto subida!");
                    //Establece la direccion el src desde el path que se envia desde el servidor.
                    //Ret[1] sale del split de la respuesta del servidor.
                    document.getElementById("imgFoto").src = retArray[1];
                }
            }
        };
    };
})(TestAjax || (TestAjax = {}));
//# sourceMappingURL=ajax.js.map