<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Listar Usuario</title>
  </head>
  <body>
    <?php
    $mysqli = new mysqli("localhost", "root", "", "juegosdb");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: " .
        $mysqli->connect_error;
    }else {
      // damos valores para mandar por $post
      $nombre=$_POST["nombre"];
      $apellidos=$_POST["apellidos"];
      $edad=$_POST["edad"];
      $curso=$_POST["curso"];
      $puntuacion=$_POST["puntuacion"];


    // hacemos la consulta para insertar y para mostrar todos los datos
     $consulta = $mysqli->query("INSERT INTO usuario (nombre, apellidos, edad, curso, puntuacion) VALUES ('$nombre', '$apellidos', $edad, $curso, $puntuacion)");
     $consulta2 = $mysqli->query("SELECT * FROM usuario");

    // cuantas filas nos devuelve
  	echo "<br>Acabamos de insertar a: ".$nombre."<br>";
    echo "<br>";

    // mostramos las especificaciones del ejercicio (ultimo user insertado y lista total d inserts)
    while ($mostrarUsuarios = $consulta2->fetch_assoc()) {
        echo "Lista usuarios insertados: ".$mostrarUsuarios['nombre']."<br>";
        echo "Edad: ".$mostrarUsuarios['edad']."<br>";
        echo "Su puntuacion es de: ".$mostrarUsuarios['puntuacion']."<br>";
        echo "<br>";
        echo "<hr>";
    }
   }
    ?>
    <!-- boton para atras -->
    <form action="insertarUsuario.php">
      <input type="submit" value="Volver a insertar">
    </form>
  </body>
</html>
