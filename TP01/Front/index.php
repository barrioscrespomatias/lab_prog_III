<?php
session_start();

include_once '../Back/entidades/fabrica.php';
include_once '../Back/entidades/empleado.php';
include_once '../Back/verificarUsuario.php';

$pathArchivo = '../Back/archivos/empleados.txt';

$valorDniEmpleado = isset($_POST['inputHidden']) ? $_POST['inputHidden'] : "Error";
$opcion = isset($_POST['opcion']) ? $_POST['opcion'] : 'Error';
// $valorDniEmpleado = isset($_POST['dniModificar']) ? $_POST['dniModificar'] : "Error";


// $accion= isset($_POST['accion']) ? $_POST['accion'] : "Error";
// echo $accion;







// if ($valorDniEmpleado != "Error") {


//     $fabrica = new Fabrica("La fabriquita");
//     $fabrica->SetCantidadMaxima = 7;
//     $fabrica->TraerDeArchivo($pathArchivo);
//     $indice = IndiceEmpleado($fabrica, $valorDniEmpleado);
//     $empleadoAuxiliar = array();

//     if ($indice != -1) {
//         $arrayEmpleados = $fabrica->GetEmpleados();
//         //Le reconvierte a su tipo, en este caso a OBJETO EMPLEADO.
//         $empleadoAuxiliar =  $arrayEmpleados[$indice];
//     }
// }


// function IndiceEmpleado($fabrica, $dniEmpleado): int
// {
//     $contador = 0;
//     foreach ($fabrica->GetEmpleados() as $item) {
//         if ($item->GetDni() == $dniEmpleado) {
//             $indiceEmpleado = $contador;
//             break;
//         }
//         $contador++;
//     }
//     return $indiceEmpleado;
// }



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <!-- <script src="./javascript/validaciones.js"></script> -->
    <script src="./javascript/manejadorPdo.js"></script>
    <title>HTML 5 - Formulario Modificar Empleado</title>

</head>


<body onload="Main.MostrarEmpleados()">


    <?php if ($valorDniEmpleado != "Error")
        echo "<h2>Modificar Empleado</h2>";
    else
        echo "<h2>Alta Empleado</h2>";
    ?>


    <!-- <form action='../Back/administracion.php' method="POST" enctype="multipart/form-data" onsubmit="return AdministrarValidaciones()"> -->
    <!-- <form method="POST" enctype="multipart/form-data" onsubmit="return AdministrarValidaciones()">  -->
    <table align="center">
        <thead>
            <td colspan="12">
                <h4>Datos Personales</h4>
            </td>
        </thead>
        <tbody>
            <tr>
                <td colspan="12">
                    <hr />
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <label for="txtDni">DNI:</label>
                </td>
                <td colspan="6">
                    <?php if ($valorDniEmpleado != "Error")
                        echo '<input type="number" name="txtDni" id="txtDni" max="55000000" min="1000000" readonly value=' . $empleadoAuxiliar->GetDni() . '>';
                    else
                        echo '<input type="number" name="txtDni" id="txtDni" max="55000000" min="1000000">';
                    ?>

                    <span style="display: none;" id="txtDniError">*</span>
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <label for="txtApellido">Apellido:</label>
                </td>
                <td colspan="3">
                    <?php if ($valorDniEmpleado != "Error") {
                        echo '<input type="text" name="txtApellido" id="txtApellido" value=' . $empleadoAuxiliar->GetApellido() . '>';
                        echo '<span style="display: none;" id="txtApellidoError">*</span>';
                    } else
                        echo '<input type="text" name="txtApellido" id="txtApellido" value="">';
                    ?>

                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <label for="txtNombre">Nombre:</label>
                </td>
                <td colspan="3">
                    <?php if ($valorDniEmpleado != "Error") {
                        echo '<input type="text" name="txtNombre" id="txtNombre" value=' . $empleadoAuxiliar->GetNombre() . '>';
                        echo '<span style="display: none;" id="txtNombreError">*</span>';
                    } else
                        echo '<input type="text" name="txtNombre" id="txtNombre" value="">';
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <label for="cboSexo">Sexo:</label>
                </td>
                <td colspan="6">
                    <select name="cboSexo" id="cboSexo">
                        <option value="---">Seleccione</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                    <span style="display: none;" id="cboSexoError">*</span>
                </td>

            </tr>
            <tr>
                <th colspan="12">
                    <h4>Datos Laborales</h4>
                </th>
            </tr>
            <tr>
                <td colspan="12">
                    <hr />
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <label for="txtLegajo">Legajo:</label>
                </td>
                <td colspan="3">
                    <?php if ($valorDniEmpleado != "Error") {
                        echo '<input type="number" id="txtLegajo" name="txtLegajo" min="100" max="550" readonly value=' . $empleadoAuxiliar->GetLegajo() . '>';
                        echo '<span style="display: none;" id="txtLegajoError">*</span>';
                    } else
                        echo '<input type="number" id="txtLegajo" name="txtLegajo" min="100" max="550" value="" >';
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <label for="txtSueldo">Sueldo:</label>
                </td>
                <td colspan="6">
                    <?php if ($valorDniEmpleado != "Error") {
                        echo '<input type="number" name="txtSueldo" id="txtSueldo" min="8000" max="25000" step="500" value=' . $empleadoAuxiliar->GetSueldo() . '>';
                        echo '<span style="display: none;" id="txtSueldoError">*</span>';
                    } else
                        echo '<input type="number" name="txtSueldo" id="txtSueldo" min="8000" max="25000" step="500" value="">';
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="12 ">
                    <label for="rdoTurno">Turno:</label>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="right">
                    <input type="radio" name="rdoTurno" value="Mañana" id="" checked>
                </td>
                <td colspan="9">
                    <label for="rdoTurno">Mañana</label>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="right">
                    <input type="radio" value="Tarde" name="rdoTurno" id="">
                </td>
                <td colspan="9">
                    <label for="rdoTurno">Tarde</label>
                </td>

            </tr>
            <tr>
                <td colspan="3" align="right">
                    <input type="radio" value="Noche" name="rdoTurno" id="">

                </td>
                <td colspan="9">
                    <label for="rdoTurno">Noche</label>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <label for="txtFoto">Foto:</label>
                </td>
                <td colspan="6">
                    <?php if ($valorDniEmpleado != "Error") {
                        echo '<input type="file" name="txtFoto" id="txtFoto" value=' . $empleadoAuxiliar->GetPathFoto() . '>';
                        echo '<span style="display: none;" id="txtFotoError">*</span>';
                    } else
                        echo '<input type="file" name="txtFoto" id="txtFoto" value="">';
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="12">
                    <hr />
                </td>
            </tr>
            <tr>
                <td colspan="12" id="btnLimpiar">
                    <input type="reset" name="btnLimpiar" value="Limpiar">
                </td>
            </tr>
            <tr>
                <!-- Se modificar la opcion del enviar mediante la opcion de accion. "Modificar" o "Enviar"                 -->

                <td colspan="12" id="botonEnviar">
                    <input type="button" value="Enviar" id="btnEnviar" onclick="Main.TomarDatos('<?php echo ($valorDniEmpleado == 'Error') ? 'Enviar' : 'Modificar' ?>')">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="inputHidden" id="inputHidden" value="">
                </td>
            </tr>
            <tr>
                <div class="mostrar">
                    <p id="divMostrar"></p>
                </div>
            </tr>
        </tbody>
    </table>
    </form>

</body>

</html>