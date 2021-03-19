var meses: string[];
let cantidad: number;
var i: number=0;

meses =
    [
        "Enero",
        "Febrero",
        "Marzo",
        "Abril",
        "Mayo",
        "Junio",
        "Julio",
        "Agosto",
        "Septiembre",
        "Octubre",
        "Noviembre",
        "Diciembre"
    ];
cantidad=meses.length;

for(i;i<cantidad;i++)
{
    console.log(`Estamos en el mes de ${meses[i]}. Le corresponde el número ${i+1}.`);

}