/**
 * Genera objeto de tipo Ajax. Métodos GET, POST y SubirFotoPost
 */
class Ajax {

    private xhttp: XMLHttpRequest;

    public constructor() {
        this.xhttp = new XMLHttpRequest();
    }

    /**
     * 
     * @param ruta ruta del servidor backend php
     * @param success funcion mediante la cual se muestra un mensaje
     * @param params parametros que se van a enviar por POST. 'atributo=valor&...'
     * @param error funcion que se utiliza en caso de error para mostra un mensaje.
     */
    public Get: Function = (ruta: string, success: Function, params: string = "", error?: Function): void => {

        let parametros: string = "";
        if (params.length > 0) {
            parametros = params;
            ruta += "?" + parametros;
        }

        this.xhttp.open("GET", ruta, true);
        this.xhttp.send();

        this.xhttp.onreadystatechange = () => {
            if (this.xhttp.readyState == 4) {
                if (this.xhttp.status == 200) {
                    success(this.xhttp.responseText);
                }
                else if (error !== undefined) {
                    error(this.xhttp.status);
                }
            }
        }
    }
     /**
     * 
     * @param ruta ruta del servidor backend php
     * @param success funcion mediante la cual se muestra un mensaje
     * @param params parametros que se van a enviar por POST. 'atributo=valor&...'
     * @param error funcion que se utiliza en caso de error para mostra un mensaje.
     */
    public Post: Function = (ruta: string, success: Function, params: string, error?: Function, idFile?: string): void => {
        let parametros: string = "";
        if (params.length > 0)
            parametros = params;
        
        console.log(parametros);
        
        this.xhttp.open("POST", ruta, true);
        this.xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        this.xhttp.send(parametros);

        this.xhttp.onreadystatechange = () => {
            if (this.xhttp.readyState == 4) {
                if (this.xhttp.status == 200) {
                    success(this.xhttp.responseText);
                }
                else if (error !== undefined) {
                    error(this.xhttp.status);
                }
            }
        }
        
    
    }

    /**
     * 
     * @param ruta ruta del servidor backend php
     * @param success funcion mediante la cual se muestra un mensaje
     * @param params parametros que se van a enviar por POST. 'atributo=valor&...'
     * @param error funcion que se utiliza en caso de error para mostra un mensaje.
     */
    public EnviarFormulario: Function = (ruta: string, success: Function, params: Array<any>, error?: Function, idFile?: string): void => {
        
        let form : FormData = new FormData();

        let archivo : any = document.getElementById("txtFoto");       



        //Atributos en forma de Json.
        form.append('empleado', JSON.stringify(params[0]));
        form.append('txtFoto', archivo.files[0]);
        form.append('opcion', params[1].opcion);

        //Envio de peticiones mediante Ajax
        this.xhttp.open('POST', ruta, true);

        //Al ser post se debe enviar la informacion en el encabezado
        this.xhttp.setRequestHeader("enctype", "multipart/form-data");

        this.xhttp.send(form);



        // this.xhttp.open("POST", ruta, true);
        // this.xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        // this.xhttp.send(parametros);

        this.xhttp.onreadystatechange = () => {
            if (this.xhttp.readyState == 4) {
                if (this.xhttp.status == 200) {
                    success(this.xhttp.responseText);                    
                }
                else if (error !== undefined) {
                    error(this.xhttp.status);
                }
            }

        }

        

    }



    /**
     * Envia un file de tipo IMG al servidor.
     * @param ruta ruta del servidor
     * @param success funcion que informa por consola/alert
     * @param idFile ID del atributo FILE del HTML
     * @param idImg ID del atributo IMG del HTML
     * @param error Funcion que se llama en caso de error. Opcional
     */
    public SubirFotoPost: Function = (ruta: string, success: Function, idFile: string, idImg: string, error?: Function): void => {

        let foto: any = (<HTMLInputElement>document.getElementById(idFile));
        let form: FormData = new FormData();

        //Agregar atributos al formulario
        form.append('foto', foto.files[0]);
        form.append('opcion', "subirFoto");

        //Envio de peticiones mediante Ajax
        this.xhttp.open('POST', ruta, true);

        //Al ser post se debe enviar la informacion en el encabezado
        this.xhttp.setRequestHeader("enctype", "multipart/form-data");

        this.xhttp.send(form);

        //funcion callback
        this.xhttp.onreadystatechange = () => {

            if (this.xhttp.readyState == 4 && this.xhttp.status == 200) {
                console.log(this.xhttp.responseText);
                let responseText = this.xhttp.responseText;
                let retArray = responseText.split("-");

                if (retArray[0] == "false") {
                    console.log("Error, no se ha podido subir la foto");
                }
                else {
                    console.log("Foto subida!");
                    //Establece la direccion el src desde el path que se envia desde el servidor.
                    //Ret[1] sale del split de la respuesta del servidor.
                    (<HTMLImageElement>document.getElementById(idImg)).src = retArray[1];
                }

            }
        }


    }

    public ModificarParrafo: Function = (cadena: string): void => {


    }

}

