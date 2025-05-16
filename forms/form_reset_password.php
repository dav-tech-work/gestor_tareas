
<form name="formReset">
<fieldset>
<h2>Introduce tus datos</h2>
<div>
    <label for="usuario">Introduce tu nombre o tu email:</label>
    <!-- Acuerdate de poner el required  -->
    <input type="text" name="usuario" id="usuario" >
    <p id="errorUsuario"></p>
</div>
<div>
    <a href="index.php?formulario=login">Ya tengo cuenta</a>
<a href="index.php?formulario=crear_cuenta">Crear cuenta</a>
</div>
<div>
    <button type="submit">Acceder</button>
    
</div>

</fieldset>

</form>