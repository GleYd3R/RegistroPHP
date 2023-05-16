<?php
include("conexionsql.php");
$id = $_GET['id'];
$sql = "DELETE FROM aprendiz WHERE id='$id'";
$resultado = mysqli_query($conexionsql, $sql);
mysqli_close($conexionsql);
//esto aca nos regresa a la pagina de index apenas elimina el usuario de la DB.
echo "<script>location.assign('../index.php');
</script>";
?>