<div class="login-clean">
    <form method="post" action="valida.php">
        <div class="illustration"><img src="../assets/img/assets/mariposa-04.png" width="103" height="104" alt="mariposa-beauty-card" class="hidden-xs" /></div>
        <div class="form-group">
            <input type="text" name="usuario" placeholder="Usuario" class="form-control" autofocus />
        </div>
        <div class="form-group">
            <input type="password" name="contrasena" placeholder="Contraseña" class="form-control" />
            <?php if (isset($_GET["errorusuario"]) && $_GET["errorusuario"] == "si") {echo "<label style='color: red; font-size: 14px;'>Datos incorrectos</label>";} ?>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Ingresar</button>
        </div>
    </form>
</div>