<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script>
        function confirmar() {
            return confirm('¿Seguro desea borrar?');
        }
    </script>
    <title>Lista de aprendices</title>
</head>

<body>
    <?php
    include("php/conexionsql.php");
    $sql = "SELECT * FROM aprendiz";
    $resultado = mysqli_query($conexionsql, $sql);
    ?>
    <h1>Lista de Aprendices</h1>
    <a href="php/registrar.php" class="registrar">Nuevo aprendiz</a><br><br>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Ficha</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($filas = mysqli_fetch_assoc($resultado)) {

            ?>
                <tr>
                    <td><?php echo $filas['id'] ?></td>
                    <td><?php echo $filas['nombres'] ?></td>
                    <td><?php echo $filas['apellidos'] ?></td>
                    <td><?php echo $filas['ficha'] ?></td>
                    <td>
                        <?php echo "<a href='php/editar.php?id=" . $filas['id'] . "'>Editar</a>"; ?>                        
                        <?php echo "<a href='php/eliminar.php?id=" . $filas['id'] . "' 
                        onclick='return confirmar()'>Eliminar</a>"; ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
    mysqli_close($conexionsql);
    ?>
</body>

</html>