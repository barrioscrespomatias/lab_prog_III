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
var Entidades;
(function (Entidades) {
    var Persona = /** @class */ (function () {
        function Persona(correo, clave, nombre) {
            this.correo = correo;
            this.clave = clave;
            this.nombre = "";
        }
        Persona.prototype.ToString = function () {
            var retorno = '';
            if (this.nombre != "")
                retorno = "{\"nombre\":" + this.nombre + ", \"correo\":" + this.correo + ", \"clave\":" + this.clave + "}";
            else
                retorno = "\"correo\":" + this.correo + ", \"clave\":" + this.clave + "}";
            return retorno;
        };
        Persona.prototype.ToJSON = function () {
            return JSON.parse(this.ToString());
        };
        return Persona;
    }());
    Entidades.Persona = Persona;
})(Entidades || (Entidades = {}));
/// <reference path="Persona.ts"/>
var Entidades;
(function (Entidades) {
    var Usuario = /** @class */ (function (_super) {
        __extends(Usuario, _super);
        function Usuario(correo, clave, id, id_perfil, perfil, nombre) {
            var _this = _super.call(this, correo, clave) || this;
            _this.id = id;
            _this.id_perfil = id_perfil;
            _this.perfil = perfil;
            ;
            return _this;
        }
        Usuario.prototype.ToString = function () {
            var retorno = "";
            retorno += _super.prototype.ToString.call(this);
            retorno += "{\"id\":" + this.id + ", \"id_perfil\":" + this.id_perfil + ", \"perfil\":" + this.perfil + "}";
            return retorno;
        };
        Usuario.prototype.ToJSON = function () {
            // let json:JSON += super.ToJSON();
            return JSON.parse(this.toString());
        };
        return Usuario;
    }(Entidades.Persona));
    Entidades.Usuario = Usuario;
})(Entidades || (Entidades = {}));
/// <reference path="Usuario.ts"/>
var Entidades;
(function (Entidades) {
    var usuario = new Entidades.Usuario('emp@emp.com', 'emp123', 1, 1, 'empleado');
    var Main = function () {
        console.log(usuario.ToString());
    };
    Main();
})(Entidades || (Entidades = {}));
