///<reference path="../../../node_modules/@types/jquery/index.d.ts"/>
$(function () {
    JqueryAjaxTraerTodos();
    EliminarDiv();
});
function JqueryAjaxTraerTodos() {
    var pagina = "../back/entidades/mibackend.php";
    var datoObjeto = { "opcion": "traerDato" };
    $("#divResultado").html("");
    $.ajax({
        type: 'POST',
        url: pagina,
        dataType: "json",
        data: datoObjeto,
        async: true
    })
        .done(function (resultado) {
        $("#divResultado").html(resultado.mensaje);
        console.log(typeof (resultado));
        MostrarPorConsola(resultado);
    })
        .fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });
}
function EliminarDiv() {
    $("#bntEliminarDiv").on("click", function () {
        $("#divResultado").remove();
        $("#bntEliminarDiv").remove();
    });
}
function MostrarPorConsola(dato) {
    console.log(dato);
}
