<?php
#Salir si alguno de los datos no está presente
if (!isset($_POST["nombre"]) || !isset($_POST["edad"])) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "../config/conexion.php";
$nombre = $_POST["nombre"];
$edad = $_POST["edad"];

/*
Al incluir el archivo "base_de_datos.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */
$sentencia = $conexion->prepare("INSERT INTO datos(nombre, edad) VALUES (?, ?);");
$resultado = $sentencia->execute([$nombre, $edad]); # Pasar en el mismo orden de los ?

#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar

if ($resultado === true) {
    # Redireccionar a la lista
    header("Location: ../index.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista";
}
