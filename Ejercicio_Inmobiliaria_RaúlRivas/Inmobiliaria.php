<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inserción de vivienda</title>
    <style>
        /* Estilos básicos para el formulario */
        .form-container {
            width: 500px;
            border: 1px solid #ccc;
            padding: 20px;
            margin: 20px auto;
        }
        .form-container h2 {
            color: #1E4FAA;
            text-align: center;
        }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 5px;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Inserción de vivienda</h2>
    <form action="procesar_vivienda.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="tipo">Tipo de vivienda:</label>
            <select name="tipo" id="tipo">
                <option value="Piso">Piso</option>
                <option value="Adosado">Adosado</option>
                <option value="Chalet">Chalet</option>
                <option value="Casa">Casa</option>
            </select>
            <?php if (isset($_GET['error_tipo'])) echo "<p class='error'>El tipo de vivienda es obligatorio.</p>"; ?>
        </div>
        
        <div class="form-group">
            <label for="zona">Zona:</label>
            <select name="zona" id="zona">
                <option value="Centro">Centro</option>
                <option value="Zaidín">Zaidín</option>
                <option value="Chana">Chana</option>
                <option value="Albaicín">Albaicín</option>
                <option value="Sacromonte">Sacromonte</option>
                <option value="Realejo">Realejo</option>
            </select>
            <?php if (isset($_GET['error_zona'])) echo "<p class='error'>La zona es obligatoria.</p>"; ?>
        </div>
        
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion">
            <?php if (isset($_GET['error_direccion'])) echo "<p class='error'>Se requiere la dirección de la vivienda.</p>"; ?>
        </div>
        
        <div class="form-group">
            <label>Número de dormitorios:</label>
            <input type="radio" name="dormitorios" value="1"> 1
            <input type="radio" name="dormitorios" value="2"> 2
            <input type="radio" name="dormitorios" value="3"> 3
            <input type="radio" name="dormitorios" value="4"> 4
            <input type="radio" name="dormitorios" value="5"> 5
            <?php if (isset($_GET['error_dormitorios'])) echo "<p class='error'>El número de dormitorios es obligatorio.</p>"; ?>
        </div>
        
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="text" id="precio" name="precio">
            <?php if (isset($_GET['error_precio'])) echo "<p class='error'>El precio debe ser un valor numérico.</p>"; ?>
        </div>
        
        <div class="form-group">
            <label for="tamano">Tamaño en metros cuadrados:</label>
            <input type="text" id="tamano" name="tamano">
            <?php if (isset($_GET['error_tamano'])) echo "<p class='error'>El tamaño debe ser un valor numérico.</p>"; ?>
        </div>
        
        <div class="form-group">
            <label>Extras (marque los que procedan):</label>
            <input type="checkbox" name="extras[]" value="Piscina"> Piscina
            <input type="checkbox" name="extras[]" value="Jardín"> Jardín
            <input type="checkbox" name="extras[]" value="Garaje"> Garaje
        </div>
        
        <div class="form-group">
            <label for="foto">Foto:</label>
            <input type="file" id="foto" name="foto" accept="image/*">
            <?php if (isset($_GET['error_foto'])) echo "<p class='error'>No se ha podido subir la foto (máximo 100 KB).</p>"; ?>
        </div>
        
        <div class="form-group">
            <label for="observaciones">Observaciones:</label>
            <textarea id="observaciones" name="observaciones" rows="3"></textarea>
        </div>
        
        <div class="form-group">
            <input type="submit" value="Insertar vivienda">
        </div>
    </form>
</div>

</body>
</html>
