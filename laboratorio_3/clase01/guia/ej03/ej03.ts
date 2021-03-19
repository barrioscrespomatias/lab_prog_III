let myFunction:Function = (requerido:number, opcional?:string):number=>
{
    let retorno:number = requerido;

    if (opcional) {
        for (let i = 0; i < requerido; i++) {
            console.log(opcional);
        }
    }
    else{
        retorno=requerido*-1;
        console.log(retorno);        
    }
    return retorno;

}


myFunction(10,"Gato");