/// <reference path="Usuario.ts"/>

namespace Entidades{

    let usuario : Usuario = new Usuario('emp@emp.com','emp123',1,1,'empleado');
    
    let Main : Function = (): void => {

        console.log(usuario.ToString());
    }

    Main();

}