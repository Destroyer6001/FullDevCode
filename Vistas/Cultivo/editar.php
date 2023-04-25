<?php include("../../Templates/header.php")?>
<?php

    require_once("c://xampp/htdocs/FullDevCode/Controladores/CultivoController.php");
    require_once("c://xampp/htdocs/FullDevCode/Modelos/CultivoViewModel.php");
    $Controlador = new CultivoController();

    if($_GET['txtID'])
    {
        $txtId = (isset($_GET['txtID'])?$_GET['txtID']:"");
        $cultivo = $Controlador->ConsultarCultivo($txtId);
        $nombre = $cultivo['Nombre'];
        $txtUsuarioId = $cultivo['UsuarioId'];
    }

    if($_POST)
    {
        $mensaje = "";
        $validacion = false;
        $txtId = (isset($_POST['txtid'])?$_POST['txtid']:"");
        $txtUsuarioId = (isset($_POST['txtusuarioid'])?$_POST['txtusuarioid']:"");
        $nombre = (isset($_POST['nombre'])?$_POST['nombre']:"");

        $validacion = $Controlador->ExisteEditar($nombre,$txtUsuarioId,$txtId);

        if($validacion == false)
        {
            $ObjetoCultivo = new Cultivo($txtId,$nombre,$txtUsuarioId);
            $Controlador->EditarCultivo($ObjetoCultivo->GETNombre(),$ObjetoCultivo->GETId(),$ObjetoCultivo->GETUsuarioId());
        }
        else
        {
            $mensaje = "El cultivo ya se encuentra registrado en el sistema";
        }
    }
?>



<a id="Regresar" class="btn btn-primary" href="index.php" role="button"><i class="fa-solid fa-arrow-right-from-bracket fa-lg"></i>&nbsp <strong>Regresar</strong></a>
<div class="content-formularios">
    <h1 class="titulo">Editar Cultivo</h1>
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