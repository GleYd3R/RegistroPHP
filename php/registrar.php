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
    <title>Regristrar</title>
</head>

<body>
    <?php
    //se recibe la informacion que envia el boton guardar
    if (isset($_POST['guardar'])) {
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $ficha = $_POST['ficha'];
        // se realiza la sentencia SQL para insertar los datos que vienen de los campos nombres
        // apellidos y ficha
        $info = "INSERT INTO aprendiz(nombres,apellidos,ficha)
        VALUES('" . $nombres . "','" . $apellidos . "','" . $ficha . "')";
        $ress = mysqli_query($conexionsql, $info);
        if ($ress) {
            //mensaeje para registro exitoso
            echo "<script>
            alert('Registro exitoso');
            location.assign('../index.php');
            </script>";
        } else {
            //mensaeje para registro fallido
            echo "<script>
            alert('ERROR: Registro no exitoso');
            location.assign('../index.php');
            </script>";
        }
        mysqli_close($conexionsql);
    }
    ?>
    <h1>Registrar aprendiz</h1>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <label>Nombres:</label>
        <input type="text" name="nombres" required>
        <label>Apellidos:</label>
        <input type="text" name="apellidos" required>
        <label>Seleccione el curso</label>

        <select name="ficha">
            <?php
            while ($cursos = mysqli_fetch_assoc($resultado)) {
            ?>
                <option value=<?php echo $cursos['ficha'] ?>><?php echo $cursos['nombre_curso'] ?></option>

            <?php
            }
            mysqli_close($conexionsql);
            ?>
        </select>
        <input type="submit" name="guardar" value="Guardar">
        <a href="../index.php">Regresar</a>
    </form>
</body>

</html>