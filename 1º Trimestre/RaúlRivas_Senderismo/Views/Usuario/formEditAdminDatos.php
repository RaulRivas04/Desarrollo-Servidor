<!-- Modificación de los Datos del Usuario Logueado -->
<section class="usuario-formulario">
    <h2>Actualizar Datos de Usuario</h2>

    <form action="<?php echo BASE_URL; ?>Usuario/actualizarDatos" method="post" class="form-usuario">
        <!-- Campo oculto para el id del usuario -->
        <input type="hidden" name="id" value="<?php echo isset($_POST['id']) ? $_POST['id'] : $usuario["id"]; ?>">

        <?php if (isset($errores['id'])): ?>
            <div class="error"><?php echo $errores['id']; ?></div>
        <?php endif; ?>

        <input type="hidden" name="origen" value="<?php echo $origen; ?>">
        <?php if (isset($errores['origen'])): ?>
            <div class="error"><?php echo $errores['origen']; ?></div>
        <?php endif; ?>

        <!-- Campos de Usuario -->
        <div class="campo-formulario">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo isset($_POST['nombre']) ? $_POST['nombre'] : $usuario["nombre"]; ?>">
            <?php if (isset($errores['nombre'])): ?>
                <div class="error"><?php echo $errores['nombre']; ?></div>
            <?php endif; ?>
        </div>

        <div class="campo-formulario">
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" value="<?php echo isset($_POST['apellidos']) ? $_POST['apellidos'] : $usuario["apellidos"]; ?>">
            <?php if (isset($errores['apellidos'])): ?>
                <div class="error"><?php echo $errores['apellidos']; ?></div>
            <?php endif; ?>
        </div>

        <div class="campo-formulario">
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" id="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : $usuario["correo"]; ?>">
            <?php if (isset($errores['email'])): ?>
                <div class="error"><?php echo $errores['email']; ?></div>
            <?php endif; ?>
        </div>

        <div class="campo-formulario">
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" id="direccion" value="<?php echo isset($_POST['direccion']) ? $_POST['direccion'] : $usuario["direccion"]; ?>">
            <?php if (isset($errores['direccion'])): ?>
                <div class="error"><?php echo $errores['direccion']; ?></div>
            <?php endif; ?>
        </div>

        <div class="campo-formulario">
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" value="<?php echo isset($_POST['telefono']) ? $_POST['telefono'] : $usuario["telefono"]; ?>">
            <?php if (isset($errores['telefono'])): ?>
                <div class="error"><?php echo $errores['telefono']; ?></div>
            <?php endif; ?>
        </div>

        <div class="campo-formulario">
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : $usuario["fecha_nacimiento"]; ?>">
        </div>

        <div class="campo-formulario">
            <label for="nombre_usuario">Nombre de Usuario:</label>
            <input type="text" name="nombre_usuario" id="nombre_usuario" value="<?php echo isset($_POST['nombre_usuario']) ? $_POST['nombre_usuario'] : $usuario["usuario"]; ?>">
            <?php if (isset($errores['nombre_usuario'])): ?>
                <div class="error"><?php echo $errores['nombre_usuario']; ?></div>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn-guardar">Guardar Cambios</button>
    </form>

    <!-- Botón para Cancelar dependiendo del origen -->
    <?php if($origen == "verUsuarios"): ?>
        <form action="<?php echo BASE_URL; ?>Usuario/verUsuarios" method="get">
            <button type="submit" class="btn-cancelar">Cancelar</button>
        </form>
    <?php else: ?>
        <form action="<?php echo BASE_URL; ?>Usuario/verTusDatos" method="get">
            <button type="submit" class="btn-cancelar">Cancelar</button>
        </form>
    <?php endif; ?>
</section>
