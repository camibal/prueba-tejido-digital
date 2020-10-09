<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>
    <div class="contenedor">
        <div class="item1"></div>
        <div class="item2">
            <form id="formDatos" method="POST">
                <div class="form-control">
                    <input type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre">
                    <input type="text" name="edad" id="edad" placeholder="Digite su edad">
                    <input type="submit" id="btnGuardar" class="btnGuardar" value="ENVIAR">
                </div>
            </form>
        </div>
        <div class="item3">
            <div class="contenedor-img">
                <img src="assets/img/1.jpg" alt="">
            </div>
        </div>
        <div class="item4">
            <div class="contenedor-img">
                <img src="assets/img/2.jpg" alt="">
            </div>
        </div>
        <div class="item5">
            <div class="usuarios">
                <h1>Usuarios</h1>
                <span id="numeroUsuarios" class="numeroUsuarios">
                    <!-- Datos DB -->
                </span>
            </div>
        </div>
        <div class="item6"></div>
        <div class="item7">
            <div class="contenedor-img">
                <img src="assets/img/3.jpg" alt="">
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $('#btnGuardar').click(function() {
                let datos = $('#formDatos').serialize();
                console.log(datos);
                $.ajax({
                    type: "POST",
                    url: "crud/insertar-datos.php",
                    data: datos,
                    success: function() {

                    }
                });
                alert('Dato Insertado');
                header("Location: index.php");
                return false;
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            let response = '';
            $.ajax({
                type: "GET",
                url: "crud/recibir-datos.php",
                dataType: "html", //expect html to be returned                
                success: function(response) {
                    $("#numeroUsuarios").html(response);
                    // console.log(response);
                }
            });
        });
    </script>
</body>

</html>