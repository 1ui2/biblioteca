<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Biblioteca</title>
</head>
<body>
    <form method="POST">
        <h3>BIBLIOTECA</h3>
        <hr>
        <p class="pform" id="P1">ㅤ</p>
        <div class="input-group">
            <input type="text" name="Titulo" placeholder="Título" class="rounded-input">
            <input type="text" name="Autor" placeholder="Autor" class="rounded-input">
            <button type="submit" name="enviar" class="button">Guardar</button>
        </div>
        <p class="pform" id="P2">ㅤ</p>
        <div class="input-group">
            <input type="text" name="filtro" placeholder="Selección por título" class="rounded-input2">
            <input type="submit" name="Filtrar" value="Eliminar" class="button">
            <input type="submit" name="Adquirir" value="Adquirir" class="button">
            <input type="submit" name="Devolver" value="Devolver" class="button">
        </div>
    </form>
</body>
<?php 
include("conexion.php");
?>
    <script src="script.js"></script>
</html>