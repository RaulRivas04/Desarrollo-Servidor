<!-- Información del Usuario Logueado -->

<h2>Detalles de <?php echo $_SESSION['usuario']["usuario"]; ?></h2>

<div class="usuario-detalles">
    <div class="usuario-item">
        <strong>Nombre:</strong> <?php echo $_SESSION['usuario']["nombre"]; ?>
    </div>
    <div class="usuario-item">
        <strong>Apellidos:</strong> <?php echo $_SESSION['usuario']["apellidos"]; ?>
    </div>
    <div class="usuario-item">
        <strong>Correo:</strong> <?php echo $_SESSION['usuario']["correo"]; ?>
    </div>
    <div class="usuario-item">
        <strong>Dirección:</strong> <?php echo $_SESSION['usuario']["direccion"]; ?>
    </div>
    <div class="usuario-item">
        <strong>Teléfono:</strong> <?php echo $_SESSION['usuario']["telefono"]; ?>
    </div>
    <div class="usuario-item">
        <strong>Fecha de Nacimiento:</strong> <?php echo $_SESSION['usuario']['fecha_nacimiento']; ?>
    </div>
    <div class="usuario-item">
        <strong>Nombre de Usuario:</strong> <?php echo $_SESSION['usuario']["usuario"]; ?>
    </div>
</div>

<!-- Formulario para Editar los Datos del Usuario -->
<h3>Modificar Datos</h3>
<form action="<?php echo BASE_URL; ?>Usuario/formularioDatos" method="post" class="editar-formulario">
    <input type="hidden" name="id" value="<?php echo $_SESSION['usuario']["id"]; ?>">
    <?php if (isset($errores['id'])): ?>
        <div class="error"><?php echo $errores['id']; ?></div>
    <?php endif; ?>

    <input type="hidden" name="origen" value="datosUsuario">
    <?php if (isset($errores['origen'])): ?>
        <div class="error"><?php echo $errores['origen']; ?></div>
    <?php endif; ?>
    
    <button type="submit" class="btn-editar">Editar</button>
</form>

<!-- Formulario para Volver -->
<form action="<?php echo BASE_URL; ?>" method="get">
    <button type="submit" class="btn-volver">Volver</button>
</form>
