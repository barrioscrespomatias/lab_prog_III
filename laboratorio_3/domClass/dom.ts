class Dom{

    /**
     * Toma por id desde el html y retorna un elemento de tipo HTMLInputElement
     * @param id ID del HTML
     * @returns retorna un HTMLInputElement
     */
    public static ObtenerPorId:Function = (id:string):HTMLInputElement=>{
        let valor:HTMLInputElement = <HTMLInputElement>document.getElementById(id);
        return valor;
    }

}