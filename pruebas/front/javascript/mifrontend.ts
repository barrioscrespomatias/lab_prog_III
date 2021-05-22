///<reference path="../../../node_modules/@types/jquery/index.d.ts"/>


$(function(){

    JqueryAjaxTraerDato();
    EliminarDiv();
    

});

function JqueryAjaxTraerDato():void {

    let pagina = "../back/entidades/mibackend.php";
    let datoObjeto = {"opcion" : "traerDato" };
  
    $("#divResultado").html("");

    $.ajax({
        type: 'POST',
        url: pagina,
        dataType: "json",
        data: datoObjeto,
        async: true
    })
    .done(function (resultado:any) {

        $("#divResultado").html(resultado.mensaje);
        console.log(typeof(resultado))

        MostrarPorConsola(resultado);
    })
    .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });    
}

function EliminarDiv () {
    $("#bntEliminarDiv").on("click",function(){
        $("#divResultado").remove();
        $("#bntEliminarDiv").remove();
        
    });
}

function MostrarPorConsola(dato:string)
{
    console.log(dato);
}