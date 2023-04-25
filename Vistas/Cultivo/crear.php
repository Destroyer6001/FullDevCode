<?php include("../../Templates/header.php")?>
<?php 
    require_once("c://xampp/htdocs/FullDevCode/Controladores/CultivoController.php");
    require_once("c://xampp/htdocs/FullDevCode/Modelos/CultivoViewModel.php");

    $controlador = new CultivoController();

    if($_POST)
    {
        $validacion = false;
        $id = 0;
        $mensaje = "";
        $nombre = (isset($_POST['nombre'])?$_POST['nombre']:"");
        $usuarioid = $_SESSION['usuarioId'];

        $validacion = $controlador->ExisteCrear($nombre,$usuarioid);

        if($validacion == false)
        {
            $Cultivo = new Cultivo($id,$nombre,$usuarioid);
            $controlador->CrearCultivo($Cultivo->GETNombre(),$Cultivo->GETUsuarioId());
        }
        else
        {
            $mensaje = "El cultivo ya se encuentra registrado en el sistema";
        }
    }
?>
<a id="Regresar" class="btn btn-primary" href="index.php" role="button"><i class="fa-solid fa-arrow-right-from-bracket fa-lg"></i>&nbsp <strong>Regresar</strong></a>
<div class="content-formularios">
    <h1 class="titulo">Registrar Cultivo</h1>
        <div class="formulario-registro">
            <div class="formulario">
                <?php if(isset($mensaje)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <strong><?php echo $mensaje; ?></strong>
                    </div>
                <?php } ?>
                <form action="" method="post">
                    <p class="block">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text"
                        value = "<?php if(isset($nombre)) echo $nombre;?>"
                        class="form-control" name="nombre" required id="nombre" aria-describedby="helpId" placeholder="Ingrese el nombre de la finca">
                    </p>
                    <br>       
                    <p class="boton">
                        <button type="submit" >Registrar</button>
                    </p>
                </form>
            </div>
        </div>
</div>
<?php include("../../Templates/footer.php")?>