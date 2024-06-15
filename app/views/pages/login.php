<?php

include_once URL_APP . '/views/custom/footer.php';
include_once URL_APP . '/views/custom/navbar.php';



?>

<div class="col-md-2"></div>
<div class="col-md-8">

<div class="card">
    <div class="card-header"><h4>Login</h4></div>
    <div class="card-body">
<!--Alerta al usuario donde el usuario o la contraseña es incorrecto-->
    <?php if (isset($_SESSION['errorLogin'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['errorLogin']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    <?php unset($_SESSION['errorLogin']); endif ?>
<!--Alerta al usuario donde el usuario y la contraseña son correctos-->    
    <?php if (isset($_SESSION['loginComplete'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['loginComplete']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    <?php unset($_SESSION['loginComplete']); endif ?>

    <form action="<?php echo URL_PROJECT ?>home/login" method="POST">

        <div class="mb-3">
            <label for="" class="form-label">Usuario</label>
            <input
                type="text"
                class="form-control"
                name="usuario"
                placeholder="Usuario"
                style="color: black;"
            />
            <small id="emailHelpId" class="form-text text-muted"
                >Ingresa tu usuario</small
            >
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input
                type="password"
                class="form-control"
                name="contrasena"
                placeholder="Password"
                style="color: black;"
            />
        </div>

        <button class="btn btn-primary" type="submit">Ingresar</button>


        <br/><p>¿No tienes una cuenta?<a href="<?php echo URL_PROJECT . 'home/register';?>">Registrate aquí</a></p>
    </form>    
        


    </div>
</div>

</div>
<div class="col-md-2"></div>


<?php
include_once URL_APP . '/views/custom/header.php';
?>