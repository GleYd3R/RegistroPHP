<?php
include("conexionsql.php");
// Obtener la consulta de búsqueda enviada desde el formulario buscar.php
if (isset($_POST["query"])) {
    $search = $_POST["query"];
    $sql = "SELECT * FROM aprendiz WHERE id LIKE '%" . $search . "%'";
    $result = mysqli_query($conexionsql, $sql);
    // Mostrar resultados
    if (mysqli_num_rows($result) > 0) {
        // Construir la tabla de resultados
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nombres</th>";
        echo "<th>Apellidos</th>";
        echo "<th>Ficha</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nombres'] . "</td>";
            echo "<td>" . $row['apellidos'] . "</td>";
            echo "<td>" . $row['ficha'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No se encontraron resultados</p>";
    }
}
// Cerrar la conexión a la base de datos
mysqli_close($conexionsql);
?>