let letraExistente: Function = (str: string, letra: string): boolean => {
    let retorno: boolean = false;
    if(str.length>0){
        for (i = 0; i < str.length; i++) {
            if (letra == str[i]) {
                retorno = true;
                break;
            }
        }
    }
    
    return retorno;
}



let i: number = 0;
let contador: number = 0;
let cadena: string = "AABA";
let letra: string = "";
let cadenaAuxiliar: string = "";
let letraExiste: boolean;


//Recorro las letras desde la primera
for (i; i < cadena.length; i++) {
    letra = cadena[i];

    letraExiste = letraExistente(cadenaAuxiliar, letra);
    if (letraExiste == false)
        cadenaAuxiliar += letra;
}
console.log(cadenaAuxiliar);





