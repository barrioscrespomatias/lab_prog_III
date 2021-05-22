/// <reference path="../../../node_modules/@types/jquery/index.d.ts" />
$(function () {
    JqueryAjaxTraerCds();
    $("#divModificar").hide();
    CargarEventoModificar();
});
function JqueryAjaxTraerCds() {
    var pagina = "BACKEND/POO/nexo.php";
    var datoObjeto = { "op": "traerListadoCD" };
    $("#divResultado").html("");
    $.ajax({
        type: 'POST',
        url: pagina,
        dataType: "text",
        data: datoObjeto,
        async: true
    })
        .done(function (resultado) {
        $("#divResultado").html(resultado);
        manejador_click_btn_eliminar();
        manejador_click_btn_modificar();
    })
        .fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });
}
function manejador_click_btn_eliminar() {
    var $btn = $('[data-action="btn_eliminar"]');
    if ($btn) {
        $btn.on('click', function (e) {
            e.preventDefault();
            var obj_cd_string = $(this).attr("data-obj");
            var obj_cd;
            if (obj_cd_string !== undefined) {
                obj_cd = JSON.parse(obj_cd_string);
                var confirma = confirm("\u00BFEliminar: " + obj_cd.titulo + " - " + obj_cd.anio + "?");
                if (!confirma) {
                    return;
                }
            }
            else {
                console.log("no se recupero el json");
                return;
            }
            var data = [];
            data.push({ name: "id_cd", value: obj_cd.id });
            data.push({ name: "op", value: "eliminarCd" });
            $.post("./BACKEND/POO/nexo.php", data, function (rta) {
                console.log(rta);
                if (rta.exito) {
                    $("#divResultado").empty();
                    JqueryAjaxTraerCds();
                }
            }, "json").fail(function (a) {
                console.log(a.responseText);
            });
        });
    }
}
function manejador_click_btn_modificar() {
    var $btn = $('[data-action="btn_modificar"]');
    if ($btn) {
        $btn.on('click', function (e) {
            e.preventDefault();
            var obj_cd_string = $(this).attr("data-obj");
            var obj_cd;
            if (obj_cd_string !== undefined) {
                obj_cd = JSON.parse(obj_cd_string);
                var confirma = confirm("\u00BFModificar " + obj_cd.titulo + " - " + obj_cd.anio + "?");
                if (!confirma) {
                    return;
                }
            }
            else {
                console.log("no se recupero el json");
                return;
            }
            $("#divModificar").show();
            var btnModificar = $("#btnModificar").val;
            if (btnModificar !== undefined) {
                obj_cd.id = obj_cd.id;
                obj_cd.titulo = $("#titulo").val;
                obj_cd.interprete = $("#interprete").val;
                obj_cd.anio = $("#anio").val;
                var data = [];
                data.push({ name: "cd", value: obj_cd });
                data.push({ name: "op", value: "modificarCd_json" });
                $.post("./BACKEND/POO/nexo.php", data, function (rta) {
                    console.log(rta);
                    if (rta.exito) {
                        $("#divResultado").empty();
                        JqueryAjaxTraerCds();
                    }
                }, "json").fail(function (a) {
                    console.log(a.responseText);
                });
            }
        });
    }
}
function CargarEventoModificar() {
    $("btnModificar").on("click", function () {
        $("#btnModificar").val("Modificar");
    });
}
