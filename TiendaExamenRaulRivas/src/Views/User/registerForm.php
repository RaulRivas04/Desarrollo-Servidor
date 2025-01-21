<h3>Registro</h3>
<form action="<?=BASE_URL?>user/register" method="POST">
    <label for="name">Nombre</label>
    <input type="text" name="data[nombre]" id="name">

    <label for="lastname">Apellido</label>
    <input type="text" name="data[lastname]" id="lastname">

    <label for="email">Correo</label>
    <input type="email" name="data[email]" id="email">

    <label for="password">Contraseña</label>
    <input type="password" name="data[password]" id="password">
    
    <input type="submit" value="Registrarse">
</form>