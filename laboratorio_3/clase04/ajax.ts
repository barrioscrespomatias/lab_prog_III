namespace TestAjax {
    let xhttp: XMLHttpRequest = new XMLHttpRequest();


    export let AjaxNombre: Function = (): void => {
        let nombre: string = (<HTMLInputElement>document.getElementById("nombre")).value;
        let divNombre = <HTMLDivElement>document.getElementById("divNombre");
        divNombre.innerHTML = '';

        xhttp.open("GET", `test.php?nombre=${nombre}`, true);
        xhttp.send();

        xhttp.onreadystatechange = () => {
            // console.log(xhttp.readyState + " - "+xhttp.status);

            if (xhttp.readyState == 4 && xhttp.status == 200) {
                console.log(xhttp.responseText);
                divNombre.innerHTML = xhttp.responseText;
            }
        }
    }

    export let AjaxApellido: Function = (): void => {
        let apellido: string = (<HTMLInputElement>document.getElementById("apellido")).value;
        let divApellido = <HTMLDivElement>document.getElementById("divApellido");
        divApellido.innerHTML = '';

        xhttp.open("GET", `test.php?apellido=${apellido}`, true);
        xhttp.send();

        xhttp.onreadystatechange = () => {
            // console.log(xhttp.readyState + " - "+xhttp.status);

            if (xhttp.readyState == 4 && xhttp.status == 200) {
                console.log(xhttp.responseText);
                divApellido.innerHTML = xhttp.responseText;
            }
        }
    }

    export let SubirFoto: Function = (): void => {
        let xhttp: XMLHttpRequest = new XMLHttpRequest();
        let foto:any = (<HTMLInputElement>document.getElementById("foto"));
        let form:FormData = new FormData();

        //Agregar atributos al formulario
        form.append('foto', foto.files[0]);
        form.append('opcion',"subirFoto");        

        //Envio de peticiones mediante Ajax
        xhttp.open('POST','test.php',true);

        //Al ser post se debe enviar la informacion en el encabezado
        xhttp.setRequestHeader("enctype","multipart/form-data");
        
        xhttp.send(form);

        //funcion callback
        xhttp.onreadystatechange = () => {           
          
            if(xhttp.readyState == 4 && xhttp.status == 200){
                console.log(xhttp.responseText);
                let responseText = xhttp.responseText;
                let retArray = responseText.split("-");

                if(retArray[0] == "false"){
                    console.log("Error, no se ha podido subir la foto");
                }
                else{
                    console.log("Foto subida!");
                    //Establece la direccion el src desde el path que se envia desde el servidor.
                    //Ret[1] sale del split de la respuesta del servidor.
                    (<HTMLImageElement> document.getElementById("imgFoto")).src =retArray[1];
                }

            }
        }


    }

}