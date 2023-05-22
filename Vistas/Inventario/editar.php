<?php include("../../Templates/header.php"); ?>
<?php
    require_once("c://xampp/htdocs/FullDevCode/Controladores/InventarioController.php");
    $controladores = new InventarioController();

    if($_GET['txtID'])
    {
        $txtId = (isset($_GET['txtID'])?$_GET['txtID']:"");
        $resultadoproducto = $controladores->Obtener($txtId);
        $nombre = $resultadoproducto['Nombre'];
        $txtUsuarioId = $resultadoproducto['UsuarioId'];
        $distribuidor = $resultadoproducto['Distribuidor'];
        $fechadecompra = $resultadoproducto['FechaDeCompra'];
        $fechadevencimiento = $resultadoproducto['FechaDeVencimiento'];
        $lote = $resultadoproducto['Lote'];
    }

    if($_POST)
    {
        $mensaje = "";
        $validacion = false;
        $txtId = (isset($_POST['txtid'])?$_POST['txtid']:"");
        $nombre = (isset($_POST['nombre'])?$_POST['nombre']:"");
        $distribuidor = (isset($_POST['distribuidor'])?$_POST['distribuidor']:"");
        $fechadecompra = (isset($_POST['fechadecompra'])?$_POST['fechadecompra']:"");
        $fechadevencimiento = (isset($_POST['fechadevencimiento'])?$_POST['fechadevencimiento']:"");
        $lote = (isset($_POST['lote'])?$_POST['lote']:"");
        $txtUsuarioId = (isset($_POST['txtusuarioid'])?$_POST['txtusuarioid']:"");
        $cantidad = 0;

        $validacion = $controladores->ValidarEditar($txtUsuarioId,$lote,$txtId);
        $registroanterior = $controladores->Obtener($txtId);
        $fechaanterior = $registroanterior['FechaDeVencimiento'];
        $fechaformulario = strtotime(str_replace('/','-',$fechadevencimiento));
        $fechaformularioanterior = strtotime(str_replace('/','-',$fechaanterior));



        if($validacion == false)
        {
            if($fechaformulario >= $fechaformularioanterior)
            {
                require_once("c://xampp/htdocs/FullDevCode/Modelos/InventarioViewModel.php");
                $producto = new Inventario($txtId,$nombre,$distribuidor,$fechadecompra,$cantidad,$fechadevencimiento
                ,$txtUsuarioId,$lote);
                $controladores->Actualizar($producto->GETId(),$producto->GETNombre(),$producto->GETDistribuidor(),
                $producto->GETFechaDeCompra(),$producto->GETFechaDeVencimiento(),$producto->GETUsuarioId(),
                $producto->GETLote());
            }
            else
            {
                $mensaje = "No puedes actualizar la fecha de vencimiento por una anterior a la original";
            }
        }
        else
        {
            $mensaje = "Ya se encuentra un producto registrado con ese lote";
        }
    }
?>

<a id="Regresar" class="btn btn-primary" href="index.php" role="button"><i class="fa-solid fa-arrow-right-from-bracket fa-lg"></i>&nbsp <strong>Regresar</strong></a>
<div class="content-formularios">
    <h1 class="titulo">Actualizar Producto</h1>
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
                        class="form-control" name="nombre" required id="nombre" aria-describedby="helpId" placeholder="Ingrese nombre del producto">
                    </p>
                    <p>
                        <label for="distribuidor" class="form-label">Distribuidor</label>
                        <input type="text"
                        value = "<?php if(isset($distribuidor)) echo $distribuidor;?>"
                        class="form-control" name="distribuidor" required id="distribuidor" aria-describedby="helpId" placeholder="Ingrese el distribuidor del producto">
                    </p>
                    <p>
                        <label for="fechadecompra" class="form-label">Fecha De Compra</label>
                        <input type="date"
                        value = "<?php if(isset($fechadecompra)) echo $fechadecompra;?>"
                        class="form-control" name="fechadecompra" required id="fechadecompra" aria-describedby="helpId" placeholder="">
                    </p>
                    <p>
                        <label for="fechadevencimiento" class="form-label">Fecha De Vencimiento</label>
                        <input type="date"
                        value = "<?php if(isset($fechadevencimiento)) echo $fechadevencimiento;?>"
                        class="form-control" name="fechadevencimiento" required id="fechadevencimiento" aria-describedby="helpId" placeholder="">
                    </p>
                    <p>
                        <label for="lote" class="form-label">Lote</label>
                        <input type="text"
                        value = "<?php if(isset($lote)) echo $lote;?>"
                        class="form-control" name="lote" required id="lote" aria-describedby="helpId" placeholder="Ingrese el lote del producto">
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
