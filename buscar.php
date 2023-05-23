<!DOCTYPE html>
<html>
<head>
    <title>Búsqueda en tiempo real</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <p><h1>Buscar aprendiz</h1></p><br>
    <input type="text" id="buscar" class="buscar" placeholder="Digite el ID del usuario">
    <a href="index.php">Regresar</a>
    <div id="result"></div>
    <script>
        $(document).ready(function(){
            $('#buscar').keyup(function(){
                var query = $(this).val();
                if(query != ''){
                    $.ajax({
                        url:"php/buscar.php",
                        method:"POST",
                        data:{query:query},
                        success:function(data){
                            $('#result').html(data);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>