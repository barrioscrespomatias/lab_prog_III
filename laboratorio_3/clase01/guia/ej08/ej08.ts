//FACTORIAL

export let factorial: Function = (numeroIngresado: number): number => {
    var retorno: number = 0;
    let i: number = numeroIngresado;
    for (i; i > 1; i--) {
        if (i == numeroIngresado) {
            retorno = i * (i - 1);
        }
        ///Se rompe en i=2 ya que sino muestra dos veces el último valor.
        //Se trabaja con la resta de la variable i. El valor local de i va a ser
        //menor que el valor de iteracion en el bucle for.
        else if (i == 2) {
            break;
        } else {
            retorno *= (i - 1);
        }
        console.log(retorno);
    }
    return retorno;
}

// factorial(5);