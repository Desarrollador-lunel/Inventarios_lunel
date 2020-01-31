<?php
//Se ingluye el header
include '../head.php';
//Se incluye el modelo
include '../../modelo/usuario.php';
//Se crea una nueva instancia
$usuario = new Usuario();
?>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <div class="form-group text-center">
      <?php if (isset($_GET['existe'])) {?>
        <div class="alert alert-danger">
          Usuario no valido.
        </div>
      <?php }?>
    </div>

    <div class="form-group text-center">
      <?php if (isset($_GET['pass'])) {;?>
        <div class="alert alert-danger">
          Clave digitada invalida.
        </div>
      <?php }?>
    </div>

    <div class="form-group text-center">
      <?php if (isset($_GET['sesion'])) {?>
        <div class="alert alert-danger">
          Inicie sesion.
        </div>
      <?php }?>
    </div>

    <div class="form-group text-center">
      <?php if (isset($_GET['logout'])) {?>
        <div class="alert alert-success">
          Logout exitoso.
        </div>
      <?php }?>
    </div>
    <!-- Icon -->
    <div class="fadeIn first">
      <img src="../../imagenes/logo.png" class="img-fluid">
    </div>

    <!-- Login Form -->
    <form action="../../controlador/usuario_controller.php" method="POST">
      <div class="form-group row text-center">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
          <input type="text" class="form-control" id="username" name="username" placeholder="Usuario" required>
        </div>
        <div class="col-md-3">
        </div>
      </div>
      <div class="form-group row text-center">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
          <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Contraseña" required>
        </div>
        <div class="col-md-3">
        </div>
      </div>
      <button type="submit" class="btn btn-success" value="Ingresar" name="Ingresar">Enviar</button>
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="../usuario/recupera.php">¿Olvido su contraseña?</a>
    </div>

  </div>
</div>
<?php
//Se ingluye el header
include '../footer.php';
?>