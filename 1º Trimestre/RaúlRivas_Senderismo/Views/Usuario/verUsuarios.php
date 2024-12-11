<?php 
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
?>

<div class="usuarios-lista">
    <!-- Listar todos los usuarios y permitir la edición -->
    <?php foreach($usuarios as $usuario): ?>
        <div class="usuario-item">
            <p><strong>Usuario:</strong> <?php echo htmlspecialchars($usuario["usuario"]); ?></p>
            
            <!-- Formulario para editar datos del usuario -->
            <form action="<?php echo BASE_URL; ?>Usuario/formularioDatos" method="POST" class="form-editar-usuario">
                
                <!-- Campo oculto para enviar el ID del usuario -->
                <input type="hidden" name="id" value="<?php echo $usuario["id"]; ?>">

                <!-- Mostrar posibles errores -->
                <?php if (isset($errores['id'])): ?>
                    <div class="error">
                        <p><?php echo htmlspecialchars($errores['id']); ?></p>
                    </div>
                <?php endif; ?>

                <!-- Campo oculto para origen -->
                <input type="hidden" name="origen" value="verUsuarios">
                <?php if (isset($errores['origen'])): ?>
                    <div class="error">
                        <p><?php echo htmlspecialchars($errores['origen']); ?></p>
                    </div>
                <?php endif; ?>

                <!-- Botón para enviar el formulario de edición -->
                <div class="editar-btn">
                    <button type="submit" name="editar">Modificar Datos</button>
                </div>
            </form>
        </div>
    <?php endforeach; ?>
</div>

<!-- Botón para volver a la página anterior -->
<div class="volver-btn">
    <form action="<?php echo BASE_URL; ?>">
        <button type="submit">Volver</button>
    </form>
</div>
