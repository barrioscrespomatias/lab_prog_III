"use strict";
/// <reference path="Alumno.ts"/>
var TestPrueba;
(function (TestPrueba) {
    var main = function () {
        var personas = [
            new Prueba.Alumno("Juan", "Fernandez", 25),
            new Prueba.Alumno("Andrés", "Rodriguez", 30),
            new Prueba.Alumno("Charly", "García", 30),
        ];
        personas.forEach(function (element) {
            console.log(element.ToString() + "\n");
        });
    };
    main();
})(TestPrueba || (TestPrueba = {}));
//# sourceMappingURL=main.js.map