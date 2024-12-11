<!-- Formulario para crear una nueva ruta -->
<section class="form-container">
    <h2>Agregar Nueva Ruta</h2>
    <form action="<?php echo BASE_URL; ?>Ruta/añadirRuta" method="post">
        
        <div class="form-field">
            <label for="titulo">Título :</label>
            <input type="text" name="titulo" id="titulo" value="<?php echo $_POST['titulo'] ?? ''; ?>">
            <?php if (isset($errores['titulo'])): ?>
                <span class="error-message"><?php echo $errores['titulo']; ?></span>
            <?php endif; ?>
        </div>
        
        <div class="form-field">
            <label for="descripcion">Descripción :</label>
            <textarea name="descripcion" id="descripcion"><?php echo $_POST['descripcion'] ?? ''; ?></textarea>
            <?php if (isset($errores['descripcion'])): ?>
                <span class="error-message"><?php echo $errores['descripcion']; ?></span>
            <?php endif; ?>
        </div>
        
        <div class="form-field">
            <label for="desnivel">Desnivel :</label>
            <input type="number" name="desnivel" id="desnivel" value="<?php echo $_POST['desnivel'] ?? ''; ?>">
            <?php if (isset($errores['desnivel'])): ?>
                <span class="error-message"><?php echo $errores['desnivel']; ?></span>
            <?php endif; ?>
        </div>
        
        <div class="form-field">
            <label for="distancia">Distancia :</label>
            <input type="number" step="0.01" min="0" name="distancia" id="distancia" value="<?php echo $_POST['distancia'] ?? ''; ?>">
            <?php if (isset($errores['distancia'])): ?>
                <span class="error-message"><?php echo $errores['distancia']; ?></span>
            <?php endif; ?>
        </div>
        
        <div class="form-field">
            <label for="notas">Notas :</label>
            <textarea name="notas" id="notas"><?php echo $_POST['notas'] ?? ''; ?></textarea>
            <?php if (isset($errores['notas'])): ?>
                <span class="error-message"><?php echo $errores['notas']; ?></span>
            <?php endif; ?>
        </div>
        
        <div class="form-field">
            <label for="dificultad">Dificultad :</label>
            <input type="text" name="dificultad" id="dificultad" value="<?php echo $_POST['dificultad'] ?? ''; ?>">
            <?php if (isset($errores['dificultad'])): ?>
                <span class="error-message"><?php echo $errores['dificultad']; ?></span>
            <?php endif; ?>
        </div>
        
        <div class="form-submit">
            <input type="submit" value="Crear Nueva Ruta">
        </div>
        
    </form>

    <p class="back-link"><a href="<?php echo BASE_URL; ?>">Volver al inicio</a></p>
</section>
