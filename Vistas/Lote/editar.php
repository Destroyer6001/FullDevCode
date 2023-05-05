<?php include("../../Templates/header.php") ?>
<?php
    require_once("c://xampp/htdocs/FullDevCode/Controladores/LotesController.php");
    require_once("c://xampp/htdocs/FullDevCode/Controladores/CultivoController.php");
    require_once("c://xampp/htdocs/FullDevCode/Modelos/LoteViewModel.php");

    $LoteController = new LotesController();
    $CultivoController = new CultivoController();
    $listadodecultivo = $CultivoController->ListarCultivos($_SESSION['usuarioId']);

    if($_GET['txtID'])
    {
        $txtId = (isset($_GET['txtID'])?$_GET['txtID']:"");
        $Lote = $LoteController->ObtenerLote($txtId);
        $nombre = $Lote['Nombre'];
        $txtUsuarioId = $Lote['UsuarioId'];
        $tamano = $Lote['Tamano'];
        $cultivoId = $Lote['CultivoId'];
    }

    if($_POST)
    {
        $validacion = false;
        $nombre = (isset($_POST['nombre'])?$_POST['nombre']:"");
        $txtId = (isset($_POST['txtid'])?$_POST['txtid']:"");
        $txtUsuarioId = (isset($_POST['txtusuarioid'])?$_POST['txtusuarioid']:"");
        $tamano = (isset($_POST['tamano'])?$_POST['tamano']:"");
        $cultivoId = (isset($_POST['cultivoid'])?$_POST['cultivoid']:"");

        $validacion = $LoteController->ValidarEditar($nombre,$txtUsuarioId,$txtId);

        if($validacion == false)
        {
            $LoteVM = new Lote($txtId,$nombre,$txtUsuarioId,$cultivoId,$tamano);
            $LoteController->Editar($LoteVM->GETId(),$LoteVM->GETNombre(),$LoteVM->GETUsuarioId(),
            $LoteVM->GETCultivoId(),$LoteVM->GETTamano());
        }
        else
        {
            $mensaje = "Lo sentimos pero ya hay un lote registrado con ese nombre en el sistema";
        }
    }
?>


<a id="Regresar" class="btn btn-primary" href="index.php" role="button"><i class="fa-solid fa-arrow-right-from-bracket fa-lg"></i>&nbsp <strong>Regresar</strong></a>
<div class="content-formularios">
    <h1 class="titulo">Actualizar Lote</h1>
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
                        value = "<?php if(isset($nombre)) echo $nombre;?>"
                        class="form-control" name="nombre" required id="nombre" aria-describedby="helpId" placeholder="Ingrese el nombre del lote">
                    </p>
                    <p>
                        <label for="cultivoid" class="form-label">Cultivo</label>
                        <select class="form-select form-select-sm" name="cultivoid" id="cultivoid">
                            <?php foreach($listadodecultivo as $cultivos) {?>
                                <option <?php echo ($cultivoId == $cultivos['Id'])?"selected":""; ?> value="<?php echo $cultivos['Id']; ?>">
                                <?php echo $cultivos['Nombre'];?></option>
                            <?php }?>
                        </select>
                    </p>
                    <p>
                        <label for="tamano" class="form-label">Tamaño</label>
                        <input type="text"
                        value = "<?php if(isset($tamano)) echo $tamano;?>"
                        class="form-control" name="tamano" required id="tamano" aria-describedby="helpId" placeholder="Ingrese el tamaño del lote">
                    </p>
                    <br>
                    <p class="boton">
                        <button type="submit" >Guardar Cambios</button>
                    </p>
                </form>
            </div>
        </div>
</div>





<?php include("../../Templates/footer.php") ?>
