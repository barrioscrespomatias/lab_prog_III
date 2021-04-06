<?php
session_start();
$login = isset($_SESSION['nombre']) ? $_SESSION['nombre']:"Error";

  if($login!="Error")
  {
    echo "<br><td><h1>{$_SESSION['legajo']}</h1></td></tr>";
    echo "<br><td><h2>{$_SESSION['nombre']} {$_SESSION['apellido']}</h2></td></tr>";
?>

<form>
  <table border="1px">
    <thead>
      <th colspan="12">PERSONA ENCONTRADA</th>
    </thead>
      <tr>
        <td colspan="3"><?php echo $_SESSION['legajo'] ?> </td>
        <td colspan="3"><?php echo $_SESSION['apellido'] ?> </td>
        <td colspan="3"><?php echo $_SESSION['nombre'] ?> </td>
        <td colspan="3">
          <input type="image" src="<?php echo $_SESSION['path'] ?>" width="50" height="50">
        </td>
      </tr>
    </tbody>
  </table>
</form>

<?php
  }
  else
  header('location: buscar.html');
?>



<form>
  <table border="1px">
    <thead>
      <th colspan="12">Listado de personas</th>
    </thead>
    <tbody>
      <tr>
        <th colspan="3">ID</th>
        <th colspan="3">APELLIDO</th>
        <th colspan="3">NOMBRE</th>
        <th colspan="3">FOTO</th>
      </tr>

      <?php
  
      $archivo = fopen('archivos/alumnos.txt', "r");
      while (!feof($archivo)) {

        $renglon = fgets($archivo);
        $persona = explode(" - ", $renglon);
        if ($persona[0] == NULL)
          break;

      ?>

        <tr>
          <td colspan="3"><?php echo $persona[0] ?> </td>
          <td colspan="3"><?php echo $persona[1] ?> </td>
          <td colspan="3"><?php echo $persona[2] ?> </td>
          <td colspan="3">
            <input type="image" src="<?php echo $persona[3] ?>" width="50" height="50">
          </td>
        </tr>


      <?php
      }
      fclose($archivo);
      session_unset();
      ?>


    </tbody>
  </table>
</form>