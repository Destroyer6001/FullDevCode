<?php include("../../Templates/header.php");?>
<?php

    require_once("c://xampp/htdocs/FullDevCode/Controladores/LaborController.php");
    require_once("c://xampp/htdocs/FullDevCode/Modelos/LaborViewModel.php");
    $laborController = new LaborController();

    if($_GET['txtID'])
    {
        $txtId = (isset($_GET['txtID'])?$_GET['txtID']:"");
        $resultado_consulta = $laborController->ConsultarLabor($txtId);
        $nombre = $resultado_consulta['Nombre'];
        $txtUsuarioId = $resultado_consulta['UsuarioId'];
    }

    if($_POST)
    {
        $mensaje = "";
        $validacion = false;
        $nombre = (isset($_POST['nombre'])?$_POST['nombre']:"");
        $txtId = (isset($_POST['txtid'])?$_POST['txtid']:"");
        $txtUsuarioId = (isset($_POST['txtusuarioid'])?$_POST['txtusuarioid']:"");

        $validacion = $laborController->ValidarEditar($txtId,$nombre,$txtUsuarioId);

        if($validacion == false)
        {
            $labor = new Labor($txtId,$nombre,$txtUsuarioId);
            $laborController->Actualizar($labor->GETNombre(),$labor->GETId(),$labor->GETUsuarioId());
        }
        else
        {
            $mensaje = "La labor ya se encuentra registrada en el sistema";
        }

    }
?>

<a id="Regresar" class="btn btn-primary" href="index.php" role="button"><i class="fa-solid fa-arrow-right-from-bracket fa-lg"></i>&nbsp <strong>Regresar</strong></a>
<div class="content-formularios">
    <h1 class="titulo">Editar Labor</h1>
        <div class="formulario-registro">
            <div class="formulario">
                <?php if(isset($mensaje)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <strong><?php echo $mensaje; ?></strong>
                    </div>
                <?php } ?>
                <form action="" method="post">

                    <input type="hidden"
                    value = "<?php echo $txtId;?>" class="form-control" name="txtid" id="txtid" aria-describedby="helpId" placeholder="">

                    <input type="hidden"
                    value = "<?php echo $txtUsuarioId;?>" class="form-control" name="txtusuarioid" id="txtusuarioid" aria-describedby="helpId" placeholder="">

                    <p class="block">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text"
                        value = "<?php echo $nombre;?>"
                        class="form-control" name="nombre" required id="nombre" aria-describedby="helpId" placeholder="Ingrese el nombre de la labor">
                    </p>
                    <br>
                    <p class="boton">
                        <button type="submit" >Guardar Cambios</button>
                    </p>
                </form>
            </div>
        </div>
</div>

<?php include("../../Templates/footer.php");?>
