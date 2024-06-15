<?php

include_once URL_APP . '/views/custom/footer.php';
include_once URL_APP . '/views/custom/navbar.php';

?>
<div class="col-md-2"></div>
<div class="col-md-8">

<div class="card">
    <div class="card-header"><h4>Registro</h4></div>
    <div class="card-body">

    <?php if (isset($_SESSION['usuarioError'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['usuarioError']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    <?php unset($_SESSION['usuarioError']); endif ?>

    <form action="<?php echo URL_PROJECT ?>home/register" method="POST">
        <div class="mb-3">
            <label for="" class="form-label">Usuario</label>
            <input
                type="text"
                class="form-control"
                name="usuario"
                aria-describedby="helpId"
                placeholder="Usuario"
            />
            <small id="helpId" class="form-text text-muted">Ingresa un usuario</small>
        </div>
        
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input
                type="email"
                class="form-control"
                name="email"
                aria-describedby="emailHelpId"
                placeholder="example@gmail.com"/>
            <small id="emailHelpId" class="form-text text-muted">Ingresa un correo válido</small>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input
                type="password"
                class="form-control"
                name="contrasena"
                placeholder="Password" />
        </div>
    
        <button class="btn btn-primary" type="submit" >Ingresar</button>


        <br/><p>¿Ya tienes una cuenta?<a href="<?php echo URL_PROJECT; ?>home/login">Login</a></p>
        
    </form>   


    </div>
</div>




<br/><br/>


</div>
<div class="col-md-2"></div>


<?php
include_once URL_APP . '/views/custom/header.php';
?>