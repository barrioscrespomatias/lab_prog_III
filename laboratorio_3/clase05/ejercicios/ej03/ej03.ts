///<reference path="../../../ajaxClass/ajax.ts"/>


let funcion : Function  = () :void=>{
    let ajax : Ajax = new Ajax();
    let productoUno = {"codigoBarra":1111,"nombre":"Mate Pampa","precio":750};
    let productoDos = {"codigoBarra":2222,"nombre":"Termo Stanley","precio":15000};
    let productoTres = {"codigoBarra":3333,"nombre":"Pava eléctrica","precio":3500};
    let productos = {"productoUno":productoUno,"productoDos":productoDos,"productoTres":productoTres};
    ajax.Post('servidor.php', Succes,`productos=${JSON.stringify(productos)}`);
}

let Succes : Function = (cadena:string) : void =>{
    console.log("Se ha completado el proceso");
    console.log(cadena);
}
