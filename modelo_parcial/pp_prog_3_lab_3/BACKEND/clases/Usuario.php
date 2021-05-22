    <?php
    include_once 'AccesoDatos.php';
    include_once 'IBM.php';


    class Usuario implements IBM
    {
        public $id;
        public $nombre;
        public $correo;
        public $clave;
        public $id_perfil;
        public $perfil;

        /**
         * Constructor con id_perfil por defecto.
         */
        public function __construct($id="",$nombre = "",$correo = "",$clave = "",$id_perfil = 2,$perfil=""){
            $this->id=$id;
            $this->nombre = $nombre;
            $this->correo = $correo;
            $this->clave = $clave;
            $this->id_perfil = $id_perfil;
            $this->perfil = $perfil;
        }

        /**
         * Retorna una cadena con nombre, correo y clave en formato JSON.
         */
        public function ToJSON()
        {
            $userStd = new stdClass();
            $userStd->nombre = $this->nombre;
            $userStd->correo = $this->correo;
            $userStd->clave = $this->clave;

            $userJson = json_encode($userStd);
            return $userJson;
        }

        /**
         * Guarda en archivo en formato JSON.
         * Si logra guardarlo (Y sus campos tienen valor), retorna True
         * sino, false.
         */
        public function GuardarEnArchivo(): bool
        {
            $retorno = false;
            $archivo = fopen('../archivos/usuarios.json', "w");
            echo $archivo;

            if (
                $this->nombre != "" &&
                $this->correo != "" &&
                $this->clave != ""
            ) {
                $exito = fwrite($archivo, $this->ToJSON() . "\r\n");
                if ($exito > 0)
                    $retorno = true;
            }
            fclose($archivo);
            return $retorno;
        }

        /**
         * Toma desde el archivo de texto los datos del usuario (JSON) y los 
         * carga en un array. Retorna un array con datos de clase Usuario.
         */
        public static function TraerTodosJSON(): array
        {
            $listaUsuarios = array();
            $userAux = new Usuario();

            $archivo = fopen('../archivos/usuarios.json', "r");

            while (!feof($archivo)) {
                $usuarioAuxiliar = new Usuario();
                $linea = fgets($archivo);

                $userStd = json_decode($linea);

                //Nuevo usuario obtenido desde archivo.json
                if (isset($userStd->nombre)) {
                    $userAux->nombre = $userStd->nombre;
                    $userAux->correo = $userStd->correo;
                    $userAux->clave = $userStd->clave;

                    //Agrega usuarios a la lista retornada
                    array_push($listaUsuarios, $userAux);
                }
            }
            return $listaUsuarios;
        }
        /**
         * Agrega usuario a la Base de datos mediante clase AccesoDatos
         */
        public function Agregar(): bool
        {
            $retorno = false;
            $objetoAccesoDato = AccesoDatos::RetornarObjetoAcceso();

            $consulta = $objetoAccesoDato->RetornarConsulta("INSERT INTO usuarios (correo,clave,nombre,id_perfil)"
                . " VALUES(:correo, :clave, :nombre, :id_perfil)");

            //bindValue asocia un valor con la clave del insert.
            // $consulta->bindValue(':id', $this->id, PDO::PARAM_INT);
            $consulta->bindValue(':correo', $this->correo, PDO::PARAM_STR);
            $consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
            $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
            $consulta->bindValue(':id_perfil', $this->id_perfil, PDO::PARAM_INT);

            $retorno = $consulta->execute();

            return $retorno;
        }

        /**
         * Trae todos los registros de la DB.
         */
        public static function TraerTodos(): array
        {
            $tablaUno = 'usuarios';
            $tablaDos = 'perfiles';

            $listaUsuarios = array();

            $objetoAccesoDatos = AccesoDatos::RetornarObjetoAcceso();

            $consulta = $objetoAccesoDatos->RetornarConsulta("SELECT $tablaUno.id, $tablaUno.nombre, $tablaUno.correo,
                                                         $tablaUno.clave,$tablaDos.descripcion AS perfil,$tablaUno.id_perfil 
            FROM $tablaUno 
            INNER JOIN $tablaDos 
            ON $tablaUno.id_perfil = $tablaDos.id");

            $consulta->execute();

            while($fila = $consulta->fetch(PDO::FETCH_OBJ)){
                $empleado = new Usuario($fila->id,
                                       $fila->nombre,
                                       $fila->correo,
                                       $fila->clave,
                                       $fila->id_perfil,
                                       $fila->perfil);

                array_push($listaUsuarios,$empleado);
            }

            

            return $listaUsuarios;
        }



        public static function TraerUno($params): Usuario
        {
            $user = new Usuario();

            $datosValidos = json_decode($params);

            $objetoAccesoDatos = AccesoDatos::RetornarObjetoAcceso();
            $consulta = $objetoAccesoDatos->RetornarConsulta('SELECT * FROM usuarios WHERE correo LIKE :correo 
                                                              AND clave LIKE :clave');
            $consulta->bindValue(':correo', $datosValidos->correo, PDO::PARAM_STR);
            $consulta->bindValue(':clave', $datosValidos->clave, PDO::PARAM_STR);

            $consulta->execute();
            $consulta->setFetchMode(PDO::FETCH_INTO, new Usuario);

            //Toma de la consulta el único item que deberia coincidir.
            foreach ($consulta as $item) {
                $user = $item;
                break;
            }
            return $user;
        }
        /**
         * Modifica un usuario en la DB con los datos de la instancia.
         * Como unico parametro recibe un ID a modificar.
         */
        public function Modificar(): bool
        {
            $retorno = false;
            $objetoAccesoDato = AccesoDatos::RetornarObjetoAcceso();


            $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE usuarios SET nombre = :nombre, correo = :correo, clave = :clave, id_perfil = :id_perfil
            WHERE usuarios.id = :id");
            // $consulta = $objetoAccesoDato->RetornarConsulta("UPDATE `usuarios` SET `nombre`='$this->nombre',`correo`='$this->correo',"
            //     . "`clave`='$this->clave',`id_perfil`='$this->id_perfil' WHERE `id`='$this->id'");


            $consulta->bindParam(':correo', $this->correo, PDO::PARAM_STR);
            $consulta->bindParam(':clave', $this->clave, PDO::PARAM_STR);
            $consulta->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
            $consulta->bindParam(':id_perfil', $this->perfil, PDO::PARAM_INT);
            $consulta->bindParam(':id', $this->id, PDO::PARAM_INT);

            $consulta->execute();
            $filasAfectadas = $consulta->rowCount();
            if ($filasAfectadas > 0)
                $retorno = true;


            return $retorno;
        }


        /**
         * Elimina el usuario por ID recibido como parámetro.
         */
        public static function Eliminar($id): bool
        {
            $retorno = false;

            $objetoAccesoDato = AccesoDatos::RetornarObjetoAcceso();

            $consulta = $objetoAccesoDato->RetornarConsulta("DELETE FROM usuarios WHERE id = :id");

            $consulta->bindValue(':id', $id, PDO::PARAM_INT);

            $retorno = $consulta->execute();


            return $retorno;
        }

        /**
         * Convierte una instancia de usuario (stdClass) a una instancia de 
         * usuario (userClass)
         */
        public static function ToUserClass($userStd): Usuario
        {
            $user = new Usuario();

            $user->id = $userStd->id;
            $user->nombre = $userStd->nombre;
            $user->correo = $userStd->correo;
            $user->clave = $userStd->clave;
            $user->id_perfil = $userStd->id_perfil;

            return $user;
        }

        /**
         * Mensaje a mostrar en las diferentes páginas.
         * Recibe un mensaje, mensaje de error y un booleano que es true, si 
         * hubo exito, sino false.
         */
        public static function Mensaje($booleano, $mensaje, $msjError): string
        {
            $retorno = new stdClass();
            $retorno->exito = false;
            $retorno->mensaje = $msjError;

            if ($booleano) {
                $retorno->exito = true;
                $retorno->mensaje = $mensaje;
            }

            $mensajeMostrar = json_encode($retorno);
            return $mensajeMostrar;
        }
    }
