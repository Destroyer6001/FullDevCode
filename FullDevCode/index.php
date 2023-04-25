
<?php include("Templates/header.php") ?>
<?php 
    require_once("c://xampp/htdocs/FullDevCode/Controladores/UsuarioController.php");
    $controlador = new UsuarioController();

    $consulta = $controlador->ConsultarUsuario($_SESSION['usuarioId']);
    $propietario = $consulta['Propietario'];

?>

<br/></br>

    <div class="card" id="cardindexpuestos">
        <div class="content">
            <div class="title">
            <center><h1 id="Titulo"><strong>Bienvenido</strong></h1></center>
            </div>
            <div class="card-body">
                <center><p class="col-md-8 fs-4" id="titulo"><?php echo $propietario;?></p></center>
                <br>
                <center><a href="Editar.php?UsuarioId=<?php echo $_SESSION['usuarioId'];?>" role="button">Editar Usuario</a></center>
            </div>
        </div>
    </div>





<?php include("Templates/footer.php") ?>
