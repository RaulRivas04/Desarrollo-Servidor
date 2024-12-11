<?php 
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
?>

<!-- Formulario de Registro -->
<h2>Formulario de Registro</h2>

<form action="<?php echo BASE_URL; ?>Usuario/registrar" method="POST">
    <!-- Campo para el nombre -->
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="<?php echo $_POST['nombre'] ?? ''; ?>" placeholder="Introduce tu nombre">
    <?php if (isset($errores['nombre'])): ?>
        <p style="color:red;"><?php echo $errores['nombre']; ?></p>
    <?php endif; ?>

    <!-- Campo para los apellidos -->
    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" id="apellidos" value="<?php echo $_POST['apellidos'] ?? ''; ?>" placeholder="Introduce tus apellidos">
    <?php if (isset($errores['apellidos'])): ?>
        <p style="color:red;"><?php echo $errores['apellidos']; ?></p>
    <?php endif; ?>

    <!-- Campo para el correo electrónico -->
    <label for="email">Correo Electrónico:</label>
    <input type="email" name="email" id="email" value="<?php echo $_POST['email'] ?? ''; ?>" placeholder="Introduce tu correo electrónico">
    <?php if (isset($errores['email'])): ?>
        <p style="color:red;"><?php echo $errores['email']; ?></p>
    <?php endif; ?>

    <!-- Campo para la dirección -->
    <label for="direccion">Dirección:</label>
    <input type="text" name="direccion" id="direccion" value="<?php echo $_POST['direccion'] ?? ''; ?>" placeholder="Introduce tu dirección">
    <?php if (isset($errores['direccion'])): ?>
        <p style="color:red;"><?php echo $errores['direccion']; ?></p>
    <?php endif; ?>

    <!-- Campo para el teléfono -->
    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono" id="telefono" value="<?php echo $_POST['telefono'] ?? ''; ?>" placeholder="Introduce tu teléfono">
    <?php if (isset($errores['telefono'])): ?>
        <p style="color:red;"><?php echo $errores['telefono']; ?></p>
    <?php endif; ?>

    <!-- Campo para la fecha de nacimiento -->
    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $_POST['fecha_nacimiento'] ?? ''; ?>">
    <?php if (isset($errores['fecha_nacimiento'])): ?>
        <p style="color:red;"><?php echo $errores['fecha_nacimiento']; ?></p>
    <?php endif; ?>

    <!-- Campo para el nombre de usuario -->
    <label for="nombre_usuario">Nombre de Usuario:</label>
    <input type="text" name="nombre_usuario" id="nombre_usuario" value="<?php echo $_POST['nombre_usuario'] ?? ''; ?>" placeholder="Elige un nombre de usuario">
    <?php if (isset($errores['nombre_usuario'])): ?>
        <p style="color:red;"><?php echo $errores['nombre_usuario']; ?></p>
    <?php endif; ?>

    <!-- Campo para la contraseña -->
    <label for="contrasena">Contraseña:</label>
    <input type="password" name="contrasena" id="contrasena" placeholder="Crea una contraseña">
    <?php if (isset($errores['contrasena'])): ?>
        <p style="color:red;"><?php echo $errores['contrasena']; ?></p>
    <?php endif; ?>

    <!-- Campo para confirmar la contraseña -->
    <label for="confirmar_contrasena">Confirmar Contraseña:</label>
    <input type="password" name="confirmar_contrasena" id="confirmar_contrasena" placeholder="Confirma tu contraseña">
    <?php if (isset($errores['confirmar_contrasena'])): ?>
        <p style="color:red;"><?php echo $errores['confirmar_contrasena']; ?></p>
    <?php endif; ?>

    <!-- Campo para el rol (solo si el usuario está logueado) -->
    <?php if(isset($_SESSION['usuario'])): ?>
        <label for="rol">Rol:</label>
        <input type="text" name="rol" id="rol" value="<?php echo $_POST['rol'] ?? ''; ?>" placeholder="Define un rol">
        <?php if (isset($errores['rol'])): ?>
            <p style="color:red;"><?php echo $errores['rol']; ?></p>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Botón de submit -->
    <button type="submit">Registrar</button>

    <!-- Enlace para iniciar sesión si no tienes cuenta -->
    <?php if(!isset($_SESSION['usuario'])): ?>
        <p>¿Ya tienes una cuenta? <a href="<?php echo BASE_URL; ?>Usuario/formularioInicioSesion">Inicia sesión aquí</a></p>
    <?php endif; ?>

    <!-- Enlace para volver a inicio -->
    <p><a href="<?php echo BASE_URL; ?>">Volver a inicio</a></p>
</form>
