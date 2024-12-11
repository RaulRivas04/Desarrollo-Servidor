<!-- Formulario para iniciar sesión -->
<section class="login-form">
    <h2>Iniciar Sesión</h2>

    <form action="<?php echo BASE_URL; ?>Usuario/iniciarSesion" method="POST" class="formulario-sesion">
        
        <!-- Campo para correo electrónico -->
        <div class="campo-formulario">
            <label for="correo">Correo Electrónico:</label>
            <input type="email" name="correo" id="correo" value="<?php echo $_POST['correo'] ?? ''; ?>" placeholder="Introduce tu correo">
            <?php if (isset($errores['correo'])): ?>
                <div class="error"><?php echo $errores['correo']; ?></div>
            <?php endif; ?>
        </div>

        <!-- Campo para contraseña -->
        <div class="campo-formulario">
            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" id="contrasena" placeholder="Introduce tu contraseña">
            <?php if (isset($errores['contrasena'])): ?>
                <div class="error"><?php echo $errores['contrasena']; ?></div>
            <?php endif; ?>
        </div>

        <!-- Error de login -->
        <?php if (isset($errores['login'])): ?>
            <div class="error"><?php echo $errores['login']; ?></div>
        <?php endif; ?>

        <button type="submit" class="btn-iniciar">Iniciar Sesión</button>

        <!-- Enlace para registrarse si no se tiene cuenta -->
        <p class="registro-link">¿No tienes cuenta? <a href="<?php echo BASE_URL; ?>Usuario/formularioRegistro">Regístrate aquí</a></p>

        <!-- Enlace para volver a inicio -->
        <p class="volver-link"><a href="<?php echo BASE_URL; ?>">Volver a inicio</a></p>
    </form>
</section>
