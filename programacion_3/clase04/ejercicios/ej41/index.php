<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form>
            <table border="1px">
                <thead>
                    <th colspan="12">Carga de archivos</th>
                </thead>
                <th>
                    <!-- Se va a repetir -->
                    <?php foreach($_SESSION['destinos'] as $item){ ?>
                <td colspan="3">
                    <img src="<?php echo $item ?>" alt="" height="100" width="100">
                </td>
                    <?php }?>
                </th>
            </table>
        </form>

        <form action="ej41.php" method="POST" enctype="multipart/form-data">
            <table border="1px">
                <thead>
                    <th colspan="12">Subí tu archivo</th>
                </thead>
                <th>
                <td colspan="12">
                    <input type="file" name="fotos[]" id="" multiple accept="image/png,.jpg,image/gif">
                </td>
                </th>
                <th>
                    <input type="submit" value="Enviar">
                </th>

            </table>
        </form>

    </div>

</body>

</html>