<?php include("../../Templates/header.php") ?>
<?php

    require_once("c://xampp/htdocs/FullDevCode/Controladores/LotesController.php");
    require_once("c://xampp/htdocs/FullDevCode/Controladores/CultivoController.php");
    require_once("c://xampp/htdocs/FullDevCode/Modelos/LoteViewModel.php");

    $usuarioId = $_SESSION['usuarioId'];
    $Lote = new LotesController();
    $Cultivo = new CultivoController();
    $listadodecultivo = $Cultivo->ListarCultivos($usuarioId);

    if($_POST)
    {
        $id = 0;
        $validacion = false;
        $nombre = (isset($_POST['nombre'])?$_POST['nombre']:"");
        $idcultivo = (isset($_POST['idcultivo'])?$_POST['idcultivo']:"");
        $tamano = (isset($_POST['tamano'])?$_POST['tamano']:"");

        $validacion = $Lote->ValidarCrear($usuarioId,$nombre);

        if($validacion == false)
        {
            $LoteVM = new Lote($id,$nombre,$usuarioId,$idcultivo,$tamano);
            $Lote->Registrar($LoteVM->GETNombre(),$LoteVM->GETUsuarioId(),$LoteVM->GETCultivoId(),
            $LoteVM->GETTamano());
        }
        else
        {
            $mensaje = "Lo sentimos pero ya hay un lote registrado con ese nombre en el sistema";
        }

    }
?>
<a id="Regresar" class="btn btn-primary" href="index.php" role="button"><i class="fa-solid fa-arrow-right-from-bracket fa-lg"></i>&nbsp <strong>Regresar</strong></a>
<div class="content-formularios">
    <h1 class="titulo">Registrar Lote</h1>
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
                        class="form-control" name="nombre" required id="nombre" aria-describedby="helpId" placeholder="Ingrese el nombre del lote">
                    </p>
                    <p>
                        <label for="idcultivo" class="form-label">Cultivo</label>
                        <select class="form-select form-select-sm" name="idcultivo" id="idcultivo">
                            <?php foreach($listadodecultivo as $cultivos) {?>
                                <option <?php if(isset($idcultivo)) echo ($idcultivo == $cultivos['Id'])?"selected":""; ?> value="<?php echo $cultivos['Id']; ?>">
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
                        <button type="submit" >Registrar</button>
                    </p>
                </form>
            </div>
        </div>
</div>



<?php include("../../Templates/footer.php") ?>
