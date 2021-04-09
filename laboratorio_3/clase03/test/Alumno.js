"use strict";
/// <reference path="Persona.ts"/>
var __extends = (this && this.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (Object.prototype.hasOwnProperty.call(b, p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        if (typeof b !== "function" && b !== null)
            throw new TypeError("Class extends value " + String(b) + " is not a constructor or null");
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var Prueba;
(function (Prueba) {
    var Alumno = /** @class */ (function (_super) {
        __extends(Alumno, _super);
        function Alumno(nombre, apellido, legajo) {
            var _this = _super.call(this, nombre, apellido) || this;
            _this.legajo = legajo;
            return _this;
        }
        /* #region  Métodos Getter y Setter */
        Alumno.prototype.GetLegajo = function () {
            return this.legajo;
        };
        Alumno.prototype.SetLegajo = function (value) {
            this.legajo = value;
        };
        /* #endregion */
        Alumno.prototype.ToString = function () {
            var datos = "";
            datos += _super.prototype.ToString.call(this);
            datos += " - Legajo :" + this.legajo;
            return datos;
        };
        return Alumno;
    }(Prueba.Persona));
    Prueba.Alumno = Alumno;
})(Prueba || (Prueba = {}));
//# sourceMappingURL=Alumno.js.map