"use strict";
///<reference path="../ajaxClass/ajax.ts" />
var Main;
(function (Main) {
    Main.ClickGet = function () {
        var ajax = new Ajax();
        ajax.Get('pagina.php', Succes, "name=Matias");
    };
    Main.ClickPost = function () {
        var ajax = new Ajax();
        ajax.Post('pagina.php', Succes, "apellido=Crespo");
    };
    var Succes = function (cadena) {
        alert(cadena);
    };
})(Main || (Main = {}));
//# sourceMappingURL=main.js.map