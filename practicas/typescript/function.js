var cadena = 'Es TRUE!!';
var esVerdad = true;
var nombre = 'Matías';
var apellido = 'B Crespo';
var edad = 30;
function Mostrar2(str) {
}
// let mostrar = (str: string): void => {    
//     if(esVerdad)
//         console.log(str);
// }
// mostrar(cadena);
var opcionales = function (nombre, apellido, edad) {
    if (edad === void 0) { edad = 33; }
    if (edad)
        console.log("Su nombre es: " + nombre + ", su apellido es : " + apellido + ". Edad: " + edad);
    else
        console.log("Su nombre es: " + nombre + ", su apellido es : " + apellido + ".");
};
opcionales(nombre, apellido);
opcionales(nombre, apellido, 30);
