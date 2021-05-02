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
    var Persona = /** @class */ (function () {
        function Persona(nombre, apellido) {
            this.nombre = nombre;
            this.apellido = apellido;
        }
        /* #region  Métodos Getter y Setter */
        Persona.prototype.GetNombre = function () {
            return this.nombre;
        };
        Persona.prototype.SetNombre = function (value) {
            this.nombre = value;
        };
        Persona.prototype.GetApellido = function () {
            return this.apellido;
        };
        Persona.prototype.SetApellido = function (value) {
            this.apellido = value;
        };
        /* #endregion */
        Persona.prototype.ToString = function () {
            return this.nombre + ", " + this.apellido;
        };
        return Persona;
    }());
    Prueba.Persona = Persona;
})(Prueba || (Prueba = {}));
/// <reference path="Persona.ts"/>
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
///<reference path="Alumno.ts"/>
var Manejador;
(function (Manejador) {
    Manejador.CrearAlumno = function () {
        var nombre = document.getElementById("nombre").value;
        var apellido = document.getElementById("apellido").value;
        var legajo = (Number)(document.getElementById("legajo").value);
        var alumno = new Prueba.Alumno(nombre, apellido, legajo);
        alert("Manejador de TypeScritp\n" + alumno.ToString());
    };
})(Manejador || (Manejador = {}));
