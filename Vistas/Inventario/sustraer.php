<?php include("../../Templates/header.php");?>
<?php

    require_once("c://xampp/htdocs/FullDevCode/Controladores/InventarioController.php");
    require_once("c://xampp/htdocs/FullDevCode/Controladores/MovimientoInventarioController.php");
    $controlador = new InventarioController();
    $controladordemovimientos = new MovimientosInventarioController();

    if($_GET['txtID'])
    {
        $txtId = (isset($_GET['txtID'])?$_GET['txtID']:"");
        $producto = $controlador->Obtener($txtId);
        $nombre = $producto['Nombre'];
    }

    if($_POST)
    {
        $mensaje = "";
        $tipodemovimiento = "Sustraer";
        $idmovimiento = 0;
        $fecha = date("Y-m-d");
        $txtId = (isset($_POST['txtid'])?$_POST['txtid']:"");
        $cantidad = (isset($_POST['cantidad'])?$_POST['cantidad']:"");

        $producto = $controlador->Obtener($txtId);
        $cantidadanterior = $producto['Cantidad'];

        if($cantidad <= $cantidadanterior)
        {
            $nuevacantidad = $cantidadanterior - $cantidad;
            require_once("c://xampp/htdocs/FullDevCode/Modelos/InventarioViewModel.php");
            require_once("c://xampp/htdocs/FullDevCode/Modelos/MovimientosDeInventarioViewModel.php");
            $Producto = new Inventario($txtId,"","","",$nuevacantidad,"","","");
            $Movimiento = new MovimientosInventario($idmovimiento,$cantidad,$fecha,$txtId,$tipodemovimiento);
            $controladordemovimientos->RegistrarMovimiento($Movimiento->GETCantidad(),$Movimiento->GETFechadecambio(),
            $Movimiento->GETInventarioId(),$Movimiento->GETTipoDeMovimiento());
            $controlador->ActualizarExistencias($Producto->GETId(),$Producto->GETCantidad());
        }
        else
        {
            $mensaje = "No se puede sustrar una cantidad mayor a la cantidad actual de existencias";
        }
    }


?>

<a id="Regresar" class="btn btn-primary" href="index.php" role="button"><i class="fa-solid fa-arrow-right-from-bracket fa-lg"></i>&nbsp <strong>Regresar</strong></a>
<div class="content-formularios">
    <h1 class="titulo">Sustraer <?php echo $nombre; ?></h1>
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

                    <p class="block">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="text"
                        value = "<?php if(isset($cantidad)) echo $cantidad;?>"
                        class="form-control" name="cantidad" required id="cantidad" aria-describedby="helpId" placeholder="Ingrese la cantidad del producto que desea ingresar">
                    </p>
                    <br>
                    <p class="boton">
                        <button type="submit">Guardar Cambios</button>
                    </p>
                </form>
            </div>
        </div>
</div>


<?php include("../../Templates/footer.php");?>
