
/* #region  VALIDACIONES */

let AdministrarValidaciones: Function = (): void => {

    /* #region  DNI */
    console.log(`Corroborando que el campo DNI no se encuentre vacío`);
    if (!ValidarCamposVacios("txtDni")) {
        console.log("Ok...\n");

        let valorDni: number = parseInt((<HTMLInputElement>document.getElementById("txtDni")).value);
        console.log("Corroborando que el valor del DNI se encuentre entre los parámetros correctos");
        if (ValidarRangoNumerico(valorDni, 1000000, 55000000))
            console.log("Ok...\n");
        else
            alert(`El dni ${valorDni} se encuentra fuera de los parámetros correctos: 1.000.000 - 55.000.000`);
    }
    else
        alert(`Error\nEl campo DNI está vacío`);

    /* #endregion */

    /* #region  APELLIDO */
    console.log(`Corroborando que el campo Apellido no se encuentre vacío`);
    let apellido: string = (<HTMLInputElement>document.getElementById("txtApellido")).value;

    if (!ValidarCamposVacios("txtApellido")) {
        console.log(`Ok...\n`);
        console.log(`Corroborando que el campo Apellido contenga solo letras`);
        if (!ValidarLetras(apellido))
            alert(`Error\nEl campo Apellido no contiene solo letras`);
        else
            console.log(`Ok...\n`);
    }
    else
        alert(`Error\nEl campo Apellido está vacío`);

    /* #endregion */

    /* #region  NOMBRE */
    console.log(`Corroborando que el campo Nombre no se encuentre vacío`);
    let nombre: string = (<HTMLInputElement>document.getElementById("txtNombre")).value;

    if (!ValidarCamposVacios("txtNombre")) {
        console.log(`Ok...\n`);
        console.log(`Corroborando que el campo Nombre contenga solo letras`);
        if (!ValidarLetras(nombre))
            alert(`Error\nEl campo Nombre no contiene solo letras`);
        else
            console.log(`Ok...\n`);
    }
    else
        alert(`Error\nEl campo Nombre está vacío`);
    /* #endregion */

    /* #region  LEGAJO */
    console.log(`Corroborando que el campo Legajo no se encuentre vacío`);
    if (!ValidarCamposVacios("txtLegajo")) {
        console.log(`Ok...\n`);

        let valorLegajo: number = parseInt((<HTMLInputElement>document.getElementById("txtLegajo")).value);
        console.log("Corroborando que el valor del Legajo se encuentre entre los parámetros correctos");
        if (ValidarRangoNumerico(valorLegajo, 100, 550))
            console.log("Ok...\n");
        else
            alert(`El LEGAJO ${valorLegajo} se encuentra fuera de los parámetros correctos: 100 - 550`);
    }
    else
        alert(`Error\nEl campo Legajo está vacío`);
    /* #endregion */

    /* #region  SUELDO y TURNO */
    console.log(`Corroborando que el campo Sueldo se encuentre vacío`);
    if (!ValidarCamposVacios("txtSueldo")) 
    {
        console.log(`Ok...\n`);

        let valorSueldo: number = parseInt((<HTMLInputElement>document.getElementById("txtSueldo")).value);
        let valorCboTurno: string = ObtenerTurnoSeleccionado();
        let sueldoMaximo:number=ObtenerSueldoMaximo(valorCboTurno);

        console.log("Corroborando que el valor del Sueldo se encuentre entre los parámetros correctos");        

        if (ValidarRangoNumerico(valorSueldo, 8000, sueldoMaximo))
            console.log("Ok...\n");
        else
            alert(`El SUELDO ${valorSueldo} se encuentra fuera de los parámetros correctos segun el turno ${valorCboTurno}: $8000 - $${sueldoMaximo}`);
                
    }
    else
        alert(`Error\nEl campo Sueldo está vacío`);
    /* #endregion */

    /* #region  SEXO */
    console.log(`Corroborando que el campo Sexo sea correcto`);
    let valorCombo = (<HTMLInputElement>document.getElementById("cboSexo")).value;

    if (ValidarCombo(valorCombo, "---"))
        console.log(`Ok...\n`);
    else
        alert(`Error\nEl campo Sexo no se ha seleccionado`);
    /* #endregion */

    /* #endregion */

}

// Corrobora que un campo esté vacío.
// Si está vacío retorna true, sino false.
let ValidarCamposVacios: Function = (cadena: string): boolean => {
    let retorno: boolean = false;
    let campoStr: string = (<HTMLInputElement>document.getElementById(cadena)).value;
    if (campoStr.length == 0)
        retorno = true;

    return retorno;
}
//Valida un rango numérico. 
// Si el valor ingresado se encuentra dentro de los parámetros esperados
// del mínimo y el máximo, retorna true, sino false.
let ValidarRangoNumerico: Function = (valor: number, minimo: number, maximo: number): boolean => {
    let retorno: boolean = false;
    if (valor >= minimo && valor <= maximo && valor != null && valor != NaN)
        retorno = true;

    return retorno;
}

//Valida que el valor seleccionado del combobox sea distinto de un valor pasado como parámetro
// retorna true si es distinto, sino false
let ValidarCombo: Function = (valorCombo: string, valorComboIncorrecto: string): boolean => {

    let retorno: boolean = false;
    if (valorCombo != valorComboIncorrecto)
        retorno = true;

    return retorno;

}

let ObtenerTurnoSeleccionado: Function = (): string => {
    let retorno: string = "";
    let valorRdio: NodeListOf<HTMLElement> = document.getElementsByName("rdoTurno");

    valorRdio.forEach(element => {
        if ((<HTMLInputElement>element).checked)
            retorno += (<HTMLInputElement>element).value;
    });


    return retorno;
}

let ObtenerSueldoMaximo: Function = (turno: string): number => {
    let sueldoMaximo: number = 0;
    switch (turno) {
        case "Mañana":
            sueldoMaximo = 20000;
            break;
        case "Tarde":
            sueldoMaximo = 18500;
            break;
        case "Noche":
            sueldoMaximo = 25000;
            break;
    }
    return sueldoMaximo;
}

///Valida que un string ingresa sea solo letras.
let ValidarLetras: Function = (str: string): boolean => {
    let retorno: boolean = false;
    let cantidadStr = str.length;

    //Toma como letras a las que van desde la a hasta la z y las vocales con acento
    //Además con el caracter especial \s tiene en cuenta los espacios.
    //Si pusiera \S no tendría en cuenta los espacios.
    //g: global, es decir que tiene en cuenta a toda la cadena.
    //i: Tiene en cuenta tanto las mayúsculas como las minúsculas

    let letrasIngresadas: RegExpMatchArray | null = str.match(/[A-ZÁ-Ú\s]/gi);
    if (letrasIngresadas != null)
        if (cantidadStr == letrasIngresadas.length)
            retorno = true;

    return retorno;
}

