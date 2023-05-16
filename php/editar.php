<?php
//------------------------------------------------------------------------
//este codigo trae la informacion de la tabla cursos para mostrarla en la
//seleccion del curso.
include("conexionsql.php");
$sql = "SELECT * FROM cursos";
$resultado = mysqli_query($conexionsql, $sql);
//------------------------------------------------------------------------
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Actualizar</title>
</head>

<body>
    <?php
    if (isset($_POST['actualizar'])) {
        //cuando se orpime el boton de actualizar
        $id = $_POST['id'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $ficha = $_POST['ficha'];

        $sql = "UPDATE aprendiz SET 
       nombres = '$nombres', 
       apellidos = '$apellidos',
       ficha = '$ficha' WHERE id = '$id'";
        $ress = mysqli_query($conexionsql, $sql);

        if ($ress) {
            //mensaeje para exitoso
            echo "<script>
            alert('Actualizacion exitosa');
            location.assign('../index.php');
            </script>";
        } else {
            //mensaeje para fallido
            echo "<script>
            alert('ERROR: Actualizacion no exitosa');
            location.assign('../index.php');
            </script>";
        }
        mysqli_close($conexionsql);
    } else {
        //cuando no se orpime el boton de actualizar
        // llena todos los campos con la informacion de la persona
        //que se va actualizar
        $id = $_GET['id'];
        $sql = "SELECT * FROM aprendiz WHERE id='" . $id . "'";
        $ress = mysqli_query($conexionsql, $sql);
        $fila = mysqli_fetch_assoc($ress);

        $nombres = $fila["nombres"];
        $apellidos = $fila["apellidos"];

        mysqli_close($conexionsql);
    ?>
        <h1>Actualizar informacion del aprendiz</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label>Nombres:</label>
            <input type="text" name="nombres" value="<?php echo $nombres; //esto llena el campo de texto con la informacion que viene
                                                        ?>"> <br>
            <label>Apellidos:</label>
            <input type="text" name="apellidos" value="<?php echo $apellidos; ?>" required><br>
            <input type="hidden" name="id" value="<?php echo $id; //se guarda id oculto
                                                    ?>">
            <label>Seleccione el curso</label>
            <select name="ficha">
                <?php
                while ($cursos = mysqli_fetch_assoc($resultado)) {
                ?>
                    <option value=<?php echo $cursos['ficha'] ?>><?php echo $cursos['nombre_curso'] ?></option>

                <?php
                }
                ?>
            </select>
            <input type="submit" name="actualizar" value="Actualizar">
            <a href="../index.php">Regresar</a>
        </form>
    <?php
    }
    ?>
</body>

</html>