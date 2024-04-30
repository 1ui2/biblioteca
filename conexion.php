<?php 
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$basedatos = "biblioteca";

$conexion = mysqli_connect($servidor, $usuario, $contrasena,$basedatos);


$sqlMostrarLibros = "SELECT * FROM libros";
$resultadoMostrarLibros = mysqli_query($conexion, $sqlMostrarLibros);

// Código para mostrar los libros
if ($resultadoMostrarLibros->num_rows > 0) {
    while ($fila = $resultadoMostrarLibros->fetch_assoc()) {
        echo "<ul class=\"book-info\">"; // Agrega la clase book-info aquí
        echo "<li><strong>Título:</strong> " . $fila["Titulo"] . "</li>";
        echo "<li><strong>Autor:</strong> " . $fila["Autor"] . "</li>";
        echo "<li><strong>Estado:</strong> " . $fila["Adquirir"] . "</li>";
        echo "</ul>";
    }
} else {
    echo "<form>";
    echo "<p>AUN NO HAY LIBROS EN LA BIBLIOTECA</p>";
    echo"</form>";
}

if (isset($_POST['enviar'])) {
    if (strlen($_POST['Titulo']) >= 1 && strlen($_POST['Autor']) >= 1) {
        $Titulo = trim($_POST['Titulo']);
        $Autor = trim($_POST['Autor']);

        // Verificar si el título ya existe
        $consultaExistencia = "SELECT Titulo FROM libros WHERE Titulo = '$Titulo'";
        $resultadoExistencia = mysqli_query($conexion, $consultaExistencia);

        if (mysqli_num_rows($resultadoExistencia) > 0) {
            echo "<script>document.getElementById('P1').textContent = 'El libro ya existe en la biblioteca.';</script>";
        } else {
            // Insertar el nuevo libro
            $consulta = "INSERT INTO libros(Titulo, Autor, Adquirir) VALUES ('$Titulo','$Autor', 'Disponible')";
            $resultado = mysqli_query($conexion, $consulta);
            if ($resultado) {
                echo "<script>document.getElementById('P1').textContent = 'Libro guardado correctamente.';</script>";
            } else {
                echo "<script>document.getElementById('P1').textContent = 'Error al guardar el libro.';</script>";
            }
        }
    } else {
        echo "<script>document.getElementById('P1').textContent = 'Completa todos los campos.';</script>";
    }
}

mysqli_close($conexion);



?>