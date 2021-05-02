"use strict";
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
