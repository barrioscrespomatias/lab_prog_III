"use strict";
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
//# sourceMappingURL=Persona.js.map