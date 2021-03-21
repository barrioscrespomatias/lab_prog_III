import * as ej07 from '../ej07/ej07.js';
import * as ej08 from '../ej08/ej08.js';

let factorialCubo: Function = (numero: number): void => {

    let retorno: number = 0;
    if (numero != null) {
        if (numero > 0)
            retorno = ej08.factorial(numero);
        else
            retorno = ej07.numerosPrimos(numero*-1);
    }
    if(retorno>0)
    console.log(retorno);    
}

factorialCubo(5);
