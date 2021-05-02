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
var People;
(function (People) {
    var Persona = /** @class */ (function () {
        function Persona(nombre, apellido, dni, sexo) {
            this._apellido = apellido;
            this._dni = dni;
            this._nombre = nombre;
            this._sexo = sexo;
        }
        Persona.prototype.GetApellido = function () {
            return this._apellido;
        };
        Persona.prototype.GetNombre = function () {
            return this._nombre;
        };
        Persona.prototype.GetSexo = function () {
            return this._sexo;
        };
        Persona.prototype.GetDni = function () {
            return this._dni;
        };
        //retorna los datos de la persona.
        Persona.prototype.ToString = function () {
            var cadena = "";
            cadena += this._apellido + "-" + this._nombre + "-" + this._dni + "-" + this._sexo;
            return cadena;
        };
        return Persona;
    }());
    People.Persona = Persona;
})(People || (People = {}));
///<reference path="persona.ts" />
var People;
(function (People) {
    var Empleado = /** @class */ (function (_super) {
        __extends(Empleado, _super);
        function Empleado(nombre, apellido, dni, sexo, legajo, sueldo) {
            var _this = _super.call(this, nombre, apellido, dni, sexo) || this;
            _this._legajo = legajo;
            _this._sueldo = sueldo;
            return _this;
        }
        /* #region  METODOS GETTERS */
        Empleado.prototype.GetLegajo = function () {
            return this._legajo;
        };
        Empleado.prototype.GetSueldo = function () {
            return this._sueldo;
        };
        /* #endregion */
        Empleado.prototype.Hablar = function (idioma) {
            var cadena = "";
            cadena += "El empleado habla " + idioma + ".";
            return cadena;
        };
        Empleado.prototype.ToString = function () {
            var cadena = "";
            cadena = _super.prototype.ToString.call(this);
            cadena += "-" + this._legajo + "-" + this._sueldo + ".";
            return cadena;
        };
        return Empleado;
    }(People.Persona));
    People.Empleado = Empleado;
})(People || (People = {}));
///<reference path="empleado.ts" />
var Main;
(function (Main) {
    var p1 = new People.Empleado("Juan", "Fernandez", 1111, "M", 1111, 10000);
    console.log("Datos del empleado:");
    console.log(p1.ToString());
    var idioma = "Italiano";
    p1.Hablar(idioma);
    console.log("Nombre:");
    console.log(p1.GetNombre());
    console.log("Sueldo:");
    console.log(p1.GetSueldo());
})(Main || (Main = {}));
